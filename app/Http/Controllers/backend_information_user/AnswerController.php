<?php

namespace App\Http\Controllers\backend_information_user;

use App\answer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $answer = Answer::where('user_id', '=', \auth()->id())->get();
        return view('profileusers.answer.answer',compact('answer'));

    }


    public function edit($id)
    {
        $answer=Answer::find($id);
        return view('profileusers.answer.edit',compact('answer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $answer=Answer::find($id);
        $answer->update($request->all());
        return  redirect(route('answer.user.index'))->with('success', 'ok');
    }


    public function destroy($id)
    {
        $answer= Answer::find($id)->delete();
        return redirect()->back();
    }
    public  function updateanswer(Answer $answer ){
        if($answer->flag == 1)
        {
            $answer->flag=0;
        }

        else{
            $answer->flag=1;
        }
        $answer->save();
        return redirect()->back();

    }
}
