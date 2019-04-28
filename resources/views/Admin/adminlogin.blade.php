 <!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Happyperks</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    @include('Admin.include.stylesheet')
    <!-- modernizr JS
        ============================================ -->
    <script src="{{asset('adminpanel/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body bgcolor="blue">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="error-pagewrap">
        <div class="error-page-int">
            @if(Session::has('info'))
                        <div class="lobibox-notify lobibox-notify-info animated-fast fadeInDown" style="width: 500px;"><div class="lobibox-notify-icon-wrapper"><div class="lobibox-notify-icon"><div><div class="icon-el"><i class="glyphicon glyphicon-info-sign"></i></div></div></div></div><div class="lobibox-notify-body"><div class="lobibox-notify-title">Information<div></div></div><div class="lobibox-notify-msg" style="max-height: 96px;">{{Session::get('info')}}</div></div><span class="lobibox-close">×</span></div>
            @endif

            @if(Session::has('message'))
                            <p class="lobibox-notify-wrapper bottom right"></p>
                            <div class="lobibox-notify-wrapper bottom right"><div class="lobibox-notify lobibox-notify-error animated-fast fadeInDown" style="width: 400px;"><div class="lobibox-notify-icon-wrapper"><div class="lobibox-notify-icon"><div><div class="icon-el"><i class="glyphicon glyphicon-remove-sign"></i></div></div></div></div><div class="lobibox-notify-body"><div class="lobibox-notify-title">Error<div></div></div><div class="lobibox-notify-msg" style="max-height: 60px;">{{ Session::get('message') }}</div></div><span class="lobibox-close">×</span></div></div>
                           
            @endif
            <div class="text-center m-b-md custom-login">
                <h3>LOGIN </h3>
            
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        
                        <form method="POST" action="{{ route('login') }}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" name="email" id="email" class="form-control" value="{{ old('email') }}">
                                 @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
              
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                 @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                            <div class="checkbox login-checkbox">
                                <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="i-checks" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                         <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                                        
                            </div>

                            <input type="submit"  class="btn btn-success btn-block loginbtn" value="Login"/>
                           
                        </form>
                    </div>
                </div>
            </div>
           <!--  <div class="text-center login-footer">
                <p>happyperks. Template by <a href="https://colorlib.com/wp/templates/">Prakash </a></p>
            </div> -->
        </div>   
    </div>
    <!-- jquery
        ============================================ -->
 
@include('Admin.include.script')
</body>

</html>











        