@extends('layouts.admin')
@section('title')
Blog
@endsection
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Blogs</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                          <li class="breadcrumb-item"><a href="#">Blog</a></li>
                          <li class="breadcrumb-item"><a href="#">Update</a></li>
                      </ol>
                  </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{url('blog')}}" class="btn btn-sm btn-neutral">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-stats">
                <div class="card-header">
                    <h3 class="mb-0">New Articles</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('blog/'.$blogs->id)}}" enctype="multipart/form-data">
                        @csrf @method('put')
                        <div class="form-group">
                            <label class="form-control-label" for="judul">Title Articles</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{$blogs->judul}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Content</label>
                            <textarea id="siakadcontent" name="isi">{!! $blogs->isi !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="Category">Category</label>
                            <input type="text" class="form-control" id="Category" name="kategori" value="{{$blogs->kategori}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="tanggal" value="{{$blogs->tanggal}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="foto">
                                <label class="custom-file-label" for="image">Choose File</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="author">Author</label>
                            <input type="text" class="form-control" readonly id="author" name="author" value="{{$blogs->author}}">
                        </div>
                        <div class="row">
                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('foot-content')
@endsection