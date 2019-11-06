<?php

namespace App\Http\Controllers;

use App\Visimisi;
use Illuminate\Http\Request;
use Validator;

class VisimisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visimisi = Visimisi::all();
        return view('superadmin.visimisi.index', compact('visimisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.visimisi.create');
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
            'isi' => 'required',
            'tipe' => 'required|string',
        ]);

        if ($validator->fails()) {
            redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        $visimisi = new Visimisi();
        $visimisi->isi = $request->input('isi');
        $visimisi->tipe = $request->input('tipe');

        $visimisi->save();
        return redirect(url('visimisi'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visimisi  $visimisi
     * @return \Illuminate\Http\Response
     */
    public function show(Visimisi $visimisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visimisi  $visimisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visimisi = Visimisi::findOrFail($id);
        return view('superadmin.visimisi.edit', compact('visimisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visimisi  $visimisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'isi' => 'required',
            'Tipe' => 'required|string',
        ]);

        if ($validator->fails()) {
            redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        $visimisi = Visimisi::findOrFail($id);
        $visimisi->isi = $request->input('isi');
        $visimisi->tipe = $request->input('tipe');

        $visimisi->save();
        return redirect(url('visimisi'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visimisi  $visimisi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visimisi = Visimisi::findOrFail($id);
        $visimisi->delete();

        return redirect(url('/visimisi'));
    }
}
