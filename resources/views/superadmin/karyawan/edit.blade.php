@extends('layouts.admin')
@section('title')
Karyawan
@endsection
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Employees</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{url('karyawan')}}">Employee</a></li>
                            <li class="breadcrumb-item"><a>Update</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{url('karyawan')}}" class="btn btn-sm btn-neutral">Back</a>
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
                    <h3 class="mb-0">Update Employee</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('karyawan/'.$karyawan->id)}}" enctype="multipart/form-data">
                        @csrf @method('put')
                        <div class="form-group">
                            <label class="form-control-label" for="nip">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="{{$karyawan->nip}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="nama">Name</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$karyawan->nama}}">
                        </div>
                        <input type="hidden" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{$karyawan->jenis_kelamin}}">
                        <div class="form-group">
                            <label class="form-control-label" for="tempat_lahir">Place Of Birth</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{$karyawan->tempat_lahir}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="tanggal_lahir">Date Of Birth</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$karyawan->tanggal_lahir}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="jabatan">position</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{$karyawan->jabatan}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="foto">
                                <label class="custom-file-label" for="image">Choose File</label>
                            </div>
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