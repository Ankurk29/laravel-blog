<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriberEmail;

class SubscriberEmailController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate(request(), [
            'subscribeName' => 'sometimes',
            'subscribeEmail' => 'required|email'
        ]);

        $subscriber = new SubscriberEmail;

        if (!is_null($request->subscribeName)) {
            $subscriber->name = $request->subscribeName;
        }
        $subscriber->email = $request->subscribeEmail;

        $subscriber->save();

        return back();
    }
}
