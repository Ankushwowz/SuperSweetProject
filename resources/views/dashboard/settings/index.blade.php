@extends('layouts.dashboard.app')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="{{asset('web_files/css/bootstrap-fileinput.css')}}">
    @endpush

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Add Payment Settings
                        <small>Welcome to Super Sweet Club</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Payment Settings</a></li>
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
                            <h2><strong>Add</strong> Payment Settings</h2>
                        </div>

                        <div class="body">
                            <form action="{{route('dashboard.paymentsettings.add')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>Main Information</h2>
                                </div>
								<input type="hidden" name="uid" value="1">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
										<label class="floating-label">Test Secret Key</label>
                                            <input type="text" name="test_secret_key" class="form-control"
                                                   placeholder="Stripe Test Secret Key" value="@if(!empty($payment->test_secret_key)){{$payment->test_secret_key}}@else {{ old('test_secret_key', '') }} @endif">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('test_secret_key') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
										<label class="floating-label">Test Publishable Key</label>
                                            <input type="text" name="test_publishable_key" class="form-control"
                                                   placeholder="Stripe Test Publishable Key" value="@if(!empty($payment->test_publishable_key)){{$payment->test_publishable_key}}@else {{ old('test_publishable_key', '') }} @endif">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('test_publishable_key') }}</span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
										<label class="floating-label">Test Url</label>
                                            <input type="text" name="test_url" class="form-control"
                                                   placeholder="Stripe Test Url" value="@if(!empty($payment->test_url)){{$payment->test_url}}@else {{ old('test_url', '') }} @endif">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('test_url') }}</span>
                                        </div>
                                    </div>
                                    
                                </div>
								
								
								<div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
										<label class="floating-label">Live Secret Key</label>
                                            <input type="text" name="live_secret_key" class="form-control"
                                                   placeholder="Stripe Live Secret Key" value="@if(!empty($payment->live_secret_key)){{$payment->live_secret_key}}@else {{ old('live_secret_key', '') }} @endif">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('live_secret_key') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
										<label class="floating-label">Live Publishable Key</label>
                                            <input type="text" name="live_publishable_key" class="form-control"
                                                   placeholder="Stripe Live Publishable key" value="@if(!empty($payment->live_publishable_key)){{$payment->live_publishable_key}}@else {{ old('live_publishable_key', '') }} @endif">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('live_publishable_key') }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
										<label class="floating-label">Live Url</label>
                                            <input type="text" name="live_url" class="form-control"
                                                   placeholder="Stripe Live Url" value="@if(!empty($payment->live_url)){{$payment->live_url}}@else {{ old('live_url', '') }} @endif">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('live_url') }}</span>
                                        </div>
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
        <script src="{{asset('web_files/js/bootstrap-fileinput.js')}}"></script>
    @endpush

@endsection