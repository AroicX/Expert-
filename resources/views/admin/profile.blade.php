@extends('admin\layout.app')

@section('title')
        <title>My Profile</title>
@endsection


@section('this')
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">My Profile</li>
@endsection

@section('content')
<div class="row">
    <!-- Column -->

    <div class="col-lg-12">
        <div class="card">
            @if(session('info'))
                        <div class='alert alert-success'>
                          <button class='close' data-dismiss='alert'>&times;</button>
                            <strong>Success! </strong> {{session('info')}}
                        </div>
                          
                        @endif

            <div class="card-body">
                <div class="card-two">
                    <header>
                        <div class="avatar">
                            <img src="/images/2.png" alt="avatar" />
                        </div>
                    </header>

                    <h3>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h3>
                    <div class="desc">
                       Email Address: {{Auth::user()->email}}
                    </div>
                    <div class="contacts">
                        <a href=""><i class="fa fa-plus"></i></a>
                        <a href=""><i class="fa fa-whatsapp"></i></a>
                        <a href=""><i class="fa fa-envelope"></i></a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
          
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Change Password</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane " id="home" role="tabpanel">
                    <div class="card-body">
                        
                    </div>
                </div>
                <!--second tab-->
                <div class="tab-pane active" id="profile" role="tabpanel">
                    <div class="card-body">
                        <br>
                        <br>
                        <br>
                        <div class="row">
                          <br>
                          <br>
                          <br>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                <br>
                                <p class="text-muted">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</p>
                            </div><br>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Username</strong>
                                <br>
                                <p class="text-muted">{{Auth::user()->username}}</p>
                            </div><br>
                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                <br>
                                <p class="text-muted">{{Auth::user()->email}}</p>
                            </div><br>
                            
                        </div>
                        <hr>
                        <p class="m-t-30">

                         </p>
                        
                        
                    </div>
                </div>
                <div class="tab-pane" id="settings" role="tabpanel">
                    <div class="card-body">
                      <br>
                      <br>
                      <br>
                        <form class="form-horizontal form-material" action="{{ route('updatePassword', array(Auth::user()->id))}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-12">Current Password:</label>
                                <div class="col-md-12">
                                    <input type="Password"  name="cpass" value="" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">New Password:</label>
                                <div class="col-md-12">
                                    <input type="Password"  name="newpass" value="" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Confirm Password:</label>
                                <div class="col-md-12">
                                    <input type="Password"  name="cnewpass" value="" class="form-control form-control-line">
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" >Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
@endsection
