<?php

namespace App\Http\Controllers\backend;
use App\Notifications\emailnotication;
use App\answer;
use App\thread;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answer = Answer::all();
        return view('backend.answer.answer', compact('answer'));
    }


    public function edit($id)
    {
        $answer = Answer::find($id);
        return view('backend.answer.edit', compact('answer'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $answer = Answer::find($id);
        $answer->update($request->all());
        return redirect()->route('backend.answer.index')->with('success','ok');
    }

    public function destroy($id)
    {
        $answer = Answer::find($id)->delete();
        return redirect()->back();
    }

    public function updateanswer(Answer  $answer)
    {

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