@extends('layouts.admin')
@section('title')
Teachers
@endsection
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Teachers</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                          <li class="breadcrumb-item"><a href="#">Teachers</a></li>
                          <li class="breadcrumb-item"><a href="#">Update</a></li>
                      </ol>
                  </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{url('guru')}}" class="btn btn-sm btn-neutral">Back</a>
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
                    <h3 class="mb-0">New guru</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('guru/'.$gurus->id)}}" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$gurus->id}}">
                        @csrf @method('put')
                        <div class="form-group">
                            <label class="form-control-label" for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="{{$gurus->nip}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Name</label>
                            <input type="text" class="form-control" name="nama" value="{{$gurus->nama}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="foto">
                                <label class="custom-file-label" for="image">Choose File</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="Tempat">Tempat Lahir</label>
                            <input type="text" class="form-control" id="Tempat" name="tempat_lahir" value="{{$gurus->tempat_lahir}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="tanggal_lahir" value="{{$gurus->tanggal_lahir}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="author">Subjects</label>
                            <select class="form-control" name="mapel_id">
                                @foreach($mapel as $m)
                                <option value="{{$m->id}}" {{$m->id == $gurus->mapel_id ? "selected" : null}}>{{$m->nama}}</option>
                                @endforeach
                            </select>
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
@guru