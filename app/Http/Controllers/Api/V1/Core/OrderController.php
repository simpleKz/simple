<?php


namespace App\Http\Controllers\Api\V1\Core;


use App\Http\Controllers\Api\ApiBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends ApiBaseController
{
    public function acceptOrder(Request $request){
        Storage::disk('local')->put('asd.txt', $request);

        return 0;
    }
}
