@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                            <section class="content">
                                <div class="container-fluid">
                                    <!-- Small boxes (Stat box) -->
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-secondary">
                                                <div class="inner">
                                                    <h3>{{$tenants}}</h3>
                                                    <p>Reports</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-file"></i>
                                                </div>
                                                <a href="{{route('admin.answers.index')}}" class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-success">
                                                <div class="inner">
                                                    <h3>{{$landlords}}</h3>
                                                    <p>Respondents</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-user-friends"></i>
                                                </div>
                                                <a href="{{route('admin.respondents.index')}}" class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>{{$properties}}<sup style="font-size: 20px"></sup></h3>

                                                    <p>Media Files</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fas fa-hotel"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <h3>{{$houseUnits}}</h3>
                                                    <p>Users</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fas fa-user"></i>
                                                </div>
                                                <a href="{{route('admin.users.index')}}" class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                    </div>
                                    <!-- /.row -->
                                </div><!-- /.container-fluid -->
                            </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent

@endsection
