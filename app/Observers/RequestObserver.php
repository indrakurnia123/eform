<?php
namespace App\Observers;

use App\Notifications\NewRequest;
use App\Models\Request;
use App\Models\User;

class RequestObserver
{
    public function created(Request $request)
    {
        $author = $request->user;
        $users = User::all();
        foreach ($users as $user) {
            $user->notify(new NewRequest($request,$user));
        }
    }
}