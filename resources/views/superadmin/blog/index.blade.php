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
                      </ol>
                  </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{url('blog/create')}}" class="btn btn-sm btn-neutral">New</a>
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
                    <h3 class="mb-0">All Articles</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive py-4">
                        <table class="table table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Title Article</th>
                                    <th>Field Article</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Author</th>
                                    <th>Image</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $b)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$b->judul}}</td>
                                    <td>{!! Str::limit($b->isi, 10) !!}<a href="#detailContent{{$b->id}}" data-toggle="modal" data-target="#detailContent{{$b->id}}">see more</a></td>
                                    <td>{{$b->kategori}}</td>
                                    <td>{{$b->tanggal}}</td>
                                    <td>{{$b->author}}</td>
                                    <td><img src="{{url('images/'.$b->foto)}}" style="width: 70px;"></td>
                                    <td>
                                        <a href="{{url('blog/edit/'.$b->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt text-white"></i></a>
                                        <a href="{{url('blog/delete/'.$b->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash text-white"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal --}}
@foreach($blogs as $b)
<div class="modal fade" id="detailContent{{$b->id}}" role="dialog" aria-labelledby="modalContent" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalContent">Article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center><h5 class="form-control-label" style="font-size: 20pt">{{$b->judul}}</h5></center>
                <center>
                    <img src="{{url('images/'.$b->foto)}}" style="width: 200px; padding-bottom:10px">
                </center>
                {!! $b->isi !!}
            </div>
            <div class="modal-footer">
                <h5><i class="fas fa-user"></i> {{$b->author}}</h5>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection