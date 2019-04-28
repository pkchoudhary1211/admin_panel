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
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3> Register</h3>
				<p>This is the best app ever!</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form method="POST" action="{{ route('register') }}">
                      
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label" for="username">Name :</label>
                                <input type="text" placeholder="Enter Your Name" title="Please enter Name" required="" name="name" id="name" class="form-control" value="{{ old('email') }}">
                                 @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
              
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Email Id :</label>
                                <input type="email" title="Please enter your Email Id" placeholder="Enter Your Email Id " required="" value="" name="email" id="email" class="form-control">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password :</label>
                                <input type="password" title="Please enter your password" placeholder="Enter Your Password " required="" value="" name="password" id="password" class="form-control">
                               @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                               
                            
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Confirm Password :</label>
                                <input type="password" title="Confirm password" placeholder="Confirm Password" required="" value="" 
                                name="password_confirmation" id="password_confirmation" class="form-control">
                              
                               
                            </div>
                    
                            





                            <div class="checkbox login-checkbox">
                                <div class="form-group row">
                            
                            </div>
										
                            </div>

                            <input type="submit"  class="btn btn-success btn-block loginbtn" value="Register"/>
                    
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>happyperks. Template by <a href="https://colorlib.com/wp/templates/">Prakash </a></p>
			</div>
		</div>   
    </div>

 
@include('Admin.include.script')
</body>

</html>