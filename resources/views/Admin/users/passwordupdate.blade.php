<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    @include('Admin.include.stylesheet')
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center m-b-md custom-login">
                <h3>Update Password</h3>
               
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('update_onetime_password')}}" method="post" id="updatepassword" name="updatepassword">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" hidden="true" readonly="true" name="userid" value="{{$value->user_email}}">
                                <label class="control-label" for="username">Old Password</label>
                                <input type="text" placeholder="********" title="Please enter old Password"  value="" name="oldpassword" id="oldpassword" class="form-control">
                               
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">New Password</label>
                                <input type="password" title="Please enter New password" placeholder="******"  value="" name="newpassword" id="newpassword" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Confirm Password</label>
                                <input type="password" title="Please enter Confirm password" placeholder="******"  value="" name="confirmPassword" id="confirmPassword" class="form-control">
                                
                            </div>

                           
                            <button class="btn btn-success btn-block loginbtn">Update</button>
                  
                        </form>
                    </div>
                </div>
            </div>
            <div class="text-center login-footer">
                <p>HappyPerks <a href="#">Colorlib</a></p>
            </div>
        </div>   
    </div>


@include('Admin.include.script')
</body>

</html>