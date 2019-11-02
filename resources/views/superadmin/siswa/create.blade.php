@extends('layouts.admin')

@section('title')
Add Siswa
@endsection
@section('content')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Form Siswa</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Siswa</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="#" class="btn btn-sm btn-neutral">New</a>
          <a href="#" class="btn btn-sm btn-neutral">Filters</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-lg-6">
      <div class="card-wrapper">
        <div class="card mb-4">
          <div class="card-header">
            <h3 class="mb-0">Siswa</h3>
          </div>
          <div class="card-body">
            <form>
              <div class="form-group">
                <label class="form-control-label" for="exampleFormControlInput1">NISN</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nisn" placeholder="00205XXXXX">
              </div>
              <div class="form-group">
                <label class="form-control-label" for="exampleFormControlInput1">NIS</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nis" placeholder="113XX">
              </div>
              <div class="form-group">
                <label class="form-control-label" for="exampleFormControlInput1">Nama</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="">
              </div>
              <label class="form-control-label" for="exampleFormControlInput1">Jenis Kelamin</label>
              <div class="row">
                <div class="col-md-6">
                  <div class="custom-control custom-radio mb-3">
                    <input name="jenis_kelamin" class="custom-control-input" value="Laki-Laki" id="customRadio5" type="radio">
                    <label class="custom-control-label" for="customRadio5">Laki Laki</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="custom-control custom-radio mb-3">
                    <input name="jenis_kelamin" class="custom-control-input" value="Perempuan" id="customRadio5" type="radio">
                    <label class="custom-control-label" for="customRadio5">Perempuan</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="form-control-label" for="exampleFormControlSelect1">Jurusan</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  @foreach($jurusan as $j)
                  <option>{{$j->nama}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label class="form-control-label" for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>X</option>
                  <option>XI</option>
                  <option>XII</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-control-label" for="exampleFormControlInput1">Tempat Lahir</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="tempat_lahir">
              </div>
              <div class="form-group">
                <label class="form-control-label" for="exampleFormControlInput1">Tanggal Lahir</label>
                <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal_lahir">
              </div>
              <label class="form-control-label">Foto</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileLang" lang="en">
                <label class="custom-file-label" for="customFileLang">Select file</label>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection