<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;

class MailController extends Controller
{
    public function sendMail()
    {
         $toName = 'Shopwise';
         $toMail = 'haidangdevelop1998@gmail.com';

         $data = array('title' => 'Xác nhận đơn hàng!', 'user_name' => Auth::user()->name);

         Mail::send('client.send-mail.mail', $data, function($message) use ($toName, $toMail) {
            $message->to($toMail)->subject('Xác nhận đặt hàng Shopwise');
            $message->from($toMail, $toName);
         });

        return view('client.pages.order-completed');

    }
}
