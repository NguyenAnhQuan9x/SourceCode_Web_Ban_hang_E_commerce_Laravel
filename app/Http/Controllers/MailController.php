<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class MailController extends Controller
{
    //
    public function SendMail()
    {
        Mail::to('quankeo1998@g1mail.com')->send(new SendMail());
        
    }
}
