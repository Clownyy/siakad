<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Hash;
use Illuminate\Support\Facades\File;
use Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::with('jurusans')->orderBy('created_at', 'DESC')->get();
        $jurusans = Jurusan::orderBy('nama', 'ASC')->get();
        return view('superadmin.siswa.index', compact('siswas', 'jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $jurusan = Jurusan::orderBy('nama', 'ASC')->get();
    //     return view('superadmin.siswa.index', compact('jurusan'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(),[
            'nisn' => 'required|max:10',
            'nis' => 'required|max:5',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'kelas' => 'required|string',
            'jurusan_id' => 'required|exists:jurusans,id',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'foto' => 'nullable|image'
        ]);

        if ($validator->fails()) {
            redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        $siswa = new Siswa;
        $siswa->nisn = $request->input('nisn');
        $siswa->nis = $request->input('nis');
        $siswa->nama = $request->input('nama');
        $siswa->jenis_kelamin = $request->input('jenis_kelamin');
        $siswa->kelas = $request->input('kelas');
        $siswa->jurusan_id = $request->input('jurusan_id');
        $siswa->tempat_lahir = $request->input('tempat_lahir');
        $siswa->tanggal_lahir = $request->input('tanggal_lahir');
        if(Input::hasFile('foto')){
            $foto = date("Ymd")
            .uniqid()
            ."."
            .Input::file('foto')->getClientOriginalName();
            Input::file('foto')->move(storage_path('images'),$foto);
            $siswa->foto = $foto;
        }
        $siswa->save();
        return redirect(url('siswa'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edtsiswa = Siswa::findOrFail($id);
        return view('superadmin.siswa.edit', compact('edtsiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(request()->all(),[
            'nisn' => 'required|max:10',
            'nis' => 'required|max:5',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'kelas' => 'required|string',
            'jurusan_id' => 'required|exists:jurusans,id',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'foto' => 'nullable|image'
        ]);

        if ($validator->fails()) {
            redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        $siswa = Siswa::findOrFail($request->input('id'));
        $siswa->nisn = $request->input('nisn');
        $siswa->nis = $request->input('nis');
        $siswa->nama = $request->input('nama');
        $siswa->jenis_kelamin = $request->input('jenis_kelamin');
        $siswa->kelas = $request->input('kelas');
        $siswa->jurusan_id = $request->input('jurusan_id');
        $siswa->tempat_lahir = $request->input('tempat_lahir');
        $siswa->tanggal_lahir = $request->input('tanggal_lahir');
        if(Input::hasFile('foto')){
            $foto = date("Ymd")
            .uniqid()
            ."."
            .Input::file('foto')->getClientOriginalName();
            Input::file('foto')->move(storage_path('images'),$foto);
            $siswa->foto = $foto;
        }
        $siswa->save();
        return redirect(url('siswa'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        $file = $siswa->foto;
        $destinationPath = storage_path('images');
        $filename = $destinationPath.'/'.$file;
        File::delete($filename);
        return redirect(url('/siswa'));
    }
}
