@extends('layouts.admin')
@section('title')
About
@endsection
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">About</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{url('about')}}">About</a></li>
                            <li class="breadcrumb-item"><a>Update</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{url('about')}}" class="btn btn-sm btn-neutral">Back</a>
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
                    <h3 class="mb-0">Update About</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('about/'.$about->id)}}" enctype="multipart/form-data">
                        @csrf @method('put')
                        <div class="form-group">
                            <label class="form-control-label" for="alamat">Address</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{$about->alamat}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$about->email}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="notelp">Phone Number</label>
                            <input type="text" class="form-control" id="notelp" name="notelp" value="{{$about->notelp}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="fax">Fax</label>
                            <input type="text" class="form-control" id="fax" name="fax" value="{{$about->fax}}">
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