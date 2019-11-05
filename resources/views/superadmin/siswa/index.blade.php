@extends('layouts.admin')
@section('content')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Form Student</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Students</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="#exampleModal" class="btn btn-sm btn-neutral" data-toggle="modal">New</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Modal Add-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: left;">
        <form action="{{url('siswa/store')}}" method="POST" enctype="multipart/form-data">
         @csrf
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
           <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="">
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
           <input name="jenis_kelamin" class="custom-control-input" value="Perempuan" id="customRadio6" type="radio">
           <label class="custom-control-label" for="customRadio6">Perempuan</label>
         </div>
         </div>
         </div>
         <div class="form-group">
          <label class="form-control-label" for="exampleFormControlSelect1" name="jurusan_id">Jurusan</label>
          <select class="form-control" id="exampleFormControlSelect1" name="jurusan_id">
            @foreach($jurusans as $j)
              <option value="{{$j->id}}">{{$j->nama}}</option>
            @endforeach
          </select>
          </div>
          <div class="form-group">
            <label class="form-control-label" name="kelas" for="exampleFormControlSelect1">Kelas</label>
            <select class="form-control" id="exampleFormControlSelect1" name="kelas">
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
            <input type="file" class="custom-file-input" name="foto" id="dropzoneBasicUpload">
            <label class="custom-file-label" for="dropzoneBasicUpload">Choose file</label>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">All Students</h3>
              <p class="text-sm mb-0">
              </p>
            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-buttons">
                <thead class="thead-light">
                  <tr>
                    <th style="text-align: center">No</th>
                    <th style="text-align: center">Nis</th>
                    <th style="text-align: center">Nisn</th>
                    <th style="text-align: center">Gender</th>
                    <th style="text-align: center">Class</th>
                    <th style="text-align: center">Program</th>
                    <th style="text-align: center">Place of Birth</th>
                    <th style="text-align: center">Date of Birth</th>
                    <th style="text-align: center">Photo</th>
                    <th style="text-align: center">Edit</th>
                    <th style="text-align: center">Delete</th>
                <tbody>
                  @foreach($siswas as $s)
                  <tr>
                    <td style="text-align: center">{{$loop->iteration}}</td>
                    <td style="text-align: center">{{$s->nis}}</td>
                    <td style="text-align: center">{{$s->nisn}}</td>
                    <td style="text-align: center">{{$s->jenis_kelamin}}</td>
                    <td style="text-align: center">{{$s->kelas}}</td>
                    <td style="text-align: center">{{$s->jurusans->nama}}</td>
                    <td style="text-align: center">{{$s->tempat_lahir}}</td>
                    <td style="text-align: center">{{$s->tanggal_lahir}}</td>
                    <td style="text-align: center"><img src="{{ url('images/'.$s->foto) }}" style="width: 70px; height: 40px"></td>
                    <td style="text-align: center"><a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#EditSiswa{{$s->id}}">Edit</a></td>
                    <td style="text-align: center"><a href="{{url('siswa/delete/'.$s->id)}}" class="btn btn-warning btn-sm" data-toggle="sweet-alert" data-sweet-alert="success">Delete</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </div>
  </div>
</div>      
@endsection