<?php

namespace App\Http\Controllers;

use Auth;
use Snowfire\Beautymail\Beautymail;

class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sendWelcome()
    {
        if (Auth::user()['recieveMails']) {
            $beautymail = app()->make(Beautymail::class);
            $beautymail->send('emails.welcome', ['user' => Auth::user()], function ($message) {
                $user = Auth::user();
                $message
            ->from('laragit@miguelpiedrafita.com')
            ->to($user->email, $user->name)
            ->subject('Welcome!');
            });
        }
    }

    public function showUnsubscribe()
    {
        return redirect('wip');
    }

    public function unsubscribe()
    {
        $user = Auth::user();
        if ($user->recieveMails) {
            $user->recieveMails = false;
            $user->save();

            return redirect('mail/unsubscribed');
        }
    }

    public function showUnsubscribed()
    {
        return redirect('wip');
    }
}
