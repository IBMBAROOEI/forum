<?php

namespace App\Http\Controllers\backend;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function index()
    {

        $users = User::all();
        return view('backend.users.user', compact('users'));
    }

    public function update_user(User $user)
    {
        if ($user->flag == 1) {
            $user->flag = 0;
        } else {
            $user->flag = 1;
        }
        $user->save();
        return redirect()->back();
    }

    public function destroy($id)  /* delete image user thread  answer  */
    {
        $user = User::findOrFail($id);
        if($user->thread_id !== 0 && $user->answer_id !== 0) {
            \Storage::delete('/public/images/' . auth()->user()->avatar);
        }
        $user->threadsuser()->delete();
        $this->deleteAnswer();
        $user->delete();
        return redirect()->back();
    }
    protected function deleteAnswer()
    {
        $user=auth()->user();
        $user->answers()->delete();
        $user->delete();
        return redirect()->back();
    }


}