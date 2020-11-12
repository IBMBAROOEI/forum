<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Notifications\emailnotication;
use App\thread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class replayController extends Controller
{
    /* Save answers and  with notification*/
    public function store(request $request)
    {

        $this->validate($request, [
            'content' => 'required',
        ]);
        $thread = Thread::findOrFail($request->thread_id);
        $answer = new Answer();
        $answer ->content = $request->content;
        $answer->thread_id = $thread->id;
        $answer->user_id = \Auth::id();
        $answer->save();
        $thread->user->notify(new  emailnotication($thread));
        return redirect()->back()->with('success', 'ok');

    }


}
