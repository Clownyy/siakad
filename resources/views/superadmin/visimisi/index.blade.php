@extends('layouts.admin')
@section('title')
Visimisi
@endsection
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Vision And Misson</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Visson And Mission</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{url('visimisi/create')}}" class="btn btn-sm btn-neutral">New</a>
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
                    <h3 class="mb-0">Form Vision And Misson</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Content</th>
                                    <th>Type</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visimisi as $v)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$v->isi}}</td>
                                    <td>{{$v->tipe}}</td>
                                    <td>
                                        <a href="{{url('visimisi/edit/'.$v->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt text-white"></i></a>
                                        <a href="{{url('visimisi/delete/'.$v->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash text-white"></i></a>
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
@endsection