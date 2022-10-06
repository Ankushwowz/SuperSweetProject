@extends('layouts.dashboard.app')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="{{asset('public/public/web_files/css/bootstrap-fileinput.css')}}">
    @endpush

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Edit Slider
                        <small>Welcome to Super Sweet Club</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Slider</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Edit</strong> Slider</h2>
                        </div>

                        <div class="body">
                            <form action="{{url('/dashboard/sliders', ['id'=>$banner->id])}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>Main Information</h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label">Title</label>
                                            <input type="text" name="title" class="form-control"
                                                   placeholder="Title" value="{{ $banner->title }}">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('title') }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label">Footer Title 2</label>
                                            <input type="text" name="title2" class="form-control"
                                                   placeholder="Title" value="{{ $banner->title2 }}">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('title2') }}</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label">Footer Year</label>
                                            <input type="text" name="footeryear" class="form-control"
                                                   placeholder="Year" value="{{ $banner->footeryear }}">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('footeryear') }}</span>
                                        </div>
                                    </div>
                                    
                                </div>

                               

                                <!--<div class="form-group last">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail"
                                             style="width: 200px; height: 150px;">
                                            <img src="{{asset('public/home_slider/'.$banner->slider)}}"
                                                 alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px;">
                                        </div>
                                        <div>
                                                <span class="btn btn-dark btn-file">
                                                    <span class="fileinput-new"> Select Slider Avatar </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="slider"
                                                           value="{{$banner->slider}}">
                                                </span>
                                            <a href="" class="btn btn-danger fileinput-exists"
                                               data-dismiss="fileinput">
                                                Remove </a>
                                        </div>
                                        <span style="color: red; margin-left: 10px">{{ $errors->first('slider') }}</span>
                                    </div>
                                </div>-->


                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round">Edit</button>
                                        <button type="reset" class="btn btn-default btn-round btn-simple">Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{asset('public/public/web_files/js/bootstrap-fileinput.js')}}"></script>
    @endpush

@endsection