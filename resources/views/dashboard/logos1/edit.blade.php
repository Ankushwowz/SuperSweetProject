@extends('layouts.dashboard.app')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="{{asset('public/web_files/css/bootstrap-fileinput.css')}}">
    @endpush

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Edit Actor
                        <small>Welcome to Super Sweet Club</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Actors</a></li>
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
                            <h2><strong>Edit</strong> Actors</h2>
                        </div>

                        <div class="body">
                            <form action="{{route('dashboard.actors.update', $actor)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>Main Information</h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label">Actor Name</label>
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Name" value="{{ $actor->name }}">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label">Actor DOB</label>
                                            <input type="text" name="dob" class="form-control"
                                                   placeholder="Date Of Birth" value="{{ $actor->dob }}"
                                                   onfocus="(this.type='date')"
                                                   onblur="(this.type='text')"
                                                   style="text-align: left">
                                            <span style="color: red;margin-left: 10px">{{ $errors->first('dob') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label">Overview</label>
                                            <textarea name="overview" rows="4" class="form-control no-resize"
                                                      placeholder="Actor Overview">{{ $actor->overview }}</textarea>
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('overview') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label">Actor Biography</label>
                                            <textarea name="biography" rows="4" class="form-control no-resize"
                                                      placeholder="Actor Biography">{{ $actor->biography }}</textarea>
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('biography') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group last">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail"
                                             style="width: 200px; height: 150px;">
                                            <label class="floating-label">Actor Image</label>
                                            <img src="{{asset('public/actor_avatars/'.$actor->avatar1)}}"
                                                 alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px;">
                                        </div>
                                        <div>
                                                <span class="btn btn-dark btn-file">
                                                    <span class="fileinput-new"> Select Actor Avatar </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="avatar1"
                                                           value="{{$actor->avatar1}}">
                                                </span>
                                            <a href="" class="btn btn-danger fileinput-exists"
                                               data-dismiss="fileinput">
                                                Remove </a>
                                        </div>
                                        <span style="color: red; margin-left: 10px">{{ $errors->first('avatar1') }}</span>
                                    </div>
                                </div>

                                <!--<div class="form-group last">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail"
                                             style="width: 200px; height: 150px;">
                                            <label class="floating-label">Actor Background Image </label>
                                            <img src="{{asset('public/actor_background_covers/'.$actor->background_cover1)}}"
                                                 alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px;">
                                        </div>
                                        <div>
                                                <span class="btn btn-dark btn-file">
                                                    <span class="fileinput-new"> Select Actor Background_Cover </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="background_cover1"
                                                           value="{{$actor->background_cover1}}">
                                                </span>
                                            <a href="" class="btn btn-danger fileinput-exists"
                                               data-dismiss="fileinput">
                                                Remove </a>
                                        </div>
                                        <span style="color: red; margin-left: 10px">{{ $errors->first('background_cover1') }}</span>
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
        <script src="{{asset('public/web_files/js/bootstrap-fileinput.js')}}"></script>
    @endpush

@endsection