@extends('layouts.admin')
@section('title')
Sekbid
@endsection
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Sekbids</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                          <li class="breadcrumb-item"><a href="#">Sekbid</a></li>
                      </ol>
                  </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#addSekbid" data-toggle="modal" data-target="#addSekbid" class="btn btn-sm btn-neutral">New</a>
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
                                    <th>Name</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sekbids as $b)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$b->nama}}</td>
                                    <td>
                                        <a href="#editSekbid{{$b->id}}" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editSekbid{{$b->id}}"><i class="fas fa-pencil-alt text-white"></i></a>
                                        <a href="{{url('sekbid/delete/'.$b->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash text-white"></i></a>
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
<div class="modal fade" id="addSekbid" role="dialog" aria-labelledby="modalContent" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalContent">New Sekbid</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('sekbid/store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-control-label">Name</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal --}}
@foreach($sekbids as $b)
<div class="modal fade" id="editSekbid{{$b->id}}" role="dialog" aria-labelledby="modalContent" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalContent">Edit Sekbid</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('sekbid/'.$b->id)}}" method="post">
                @csrf @method('put')
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-control-label">Name</label>
                        <input type="text" class="form-control" name="nama" value="{{$b->nama}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection