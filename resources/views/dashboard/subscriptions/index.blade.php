@extends('layouts.dashboard.app')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="{{asset('public/dashboard_files/assets/plugins/sweetalert/sweetalert.css')}}"/>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    @endpush
	

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>All Subscriptions
                        <small class="text-muted">Welcome to Subscriptions</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                   
                        <a href="{{route('dashboard.subscriptions.create')}}">
                            <button class="btn btn-primary btn-icon btn-round d-none d-md-inline-block float-right m-l-10"
                                    type="button">
                                <i class="zmdi zmdi-plus"></i>
                            </button>
                        </a>
                   
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="zmdi zmdi-home"></i> Subscriptions</a>
                        </li>
						<!--<li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Subscriptions</a>
                        </li>-->
                        <!--<li class="breadcrumb-item"><a href="javascript:void(0);">Actors</a></li>-->
                        <li class="breadcrumb-item active">All Subscriptions</li>
                    </ul>
                </div>
            </div>
        </div>
			<div class="messages"></div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        
                        <div class="body">

                            <div class="col-5" style="padding-left: 0px">
                                <form action="{{ route('dashboard.subscriptions.index') }}" method="GET">
                                    <div class="input-group" style="margin-bottom: 0px">
                                        <input type="text" class="form-control" placeholder="Search..."
                                               name="search" value="{{ request()->search }}">
                                        <button class="input-group-addon" type="submit">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-content m-t-10">
                                <div class="tab-pane table-responsive active">
                                    <table class="table m-b-0 table-hover">
                                        <thead>
                                        <tr>
                                            <th>Plan Image</th>
                                            <th>Plan Name</th>
                                            <th>Plan Duration</th>
                                            <th>Duration Time</th>
                                            <th>Plan Price</th>
                                            <th>Description</th>
                                            <!--<th>Status</th>-->
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
											@forelse($subscriptions as $subscription)
                                            <tr>
                                                <td>
                                                    <span class="list-icon">
													<img src="{{ URL::to('/') }}/public/subscriptions/{{$subscription->subscription_image}}"
                                                             alt=""
                                                             style="width: 50px; height: 50px;">

                                                    </span>
                                                </td>
                                                <td><span class="list-name">{{$subscription->plan_name}}</span></td>
                                                <td><span class="list-name">{{$subscription->plan_duration}}</span></td>
                                                <td><span class="list-name">{{$subscription->plan_time}}</span></td>
                                                <td><span class="list-name">{{$subscription->plan_price}}</span></td>
                                               
                                                <td>
                                                    <button title="show overview"
                                                            value="{{$subscription->plan_description}}"
                                                            class="btn btn-icon btn-neutral btn-icon-mini show_biography">
                                                        <i class="zmdi zmdi-reader"></i>
                                                    </button>
                                                </td>
												<!--<td>-->
												
												
												<!--	<input data-id="{{$subscription->id}}" class="toggle-class-btn" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $subscription->subscription_status ? 'checked' : '' }}>-->
												<!--</td>-->
                                                
                                                <td>
                                                    
                                                        <a href="{{route('dashboard.subscriptions.edit', $subscription)}}">
                                                            <button class="btn btn-icon btn-neutral btn-icon-mini"
                                                                    title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </a>
                                                    
                                                        <form action="{{ route('dashboard.subscriptions.destroy', $subscription) }}"
                                                              method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                    class="btn btn-icon btn-neutral btn-icon-mini remove_subscription"
                                                                    title="Delete" value="{{$subscription->id}}">
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
                {{$subscriptions->appends(request()->query())->links()}}
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{asset('public/dashboard_files/assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
		<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".remove_subscription").click(function (e) {
                    var that = $(this);
                    e.preventDefault();

                    var id = $(this).val();
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this Subscription!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    }, function () {
                        that.closest('form').submit();
                    });
                });


                $(".show_biography").click(function () {
                    var desc = $(this).val();
                    swal({
                        title: "<spna style='color: #8CD4F5'>Description</span>",
                        text: "<textarea rows='15' class='form-control no-resize' style='background-color: white!important; cursor: auto!important;' readonly>" + desc + "</textarea>",
                        html: true
                    });
                });
				
				

			$('.toggle-class-btn').change(function() { 
				
				var status = $(this).prop('checked') == true ? 1 : 0;  
				//alert(status);
				var id = $(this).data('id');  
				//alert(user_id); return false;	
				 console.log(status); 

				$.ajax({
				    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
					method: "POST", 

					dataType: "json", 

					url: '{{url('dashboard/userChangeStatus')}}', 

					data: {'status': status, 'id': id}, 

					success: function(data){ 
					if(data.success == true){
					var messages = $('.messages');

					var successHtml = '<div class="alert alert-success">'+
					'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
					'<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></</strong> '+ data.message +
					'</div>';

					$(messages).html(successHtml);
					}
					 //console.log(data.success); 
					 //console.log(data.message); 

					} 

				}); 

			}); 


				
				
				
            });
        </script>
    @endpush

@endsection