<?php


namespace App\Services\Common\V1\Support;



interface SmsService
{

    public function sendSms($phone,$code);

}
