@include('Admin.include.header')
@include('Admin.include.sidebar')
@include('Admin.include.topmainmenu')

<div class="container">
   
  <h1>UserProfile</h1>
                @if(Session::has('name'))
                    <div class="lobibox-notify lobibox-notify-success animated-fast fadeInDown" style="width: 400px;"><div class="lobibox-notify-icon-wrapper"><div class="lobibox-notify-icon"><div><div class="icon-el"><i class="glyphicon glyphicon-ok-sign"></i></div></div></div></div><div class="lobibox-notify-body"><div class="lobibox-notify-title">Success<div></div></div><div class="lobibox-notify-msg" style="max-height: 60px;">{{ Session::get('name') }}</div></div><span class="lobibox-close">×</span></div>
               
                @endif

    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="{{asset('adminassets/images/pks.png')}}"  height="100px" alt="Profile image example"/>
        <img align="left" class="fb-image-profile thumbnail" src="{{asset('adminassets/images/pk.png')}}" alt="Profile image example"/>
        <div class="fb-profile-text">
            <h1>{{Auth::user()->name}}</h1>
          <h4 style="color: green">{{$role->display_name}}</h4>
            <p>{{Auth::user()->email}} <br> @if(count($temp_id)==1) <font color="blue"> Please  Verify Your Id </font> <b> {{$temp_id->temp_user_email}}<b/>  @endif</p>
            

            <div class="modal-bootstrap modal-login-form">
                <a class="zoomInDown mg-t" href="#" data-toggle="modal" data-target="#zoomInDown1">Update Name</a>
            </div>
            <div class="modal-bootstrap modal-login-form">
                <a class="zoomInDown mg-t" href="#" data-toggle="modal" data-target="#zoomInDown2">Add Email</a>
            </div>
             <div class="modal-bootstrap modal-login-form">
                <a class="zoomInDown mg-t" href="#" data-toggle="modal" data-target="#zoomInDown3">Change Password</a>
            </div>
        </div>
    </div>
     @if(Session::has('info'))
                <div class="lobibox-notify lobibox-notify-info animated-fast fadeInDown" style="width: 500px;"><div class="lobibox-notify-icon-wrapper"><div class="lobibox-notify-icon"><div><div class="icon-el"><i class="glyphicon glyphicon-info-sign"></i></div></div></div></div><div class="lobibox-notify-body"><div class="lobibox-notify-title">Information<div></div></div><div class="lobibox-notify-msg" style="max-height: 96px;">{{Session::get('info')}}</div></div><span class="lobibox-close">×</span></div>
    @endif
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
<br><br>
        <div class="container-fluid well span6">
          <div class="row-fluid">
                
                
                <div class="span2">
                    <div class="btn-group">
                        <h1>Client Code : </h1>
                    </div>
                </div>
                 @if(Session::has('message'))
                    <div class="lobibox-notify lobibox-notify-success animated-fast fadeInDown" style="width: 400px;"><div class="lobibox-notify-icon-wrapper"><div class="lobibox-notify-icon"><div><div class="icon-el"><i class="glyphicon glyphicon-ok-sign"></i></div></div></div></div><div class="lobibox-notify-body"><div class="lobibox-notify-title">Success<div></div></div><div class="lobibox-notify-msg" style="max-height: 60px;">{{ Session::get('message') }}</div></div><span class="lobibox-close">×</span></div>
               
                @endif

                <table class="table border-table">
                                              <thead class="thead-dark">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Secret</th>
                                                        <th>Redirect URL</th>
                                                        <th>Action</th>
                                                    </tr>
                                              </thead>
                                              <tbody>
                                               
                                             @foreach($secret as $val)
                                                <tr>
                                                    <td>{{$val->name}} </td>
                                                    <td>{{$val->secret}}</td>
                                                    <td>{{$val->redirect}}</td>
                                                    <td>
                                                      <a href="{{route('regenerate_client_secret',$val->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-retweet">   </span>    Re-Generate</a>
                                                      <!-- <a href="{{url('edit_permission/'.$val->id)}}" class="btn btn-warning"> Edit</a> -->
                                                       
                                            
                                                    </td>
                                                    
                                                </tr>
                                            @endforeach
                                             </tbody>
                                    </table>
                                    
        </div>
        </div>
