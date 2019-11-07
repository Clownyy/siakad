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
                    <h6 class="h2 text-white d-inline-block mb-0">Vission And Misson</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{url('visimisi')}}">Vission And Misson</a></li>
                            <li class="breadcrumb-item"><a>Add</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{url('visimisi')}}" class="btn btn-sm btn-neutral">Back</a>
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
                    <h3 class="mb-0">New Vission And Misson</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('visimisi/store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Content</label>
                            <textarea type="" class="form-control" id="exampleFormControlInput1" name="isi" placeholder=""></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="exampleFormControlInput1">Type</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="tipe" placeholder="">
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