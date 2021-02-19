<?php


namespace App\Services\Common\V1\Support\impl;


use App\Services\BaseService;
use App\Services\Common\V1\Support\SmsService;

class SmsServiceImpl extends BaseService implements SmsService
{
    public function sendSms($phone,$code){
        $data2 = array
        (
            'phones' => $phone,
            'mes' => 'Код регистрации Simple: ' . $code,
            'psw' => '010203aA',
            'login' => 'Simple_study'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-type: application/x-www-form-urlencoded'
        ));
        curl_setopt($ch, CURLOPT_URL, "https://smsc.ru/sys/send.php");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data2));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
        return;
    }

}
