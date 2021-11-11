<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notifications = auth()->user()->unreadNotifications;

        auth()->user()->unreadNotifications->markAsRead();

        return view('notifications.index', compact('notifications'));
    }
}
