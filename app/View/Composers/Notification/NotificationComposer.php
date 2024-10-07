<?php

namespace App\View\Composers\Notification;


use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class NotificationComposer
{

    protected $repoNotify;

    public function __construct()
    {
        $this->repoNotify = app()->make('App\Admin\Repositories\Notification\NotificationRepositoryInterface');
    }

    public function compose(View $view)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $notify = $user->notifications()->orderBy('created_at', 'desc')->get();
        }
        else{
            $notify = null;
        }
        $view->with('notify', $notify);
    }
}
