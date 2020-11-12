<?php

namespace App\Http\Controllers;

use App\thread;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $data= $request->search;
        $threads=thread::where('content', 'like',"{$data}%")
            ->orwhere('title','like',"{$data}%")
            ->orwhere('chanel_id','like',"{$data}%")
            ->orwhere('chanel_id','like',"{$data}%")
            ->get();
        return view('front.index', compact('threads'));
    }
}
