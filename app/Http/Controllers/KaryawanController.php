<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Validator;
use Hash;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('superadmin.karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.karyawan.create');
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
            'nip' => 'required|max:10',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jabatan' => 'required|string',
            'foto' => 'nullable|image'
        ]);

        if ($validator->fails()) {
            redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        $karyawan = new Karyawan();
        $karyawan->nip = $request->input('nip');
        $karyawan->nama = $request->input('nama');
        $karyawan->jenis_kelamin = $request->input('jenis_kelamin');
        $karyawan->tempat_lahir = $request->input('tempat_lahir');
        $karyawan->tanggal_lahir = $request->input('tanggal_lahir');
        $karyawan->jabatan = $request->input('jabatan');
        if (Input::hasFile('foto')) {
            $foto = date("Ymd")
                . uniqid()
                . "."
                . Input::file('foto')->getClientOriginalName();
            Input::file('foto')->move(storage_path('images'), $foto);
            $karyawan->foto = $foto;
        }
        $karyawan->save();
        return redirect(url('karyawan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('superadmin.karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'nip' => 'required|max:10',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jabatan' => 'required|string',
            'foto' => 'nullable|image'
        ]);

        if ($validator->fails()) {
            redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->nip = $request->input('nip');
        $karyawan->nama = $request->input('nama');
        $karyawan->jenis_kelamin = $request->input('jenis_kelamin');
        $karyawan->tempat_lahir = $request->input('tempat_lahir');
        $karyawan->tanggal_lahir = $request->input('tanggal_lahir');
        $karyawan->jabatan = $request->input('jabatan');
        if (Input::hasFile('foto')) {
            $foto = date("Ymd")
                . uniqid()
                . "."
                . Input::file('foto')->getClientOriginalName();
            Input::file('foto')->move(storage_path('images'), $foto);
            $karyawan->foto = $foto;
        }
        $karyawan->save();
        return redirect(url('karyawan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        $file = $karyawan->foto;
        $destinationPath = storage_path('images');
        $filename = $destinationPath . '/' . $file;
        File::delete($filename);
        return redirect(url('/karyawan'));
    }
}
