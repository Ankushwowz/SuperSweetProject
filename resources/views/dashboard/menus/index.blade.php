@extends('layouts.dashboard.app')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="{{asset('public/dashboard_files/assets/plugins/sweetalert/sweetalert.css')}}"/> <style>
        .block-header a.social-page {
            display: none;
        }
        </style>
    @endpush

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>All Menus
                        <small class="text-muted">Welcome to Super Sweet Club</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                        
                        @if(count($homemenus) >= 1)
                        <a href="{{route('dashboard.socials.create')}}" class="social-page">
                            <button class="btn btn-primary btn-icon btn-round d-none d-md-inline-block float-right m-l-10"
                                    type="button">
                                <i class="zmdi zmdi-plus"></i>
                            </button>
                        </a>
                        @else
                        <a href="{{route('dashboard.socials.create')}}">
                            <button class="btn btn-primary btn-icon btn-round d-none d-md-inline-block float-right m-l-10"
                                    type="button">
                                <i class="zmdi zmdi-plus"></i>
                            </button>
                        </a>
                        @endif
                        
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Menus</a></li>
                        <li class="breadcrumb-item active">All Menus</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        
                        <div class="body">

                            <!--<div class="col-5" style="padding-left: 0px">-->
                            <!--    <form action="{{ route('dashboard.menus.index') }}" method="GET">-->
                            <!--        <div class="input-group" style="margin-bottom: 0px">-->
                            <!--            <input type="text" class="form-control" placeholder="Search..."-->
                            <!--                   name="search" value="{{ request()->search }}">-->
                            <!--            <button class="input-group-addon" type="submit">-->
                            <!--                <i class="zmdi zmdi-search"></i>-->
                            <!--            </button>-->
                            <!--        </div>-->
                            <!--    </form>-->
                            <!--</div>-->

                            <div class="tab-content m-t-10">
                                <div class="tab-pane table-responsive active">
                                    <table class="table m-b-0 table-hover">
                                        <thead>
                                        <tr>
                                            <th>Menu</th>
                                            <th>Url</th>
                                            <th>Menu 2</th>
                                            <th>Url 2</th>
                                            <th>Menu 3</th>
                                            <th>Url 3</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($homemenus as $menu)
                                            <tr>
                                                <td><span class="list-name">{{$menu->menu}}</span></td>
                                                <td><span class="list-name">{{$menu->url}}</span></td>
                                                <td><span class="list-name">{{$menu->menu1}}</span></td>
                                                <td><span class="list-name">{{$menu->url1}}</span></td>
                                                <td><span class="list-name">{{$menu->menu2}}</span></td>
                                                <td><span class="list-name">{{$menu->url2}}</span></td>
                                                
                                                <td>
                                                   
                                                        <a href="{{url('/dashboard/menus/'. $menu->id . '/edit')}}">
                                                            <button class="btn btn-icon btn-neutral btn-icon-mini"
                                                                    title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </a>
                                                    

                                                   
                                                        <form action="{{url('/dashboard/menus', ['id'=>$menu->id])}}"
                                                              method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                    class="btn btn-icon btn-neutral btn-icon-mini remove_menu"
                                                                    title="Delete" value="{{$menu->id}}">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                  
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="5">There Is No Data...</td>
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
                $(".remove_menu").click(function (e) {
                    var that = $(this);
                    e.preventDefault();

                    var id = $(this).val();
					//alert(id); return false;
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this banner!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    }, function () {
                        that.closest('form').submit();
                    });
                });

            });
        </script>
    @endpush

@endsection