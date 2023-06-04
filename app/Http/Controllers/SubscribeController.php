<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Http\Requests\UnsubscribeRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Subscribed as SubscribedMailable;

class SubscribeController extends Controller
{
    public function subscribe(SubscribeRequest $request)
    {
        $user = $request->user();
        $blog =  Blog::find($request->blog_id);

        $user->subscriptions()->attach($blog->id);

        Mail::to($blog->user)
            ->send(
                (new SubscribedMailable($user, $blog))
                    ->onQueue('emails')
            );

        return back();
    }

    public function unsubscribe(UnsubscribeRequest $request)
    {
        $user = $request->user();
        $blog = Blog::find($request->blog_id);

        $user->subscriptions()->detach($blog->id);

        return back();
    }
}
