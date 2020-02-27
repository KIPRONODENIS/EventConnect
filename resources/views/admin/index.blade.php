@extends('layouts.admin')
                  @section('content')
                    <div class="container-fluid">
                      @if(session()->has('success'))
                   <div class="alert alert-success">{{session('success')}}</div>
                      @endif
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Revenue</div>
                                    <h1 class="h4 mx-3">Kshs. {{$revenue}}</h1>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('admin.payments')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Users</div>
                                    <h1 class="h4 mx-3">{{$users}}</h1>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#users">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Invitations</div>
                                    <h1 class="h4 mx-3">{{$invitations}}</h1>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('admin.invitations')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Events</div>
                                    <h1 class="h4 mx-3">{{$events}}</h1>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('admin.events')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Revenue Per Month</div>
                                    <div class="card-body">

                     <h1></h1>
                     {!! $chart1->renderHtml() !!}

                 </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Invitations Per Month</div>
                                    <div class="card-body">
   {!! $chart2->renderHtml() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4" id="users">
                            <div class="card-header"><i class="fas fa-users"></i> All Users</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Roles</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>

                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Roles</th>
                                                <th>Action</th>

                                            </tr>
                                        </tfoot>

                                        <tbody>
@foreach($all_users as $user)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->roles->first()->name ?? "Client"}}</td>
                                                <td>
                                                  <a class="btn btn-success" href="{{route('admin.user.view',$user->id)}}" >view</a>
                                                  <a class="btn btn-primary" href="{{route('admin.user.edit',$user->id)}}"  >Edit</a>
                                                  <a class="btn btn-danger" href="{{route('admin.user.delete',$user->id)}}"  >Delete</a>
                                                </td>

                                            </tr>
@endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {!! $chart1->renderChartJsLibrary() !!}

{!! $chart1->renderJs() !!}
{!! $chart2->renderJs() !!}

                    @endsection
