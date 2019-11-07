<?php

namespace App\Http\Controllers;

use App\Sekbid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Hash;
use Validator;

class SekbidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekbids = Sekbid::orderBy('created_at', 'DESC')->get();
        return view('superadmin.sekbid.index', compact('sekbids'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('superadmin.sekbid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(),[
            'nama' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        $sekbid = new Sekbid;
        $sekbid->nama = $request->input('nama');
        $sekbid->save();
        return redirect(url('sekbid'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sekbid  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $sekbids = Sekbid::find($id);
        // return view('superadmin.blog.edit',['sekbids' => $sekbids]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(),[
            'nama' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        $sekbid = Sekbid::findorFail($id);
        $sekbid->nama = $request->input('nama');
        $sekbid->save();
        return redirect(url('sekbid'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sekbid = Sekbid::findOrFail($id);
        $sekbid->delete();
        return redirect(url('sekbid'));
    }
}
