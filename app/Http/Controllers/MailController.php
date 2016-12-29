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
