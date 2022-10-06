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
                    <h2>Add Logo
                        <small>Welcome to Super Sweet Club</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Logo</a></li>
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
                            <h2><strong>Add</strong> Logo</h2>
                        </div>

                        <div class="body">
                            <form action="{{route('dashboard.logos.add')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>Main Information</h2>
                                </div>
								<input type="hidden" name="uid" value="1">
          <!--                      <div class="row clearfix">-->
          <!--                          <div class="col-sm-6">-->
          <!--                              <div class="form-group">-->
										<!--<label class="floating-label">Name</label>-->
          <!--                                  <input type="text" name="name" class="form-control"-->
          <!--                                         placeholder="Image Name" value="@if($logos->name !='') {{$logos->name}} @endif">-->
          <!--                                  <span style="color: red; margin-left: 10px"></span>-->
          <!--                              </div>-->
          <!--                          </div>-->
                                    
          <!--                      </div>-->
								

                                <div class="form-group last">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail"
                                             style="width: 200px; height: 150px;">
                                            
                                                 
                                            @if($logos->logo_image !='')     
                                            <img src="{{asset('public/logos/'.$logos->logo_image)}}"
                                                 alt=""/>
                                            @else
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                 alt=""/>
                                            @endif
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px;">
                                        </div>
                                        <div>
                                                <span class="btn btn-dark btn-file">
                                                    <span class="fileinput-new"> Select Avatar </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="logo_image"
                                                           value="{{ old('logo_image', '') }}">
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