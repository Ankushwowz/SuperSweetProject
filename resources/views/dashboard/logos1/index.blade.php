@extends('layouts.dashboard.app')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="{{asset('public/dashboard_files/assets/plugins/sweetalert/sweetalert.css')}}"/>
    @endpush

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Upload Logo
                        <small class="text-muted">Welcome to Super Sweet Club</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                   
                        <a href="{{route('dashboard.logos.create')}}">
                            <button class="btn btn-primary btn-icon btn-round d-none d-md-inline-block float-right m-l-10"
                                    type="button">
                                <i class="zmdi zmdi-plus"></i>
                            </button>
                        </a>
                    
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Logo</a></li>
                        <li class="breadcrumb-item active">Upload Logo</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        <div class="header">
                            <h2><strong>Logo </strong><span></span></h2>
                        </div>
                        <div class="body">

                            

                            <div class="tab-content m-t-10">
                                <div class="tab-pane table-responsive active">
                                    <table class="table m-b-0 table-hover">
                                        <thead>
                                        <tr>
                                            <th>Avatar</th>
                                            <th>Name</th>>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($logos as $logo)
                                            <tr>
                                                <td>
                                                    <span class="list-icon">
                                                       @if(!empty($logo->avatar1))
													<img src="{{ URL::to('/') }}/public/logo_avatars/{{$logo->avatar1}}" alt="" style="width: 50px; height: 50px;">
													 @else
													 <img src="{{ URL::to('/') }}/public/images/default.png" alt="" style="width: 50px; height: 50px;">
													 @endif
                                                       
                                                    </span>
                                                </td>
                                       
                                                <td> 
                                                        <a href="{{route('dashboard.logos.edit', $logos)}}">
                                                            <button class="btn btn-icon btn-neutral btn-icon-mini"
                                                                    title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </a>
                                                    

                                                   
                                                        <form action="{{ route('dashboard.logos.destroy', $logos) }}"
                                                              method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                    class="btn btn-icon btn-neutral btn-icon-mini remove_actor"
                                                                    title="Delete" value="{{$logos->id}}">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                  
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="6">There Is No Data...</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{asset('public/dashboard_files/assets/plugins/sweetalert/sweetalert.min.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $(".remove_actor").click(function (e) {
                    var that = $(this);
                    e.preventDefault();

                    var id = $(this).val();
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this Actor!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    }, function () {
                        that.closest('form').submit();
                    });
                });

                $(".show_overview").click(function () {
                    var overview = $(this).val();
                    swal({
                        title: "<spna style='color: #8CD4F5'>Overview</span>",
                        text: "<textarea rows='15' class='form-control no-resize' style='background-color: white!important; cursor: auto!important;' readonly>" + overview + "</textarea>",
                        html: true
                    });
                });

                $(".show_biography").click(function () {
                    var biography = $(this).val();
                    swal({
                        title: "<spna style='color: #8CD4F5'>Biography</span>",
                        text: "<textarea rows='15' class='form-control no-resize' style='background-color: white!important; cursor: auto!important;' readonly>" + biography + "</textarea>",
                        html: true
                    });
                });
            });
        </script>
    @endpush

@endsection