<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;

class NotificationsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function showNotifications(){
      $notifications = Notification::where('userid', Auth::user()->id)->get();
      return view('notifications')->with('notifications', $notifications);
    }
}
