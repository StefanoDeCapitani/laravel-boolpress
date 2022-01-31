<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendContactMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request){
        $data = $request->all();

        Mail::to("info@boolpress.it")->send(new SendContactMail($data));
    }
}
