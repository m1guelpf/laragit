<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Repo;
use Auth;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showNotifications()
    {
        $notifications = Notification::where('userid', Auth::user()->id)->get();
        $repos = Repo::where('userid', Auth::user()->id)->get();
        if (count($notifications) == 0 || count($repos) == 0) {
            return view('empty');
        } else {
            return view('notifications', ['repos' => $repos, 'notifications' => $notifications]);
        }
    }

    public function readNotification($id)
    {
        if (Notification::where('id', '=', $id)->exists() && Notification::find($id)->unread == true) {
            $notification = Notification::findOrFail($id);
            $notification->unread = false;
            $notification->save();
        }
    }
}
