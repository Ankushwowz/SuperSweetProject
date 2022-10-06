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
                    <h2>Add Video
                        <small>Welcome to Super Sweet Club</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Videos</a></li>
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
                            <h2><strong>Add</strong> Videos</h2>
                        </div>

                        <div class="body">
                            <form action="{{route('dashboard.films.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="header col-lg-12 col-md-12 col-sm-12">
                                    <h2>Main Information</h2>
                                </div>
								
								 <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <label class="floating-label">Select Category</label>
                                        <select class="form-control z-index" name="categories" data-live-search="true">
                                            <option selected disabled>- Select Categories -</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <span style="color: red;margin-left: 10px">{{ $errors->first('categories') }}</span>
                                    </div>
                                </div>
                                <br>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <label class="floating-label">Select Actor</label>
                                        <select class="form-control z-index" name="actors" data-live-search="true">
                                            <option selected disabled>- Select Actors -</option>
                                            @foreach ($actors as $actor)
                                                <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                                            @endforeach
                                        </select>
                                        <span style="color: red;margin-left: 10px">{{ $errors->first('actors') }}</span>
                                    </div>
                                </div>

                                <br>
                              
								

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label">Enter Video Name</label>
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Name" value="{{ old('name', '') }}">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label">Enter Video Year</label>
                                            <input type="text" name="year" class="form-control"
                                                   placeholder="Year" value="{{ old('year', '') }}">
                                            <span style="color: red;margin-left: 10px">{{ $errors->first('year') }}</span>
                                        </div>
                                    </div>
                                </div>

                               

                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label">Enter Video Overview</label>
                                            <textarea name="overview" rows="4" class="form-control no-resize"
                                                      placeholder="Video Overview">{{ old('overview', '') }}</textarea>
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('overview') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="url" rows="4" class="form-control no-resize"
                                                      placeholder="Embed Code From JWPlayer Server">{{ old('url', '') }}</textarea>
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('url') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="api_url" rows="4" class="form-control no-resize"
                                                      placeholder="API URL">{{ old('api_url', '') }}</textarea>
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('api_url') }}</span>
                                        </div>
                                    </div>
                                </div>-->

                                <!--<div class="form-group last">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail"
                                             style="width: 200px; height: 150px;">
                                            <label class="floating-label">Upload Cover Image</label>
                                            <img src="http://www.place-hold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                 alt=""/>
                                        </div>
                                        
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px;">
                                        </div>
                                        
                                        <div>
                                                <span class="btn btn-dark btn-file">
                                                    <span class="fileinput-new"> Select Film Background Cover </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="background_covers"
                                                           value="{{ old('background_covers', '') }}">
                                                </span>
                                            <a href="" class="btn btn-danger fileinput-exists"
                                               data-dismiss="fileinput">
                                                Remove </a>
                                        </div>
                                        <span style="color: red; margin-left: 10px">{{ $errors->first('background_covers') }}</span>
                                    </div>
                                </div>-->


                                <div class="form-group last">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <label class="floating-label">Upload Video</label>
                                            <img src="http://www.place-hold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                 alt=""/>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px;">
                                        </div>
                                        <div>
                                                <span class="btn btn-dark btn-file">
                                                    <span class="fileinput-new"> Upload Video </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="video" id="file"
                                                           value="{{ old('video', '') }}">
                                                </span>
                                            <a href="" class="btn btn-danger fileinput-exists"
                                               data-dismiss="fileinput">
                                                Remove </a>
                                                
                                                <!--<br>-->
                                                <!--  <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>-->
                                                <!--  <h3 id="status"></h3>-->
                                                <!--  <p id="loaded_n_total"></p>-->
                                        </div>
                                        <span style="color: red; margin-left: 10px">{{ $errors->first('video') }}</span>
                                    </div>
                                </div>
                                
                                
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="floating-label">Upload Short Video</label>
                                            <input type="file" name="shortvideo" class="form-control"
                                                   placeholder="Short Video" value="{{ old('shortvideo', '') }}">
                                            <span style="color: red; margin-left: 10px">{{ $errors->first('shortvideo') }}</span>
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
        <script src="{{asset('public/web_files/js/bootstrap-fileinput.js')}}"></script>
        // <script>
        //     function _(el) {
        //       return document.getElementById(el);
        //     }
            
        //     function uploadFile() {
        //       var file = _("file1").files[0];
        //       alert(file.name+" | "+file.size+" | "+file.type);
        //       var formdata = new FormData();
        //       formdata.append("file1", file);
        //       var ajax = new XMLHttpRequest();
        //       ajax.upload.addEventListener("progress", progressHandler, false);
        //       ajax.addEventListener("load", completeHandler, false);
        //       ajax.addEventListener("error", errorHandler, false);
        //       ajax.addEventListener("abort", abortHandler, false);
        //       ajax.open("POST", "{{ Request::url() }}"); 
        //       //use file_upload_parser.php from above url
        //       ajax.send(formdata);
        //     }
            
        //     function progressHandler(event) {
        //       _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
        //       var percent = (event.loaded / event.total) * 100;
        //       _("progressBar").value = Math.round(percent);
        //       _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
        //     }
            
        //     function completeHandler(event) {
        //       _("status").innerHTML = event.target.responseText;
        //       _("progressBar").value = 0; //wil clear progress bar after successful upload
        //     }
            
        //     function errorHandler(event) {
        //       _("status").innerHTML = "Upload Failed";
        //     }
            
        //     function abortHandler(event) {
        //       _("status").innerHTML = "Upload Aborted";
        //     }
            
        // </script>
    @endpush

@endsection