<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Validator;


class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all();
        return view('superadmin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'alamat' => 'required|string',
            'email' => 'required|string',
            'notelp' => 'required|string',
            'fax' => 'required|string',
        ]);

        if ($validator->fails()) {
            redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        $about = new About();
        $about->alamat = $request->input('alamat');
        $about->email = $request->input('email');
        $about->notelp = $request->input('notelp');
        $about->fax = $request->input('fax');

        $about->save();
        return redirect(url('about'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('superadmin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'alamat' => 'required|string',
            'email' => 'required|string',
            'notelp' => 'required|string',
            'fax' => 'required|string',
        ]);

        if ($validator->fails()) {
            redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        $about = About::findOrFail($id);
        $about->alamat = $request->input('alamat');
        $about->email = $request->input('email');
        $about->notelp = $request->input('notelp');
        $about->fax = $request->input('fax');

        $about->save();
        return redirect(url('about'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();

        return redirect(url('/about'));
    }
}
