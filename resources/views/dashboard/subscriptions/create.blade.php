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
                    <h2>Add Subscription
                        <small>Welcome to Films</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Films</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Subscriptions</a></li>
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
                            <h2><strong>Add</strong> Subscriptions</h2>
                        </div>

                        <div class="body">
                            <form action="{{route('dashboard.subscriptions.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>Main Information</h2>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label">Plan Name </label>
                                            <input type="text" name="plan_name" class="form-control"
                                                   placeholder="Plan Name" value="{{ old('plan_name', '') }}">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('plan_name') }}</span>
                                        </div>
                                    </div>
                                  
                                </div>
								
								
								<div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label">Plan Duration </label>
                                            <input type="text" name="plan_duration" class="form-control"
                                                   placeholder="Plan Duration" value="{{ old('plan_duration', '') }}">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('plan_duration') }}</span>
                                        </div>
                                    </div>
									<div class="col-sm-6">
									    <label class="floating-label">Plan Time </label>
                                        <select class="form-control z-index" name="plan_time" >                                                                                    
											<option value="">--Select One--</option>
											<option value="day">day</option>
											<option value="month">Month</option>
                                        </select>
                                        <span style="color: red;margin-left: 10px">{{ $errors->first('plan_time') }}</span>
                                    </div>
									
                                    
                                </div>
								
								<br/>
								<div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label">Plan Price </label>
                                            <input type="text" name="plan_price" class="form-control"
                                                   placeholder="Plan Price" value="{{ old('plan_price', '') }}">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('plan_price') }}</span>
                                        </div>
                                    </div>
                                  
                                </div>
								
								

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label">Plan Description </label>
                                            <textarea name="plan_description" rows="4" class="form-control no-resize"
                                                      placeholder="Plan Description">{{ old('plan_description', '') }}</textarea>
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('plan_description') }}</span>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="form-group last">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail"
                                             style="width: 200px; height: 150px;">
                                            <label class="floating-label">Subscription Image </label>
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
                                        <span style="color: red; margin-left: 10px">{{ $errors->first('subscription_image') }}</span>
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