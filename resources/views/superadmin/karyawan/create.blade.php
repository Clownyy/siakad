@extends('layouts.admin')
@section('title')
Karyawan @endsection
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
                            <li class="breadcrumb-item"><a>Add</a></li>
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
                    <h3 class="mb-0">New Employee</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('karyawan/store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">NIP</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="nip" placeholder="00205XXXXX">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Nama</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="">
                        </div>
                        <label class="form-control-label" for="exampleFormControlInput1">Jenis Kelamin</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="custom-control custom-radio mb-3">
                                    <input name="jenis_kelamin" class="custom-control-input" value="Laki-Laki" id="customRadio6" type="radio">
                                    <label class="custom-control-label" for="customRadio6">Laki Laki</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-control custom-radio mb-3">
                                    <input name="jenis_kelamin" class="custom-control-input" value="Perempuan" id="customRadio7" type="radio">
                                    <label class="custom-control-label" for="customRadio7">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Tempat Lahir</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="tempat_lahir">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal_lahir">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Jabatan</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="jabatan" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto" id="customFileLang" lang="en">
                                <label class="custom-file-label" for="customFileLang">Select file</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Post</button>
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