</div> 
<!-- tabs start-->

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div>
                            
                            <div class="sparkline11-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            
                                            <div id="zoomInDown1" class="modal modal-edu-general modal-zoomInDown fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        
                                                        <div class="modal-body">
                                                            <div class="modal-login-form-inner">
                                                                <!-- <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="login-social-inner">
                                                                            <a href="#" class="button btn-social facebook span-left"> <span><i class="fa fa-facebook"></i></span> Facebook </a>
                                                                            <a href="#" class="button btn-social twitter span-left"> <span><i class="fa fa-twitter"></i></span> Twitter </a>
                                                                            <a href="#" class="button btn-social googleplus span-left"> <span><i class="fa fa-google-plus"></i></span> Google+ </a>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="basic-login-inner modal-basic-inner">
                                                                            <h3>Update Your Name</h3>
                                                                                    @if ($errors->any())
                                                                                        <div class="alert alert-danger">
                                                                                            <ul>
                                                                                                @foreach ($errors->all() as $error)
                                                                                                    <li>{{ $error }}</li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        </div>
                                                                                    @endif

                                                                            <form action="{{route('update_name')}}" id="updateName" method="post">
                                                                              @csrf
                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                            <label class="login2">Name :</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <input type="text" required="true" class="form-control" name="name" id="name" value="{{Auth::user()->name}}" placeholder="Enter Name" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                               <!--  <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                            <label class="login2">Email</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <input type="email" class="form-control" placeholder="Enter Email"/>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->
                                                                                <div class="login-btn-inner">
                                                                                    
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <div class="login-horizental">
                                                                                                <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Update</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>






                                        <div id="zoomInDown2" class="modal modal-edu-general modal-zoomInDown fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        
                                                        <div class="modal-body">
                                                            <div class="modal-login-form-inner">
                                                                <!-- <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="login-social-inner">
                                                                            <a href="#" class="button btn-social facebook span-left"> <span><i class="fa fa-facebook"></i></span> Facebook </a>
                                                                            <a href="#" class="button btn-social twitter span-left"> <span><i class="fa fa-twitter"></i></span> Twitter </a>
                                                                            <a href="#" class="button btn-social googleplus span-left"> <span><i class="fa fa-google-plus"></i></span> Google+ </a>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="basic-login-inner modal-basic-inner">
                                                                            <h3>Update Your Email</h3>
                                                                                    @if ($errors->any())
                                                                                        <div class="alert alert-danger">
                                                                                            <ul>
                                                                                                @foreach ($errors->all() as $error)
                                                                                                    <li>{{ $error }}</li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        </div>
                                                                                    @endif

                                                                            <form action="{{route('update_email')}}" id="updateEmail" method="post">
                                                                              @csrf
                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                            <label class="login2">Email</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <input type="email" value="{{Auth::user()->email}}" class="form-control" name="email" id="email" placeholder="Enter Email" required="true" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                               <!--  <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                            <label class="login2">Email</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <input type="email" class="form-control" placeholder="Enter Email"/>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->
                                                                                <div class="login-btn-inner">
                                                                                    
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <div class="login-horizental">
                                                                                                <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Verify</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                        <div id="zoomInDown3" class="modal modal-edu-general modal-zoomInDown fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        
                                                        <div class="modal-body">
                                                            <div class="modal-login-form-inner">
                                                                <!-- <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="login-social-inner">
                                                                            <a href="#" class="button btn-social facebook span-left"> <span><i class="fa fa-facebook"></i></span> Facebook </a>
                                                                            <a href="#" class="button btn-social twitter span-left"> <span><i class="fa fa-twitter"></i></span> Twitter </a>
                                                                            <a href="#" class="button btn-social googleplus span-left"> <span><i class="fa fa-google-plus"></i></span> Google+ </a>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="basic-login-inner modal-basic-inner">
                                                                            <h3>Change Password</h3>
                                                                                    @if ($errors->any())
                                                                                        <div class="alert alert-danger">
                                                                                            <ul>
                                                                                                @foreach ($errors->all() as $error)
                                                                                                    <li>{{ $error }}</li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        </div>
                                                                                    @endif

                                                                            <form action="{{route('change_password')}}" id="Change_password" method="post">
                                                                              @csrf
                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                            <label class="login2">Current Password</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <input type="Password" class="form-control" name="current_password" id="current_password" placeholder="Enter Password"  />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                            <label class="login2">New Password</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <input type="Password" name="new_password" id="new_password" class="form-control" placeholder="Enter  New Password"/>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group-inner">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                                            <label class="login2">Confirm Password</label>
                                                                                        </div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <input type="Password"  name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter Confirm Password"/>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="login-btn-inner">
                                                                                    
                                                                                    <div class="row">
                                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                                            <div class="login-horizental">
                                                                                                <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Update</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


<link rel="stylesheet" type="text/css" href="{{asset('adminassets/css/profile.css')}}">

@include('Admin.include.footer')

      
          
              

