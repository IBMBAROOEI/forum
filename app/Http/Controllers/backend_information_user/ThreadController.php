<?php

namespace App\Http\Controllers\backend_information_user;


use App\Http\Controllers\Controller;
use App\Http\Requests\threadrequest;
use App\thread;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function index()
    {

        $thread = Thread::where('user_id', '=', \auth()->id())->get();
        return view('profileusers.thread.thread', compact('thread'));

    }

    public function edit($id)
    {
        $thread=Thread::find($id);
        return view('profileusers.thread.edit',compact('thread'));
    }

    public function store(threadrequest $request)
    {

        auth()->user()->threadsuser()->create([
            'title'=>$request->title,
            'content'=>$request->content,
            'chanel_id'=>$request->chanel_id,
        ]);
        return redirect()->back()->with('success','ok');
    }
    public function update(threadrequest $request, $id)
    {

        $thread=Thread::find($id);
        $thread->update($request->all());
        return  redirect(route('thread.user.index'))->with('success','ok');
    }

    public function destroy($id)
    {
        $thread= Thread::find($id)->delete();
        return redirect()->back();
    }
    public  function updatethread(Thread $thread ){
        if($thread->flag == 1)
        {
            $thread->flag=0;
        }

        else{
            $thread->flag=1;
        }
        $thread->save();
        return redirect()->back();

    }
}