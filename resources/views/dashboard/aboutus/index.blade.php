@extends('layouts.dashboard.app')

@section('content')

      @push('styles')
        <link rel="stylesheet" href="{{asset('public/web_files/css/bootstrap-fileinput.css')}}">
        <link href="{{asset('public/dashboard_files/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"
              rel="stylesheet"/>
    @endpush

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Add About Us
                        <small>Welcome to Super Sweet Club</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">About US</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Add</strong> About Us</h2>
                        </div>

                        <div class="body">
                            <form action="{{route('dashboard.aboutus.add')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>Main Information</h2>
                                </div>
								<input type="hidden" name="uid" value="1">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
										<label class="floating-label">Page Name</label>
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Page name" value="">
                                            <span style="color: red; margin-left: 10px"></span>
                                        </div>
                                    </div>
                                    
                                </div>
								
								
								<div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="plan_description" rows="4" class="form-control no-resize"
                                                      placeholder="Plan Description"></textarea>
                                            <span style="color: red; margin-left: 10px"></span>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="form-group last">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail"
                                             style="width: 200px; height: 150px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                 alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px;">
                                        </div>
                                        <div>
                                                <span class="btn btn-dark btn-file">
                                                    <span class="fileinput-new"> Select Subscription Avatar </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="subscription_image"
                                                           value="{{ old('subscription_image', '') }}">
                                                </span>
                                            <a href="" class="btn btn-danger fileinput-exists"
                                               data-dismiss="fileinput">
                                                Remove </a>
                                        </div>
                                        <span style="color: red; margin-left: 10px"></span>
                                    </div>
                                </div>
								

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round">Add</button>
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
        <script src="{{asset('public/web_files/js/bootstrap-fileinput.js')}}"></script>
    @endpush

@endsection