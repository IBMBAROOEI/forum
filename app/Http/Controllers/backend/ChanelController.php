<?php

namespace App\Http\Controllers\backend;

use App\chanel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class chanelController extends Controller
{

    public function index()
    {
       $chanels =Chanel::all();
       return view('backend.chanel.chanel',compact('chanels'));
    }

    public function create()
    {
        return view('backend.chanel.chanel');
    }

    public function store(Request $request)
    {
       Chanel::create($request->all());
        return view('backend.chanel.chanel');
    }


    public function edit($id)
    {

        $chanel=Chanel::find($id);
        return view('backend.chanel.edit',compact('chanel'));
    }

    public function update(Request $request, $id)
    {
        $chanel=Chanel::find($id);
        $chanel->update($request->all());
        return  view('backend.chanel.chanel');
    }


    public function destroy($id)
    {
        $chanel= Chanel::find($id)->delete();
        return  view('backend.chanel.chanel');
    }
}
