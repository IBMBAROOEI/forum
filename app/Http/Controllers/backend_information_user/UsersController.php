<?php

namespace App\Http\Controllers\backend_information_user;

use App\Http\Controllers\Controller;
use App\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Inline\Element\Image;


class UsersController extends Controller
{


    public function index()
    {
        $users = User::where('id', '=', \auth()->id())->get();
        return view('profileusers.profile.user', compact('users'));
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('profileusers.profile.edit', compact('users'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = \Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }
        $user->update($input);
        if ($request->hasFile('avatar')) {
            $filename = time() . '.' . $request->avatar->getClientOriginalName();
            $this->deleteOldImage();
            $request->avatar->storeAs('images', $filename, 'public');
            Auth()->user()->update(['avatar' => $filename]);
        }
        return redirect()->route('user.profile.index')->with('succses', 'Profile Picture Uploaded Successfully');
    }

    protected function deleteOldImage()
    {
        if (auth()->user()->avatar) {
            \Storage::delete('/public/images/' . auth()->user()->avatar);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if($user->thread_id !== 0) {
            \Storage::delete('/public/images/' . auth()->user()->avatar);
        }
        $user->threadsuser()->delete();
        $this->deleteAnswer();
        $user->delete();
        return redirect(route('login'));
    }
    protected function deleteAnswer()
    {
       $user=auth()->user();
        $user->answers()->delete();
        $user->delete();
    }
}

