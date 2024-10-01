<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\SendMailRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function show()
    {
        return Inertia::render("Contact/Contact");
    }

    public function sendMail(SendMailRequest $request)
    {
        Mail::to(config("app.admin_mail"))->send(new ContactMail(
            $request->name,
            $request->email,
            $request->message
        ));
    }
}
