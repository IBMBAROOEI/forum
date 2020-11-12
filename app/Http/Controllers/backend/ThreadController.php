<?php


namespace App\Http\Controllers\backend;
use App\Http\Requests\threadrequest;
use App\thread;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class threadController extends Controller
{
    public function index()
    {
        $thread=Thread::all();
        return view('backend.thread.thread', compact('thread'));
    }

    public function create()
    {
        return view('backend.thread.thread');

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

    public function show($id)
    {
        $thread=Thread::with('answers.user')->findOrFail($id);
        return view('backend.thread.show', compact('thread'));
    }

    public function edit($id)
    {
        $thread=Thread::find($id);
        return view('backend.thread.edit',compact('thread'));
    }

    public function update(threadrequest $request, $id)
    {

        $thread=Thread::find($id);
        $thread->update($request->all());
        return  redirect()->back()->with('success','ok');
    }

    public function destroy($id)
    {
        $thread= Thread::find($id)->delete();
        return redirect()->back();
    }

    public function updateThtread(Thread $thread)
    {
        if($thread->flag==1){
            $thread->flag=0;
        }
        else{
            $thread->flag=1;
        }
        $thread->save();
        return redirect()->back();
    }

}
