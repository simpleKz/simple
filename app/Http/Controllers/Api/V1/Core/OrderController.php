<?php


namespace App\Http\Controllers\Api\V1\Core;


use App\Exceptions\Api\ApiServiceException;
use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Errors\ErrorCode;
use App\Http\Requests\Web\V1\ProfileUpdateWebRequest;
use App\Models\Entities\Core\History;
use App\Models\Entities\Core\Order;
use App\Models\Entities\Core\User;
use App\Models\Entities\Course\Course;
use App\Models\Entities\Course\CoursePassing;
use App\Models\Entities\Course\Packet;
use App\Models\Entities\Course\PacketPrice;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class OrderController extends ApiBaseController
{


    public function acceptOrder(Request $request) {
        Storage::disk('local')->put('testSimpe.txt', $request);
        $request_array = $request->except('pg_sig');
        ksort($request_array);
        array_unshift($request_array, 'order');
        array_push($request_array, 'pdajm24PW84OgxbP');
        $check_for_sign = md5(implode(';', $request_array));

        if($check_for_sign != $request->pg_sig) {
            return response()->json(['success' => false, 'message' => 'Неправильная подпись запроса'], 400);
        }
        $order = Order::find($request->pg_order_id);
        if(!$order) {
            return response()->json(['success' => false, 'message' => 'Неправильный order'], 400);

        }
//        if($order->is_payed == true){
//            return response()->json(['success' => false, 'message' => 'order уже оплачен'], 400);
//
//        }
        $status = $this->getOrderStatus($order->id,$request->pg_payment_id);

        DB::beginTransaction();
        try {

            $order->paybox_id = $request->pg_payment_id;
            $order->save();

            $history = History::create([
                'order_id' => $order->id,
                'user_id' => $order->user_id,
                'amount' => $order->sum,
                'paybox_id' => $request->pg_payment_id,

            ]);


            if($status == "ok"){

                $order->is_payed = true;
                $order->save();
                $packet_price = PacketPrice::where('id',$order->packet_price_id)->first();
                $packet = Packet::where('id',$packet_price->packet_id)->first();
                $course = Course::where('id',$packet->course_id)->first();

//                CoursePassing::create([
//                    'course_id' => $order->course_id,
//                    'user_id' => $order->user_id,
//                    'overall_lessons_count' => $course->lessons()->count(),
//                    'passed_lessons_count' => 0,
//                    'is_passed' => false
//
//                ]);


                $user = User::where('id',$order->user_id)->first();

                if($user->ref_user_id){
                    $profit_user = User::where('id',$user->ref_user_id)->first();
                    $profit = ($profit_user->discount_percentage/100)*$history->amount;
                    $profit_user->balance = $profit + $profit_user->balance;
                    $profit_user->save();
                    $history->profit_holder_id = $profit_user->id;
                    $history->profit = $profit;
                    $history->save();
                }
            }



            DB::commit();
        } catch (\Exception $e) {

            DB::rollback();

            throw new ApiServiceException(400, false, [
                'errorCode' => ErrorCode::SYSTEM_ERROR,
                'errors' => [
                    'Something went wrong.'
                ]
            ]);
        }
        return response()->json(['success' => true, 'message' => 'Успешно'], 200);
    }

    public function getOrderStatus($order_id,$payment_id){
        $request = [
            'pg_merchant_id' => 536680,
            'pg_payment_id' => $payment_id,
            'pg_order_id' => $order_id,
            'pg_salt' => 'OrderStatus',
        ];

        ksort($request); //sort alphabetically

        array_unshift($request, 'get_status.php');

        array_push($request, 'pdajm24PW84OgxbP'); //add your secret key (you can take it in your personal cabinet on paybox system)

        $request['pg_sig'] = md5(implode(';', $request));

        unset($request[0], $request[1]);

        $query = http_build_query($request);


        $response = Http::send('POST', 'https://api.paybox.money/get_status.php?'.$query, [

        ]);
        ;
        $xml_file = simplexml_load_string($response);
        $json = json_encode($xml_file );
        $array = json_decode($json,TRUE);

        return $array['pg_status'];
    }
}
