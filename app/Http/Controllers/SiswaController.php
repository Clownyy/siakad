<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Jurusan;
use Illuminate\Http\Request;

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
        $this->validate($request, [
            'nisn' => 'required|integer|max:10|unique:siswas',
            'nis' => 'required|integer|max:5|unique:siswas',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string',
            'kelas' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jurusan_id' => 'required|exists:jurusans,id',
            'foto' => 'nullable|image'
        ]);

        try {

            $foto = null;
    		//jika terdapat file (Foto/Gambar) yang dikirim
    		if ($request->hasFile('foto')) {
    			//maka menjalankan method saveFile()
    			$foto = $this->saveFile($request->nama, $request->file('foto'));
            }
            
            $siswa = Siswa::create([
                'nisn' => $request->input('nisn'),
                'nis' => $request->input('nis'),
                'nama' => $request->input('nama'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'kelas' => $request->input('kelas'),
                'jurusan_id' => $request->input('jurusan_id'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
                'jurusan_id' => $request->input('jurusan_id'),
                'foto' => $foto
            ]);
            return redirect(url('/siswa'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
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
        $siswa = Siswa::findOrFail($id);
        return view('superadmin.siswa.edit', compact('siswa'));
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
        $this->validate($request, [
            'nisn' => 'required|integer|max:10|unique:siswas',
            'nis' => 'required|integer|max:5|unique:siswas',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string',
            'kelas' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jurusan_id' => 'required|exists:jurusans,id',
            'foto' => 'nullable|image'
        ]);

        try {

            $siswa = Siswa::findOrFail($request->input('id'));
            $foto = $siswa->foto;

            if ($request->has('foto')) {
                !empty($foto) ? File::delete(storage_path('images' . $foto)):null;
    			$photo = $this->saveFile($request->nama, $request->file('foto'));
            }

            $siswa->nisn = $request->input('nisn');
            $siswa->nis = $request->input('nis');
            $siswa->nama = $request->input('nama');
            $siswa->jenis_kelamin = $request->input('jenis_kelamin');
            $siswa->kelas = $request->input('kelas');
            $siswa->tempat_lahir = $request->input('tempat_lahir');
            $siswa->tanggal_lahir = $request->input('tanggal_lahir');
            $siswa->jurusan_id = $request->input('jurusan_id');
            $siswa->foto = $foto;
            $siswa->save();
            return redirect(url('/siswa'));

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
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
        if (!@empty($siswa->foto)) {
            File::delete(storage_path('images' . $siswa->foto));
        }

        $siswa->delete();
        return redirect(url('/siswa'));
    }

    public function saveFile($nama, $foto)
    {
        $images = str_slug($nama) . time() . '.' .$foto->getClientOriginalName();

        $path = storage_path('images');
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        Image::make($foto)->save($path . '/' . $images);
        return $images;
    }
}
