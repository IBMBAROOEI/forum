<?php

namespace App\Http\Controllers;
use App\Http\Requests\threadrequest;
use App\like;
use Illuminate\Http\Request;
use App\thread;
use App\User;
use Illuminate\Support\Facades\Auth;
use function Sodium\increment;

class threadController extends Controller
{

    public function index()
    {
        $threads= thread::where('flag',1)->latest()->get();/* if thread  by admin is active*/
        return view('front.index', compact('threads'));
    }

    public function show($id)
    {
        $threads=Thread::with('answers.user')->findOrFail($id);
        $threads->increment('view_thread');
        return view('front.page-single-topic', compact('threads'));
    }

    public function store(threadrequest $request)
    {
        auth()->user()->threadsuser()->create([
            'title' => $request->title,
            'content' => $request->content,
            'chanel_id' => $request->chanel_id,
        ]);
        return redirect()->back()->with('success','ok');
    }

    public function create()
    {
        return view('front.page-create-topic');
    }

    public function like(Request $request){
        $thread_id=$request['threadid'];
        $is_like=$request['islike'] === 'true' ? true : false;
        $update= false;
        $thread=Thread::find($thread_id);
        if(!$thread){
            return null;
        }
        $user=\Auth::user();
        $like=$user->likes()->where('thread_id',$thread_id)->first();
        if($like){
            $alredy_like=$like->like;
            $update=true;
            if($alredy_like==$is_like){
                $like->delete();
                return null;
            }
        }else{
            $like=new Like();
        }
        $like->like=$is_like;
        $like->user_id=$user->id;
        $like->thread_id=$thread->id;
        if($update){
            $like->update();
        }else{
            $like->save();
        }
        return null;
    }


}