<?php

namespace App\Http\Controllers;

use App\Gudang;
use App\Kategori;
use Illuminate\Http\Request;
use Validator;


class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gudang = Gudang::with('kategoris')->orderBy('created_at', 'DESC')->get();
        $kategori = Kategori::orderBy('nama', 'ASC')->get();
        return view('superadmin.gudang.index', compact('gudang', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::orderBy('nama', 'ASC')->get();
        return view('superadmin.gudang.create', compact('kategori'));
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
            'nama_barang' => 'required|string',
            'jumlah_barang' => 'required|integer',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        if ($validator->fails()) {
            redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        $gudang = new Gudang;
        $gudang->nama_barang = $request->input('nama_barang');
        $gudang->jumlah_barang = $request->input('jumlah_barang');
        $gudang->kategori_id = $request->input('kategori_id');

        $gudang->save();
        return redirect(url('gudang'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function show(Gudang $gudang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::orderBy('nama', 'ASC')->get();
        $gudang = Gudang::findOrFail($id);
        return view('superadmin.gudang.edit', compact('gudang', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'nama_barang' => 'required|string',
            'jumlah_barang' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        if ($validator->fails()) {
            redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        $gudang = Gudang::findOrFail($id);
        $gudang->nama_barang = $request->input('nama_barang');
        $gudang->jumlah_barang = $request->input('jumlah_barang');
        $gudang->kategori_id = $request->input('kategori_id');

        $gudang->save();
        return redirect(url('gudang'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gudang  $gudang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gudang = Gudang::findOrFail($id);
        $gudang->delete();

        return redirect(url('/gudang'));
    }
}
