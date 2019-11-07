<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Hash;
use Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->get();
        return view('superadmin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.blog.create');
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
            'judul' => 'required|max:50',
            'isi' => 'required',
            'kategori' => 'required|string',
            'tanggal' => 'required',
            'author' => 'required|string',
            'foto' => 'nullable|image'
        ]);

        if ($validator->fails()) {
            redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        $blog = new Blog;
        $blog->judul = $request->input('judul');
        $blog->isi = $request->input('isi');
        $blog->kategori = $request->input('kategori');
        $blog->tanggal = $request->input('tanggal');
        $blog->author = $request->input('author');
        if(Input::hasFile('foto')){
            $foto = date("Ymd")
            .uniqid()
            ."."
            .Input::file('foto')->getClientOriginalName();
            Input::file('foto')->move(storage_path('images'),$foto);
            $blog->foto = $foto;
        }
        $blog->save();
        return redirect(url('blog'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
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
        $blogs = Blog::find($id);
        return view('superadmin.blog.edit',['blogs' => $blogs]);
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
            'judul' => 'required|max:50',
            'isi' => 'required',
            'kategori' => 'required|string',
            'tanggal' => 'required',
            'author' => 'required|string',
            'foto' => 'nullable|image'
        ]);

        if ($validator->fails()) {
            redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        $blog = Blog::findorFail($id);
        $blog->judul = $request->input('judul');
        $blog->isi = $request->input('isi');
        $blog->kategori = $request->input('kategori');
        $blog->tanggal = $request->input('tanggal');
        $blog->author = $request->input('author');
        if(Input::hasFile('foto')){
            $foto = date("Ymd")
            .uniqid()
            ."."
            .Input::file('foto')->getClientOriginalName();
            Input::file('foto')->move(storage_path('images'),$foto);
            $blog->foto = $foto;
        }
        $blog->save();
        return redirect(url('blog'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        $file = $blog->foto;
        $destinationPath = storage_path('images');
        $filename = $destinationPath . '/' . $file;
        File::delete($filename);
        return redirect(url('blog'));
    }
}
