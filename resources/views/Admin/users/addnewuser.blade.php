@include('Admin.include.header')
@include('Admin.include.sidebar')
@include('Admin.include.topmainmenu')

            <!-- Mobile Menu end -->
            
<br/>
<br/>
<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                     <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="devit-card-custom">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">New User</a></li>
                              
                            </ul>
                            
                                <div class="product-tab-list tab-pane fade active in" id="reviews">
                                    <div class="row">
                                         <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                            <div class="devit-card-custom">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="devit-card-custom">
                                                            @if ($errors->any())
                                                                <div class="alert alert-danger">
                                                                    <ul>
                                                                        @foreach ($errors->all() as $error)
                                                                            <li>{{ $error }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                            <form method="POST" id="addaccount" name="addaccount"  action="{{ route('add_user_account') }}">
                      
                                                             {{csrf_field()}}
                                                            <div class="form-group">
                                                                <label class="control-label" for="username">Name :</label>
                                                                    <input type="text" placeholder="Enter Your Name" title="Please enter Name"  name="name" id="name" class="form-control" value="{{ old('email') }}">
                                                                     @if ($errors->has('name'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('name') }}</strong>
                                                                        </span>
                                                                    @endif
                                                            </div>
                                                            <div class="form-group">
                                                               <label class="control-label" for="password">Email Id :</label>
                                                                <input type="email" title="Please enter your Email Id" placeholder="Enter Your Email Id " value="" name="email" id="email" class="form-control">
                                                                @if ($errors->has('email'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label" for="Role"> Role :</label>
                                
                             
                                   
                                                                <select  class="form-control" name="role"  id="role">
                                                                    <option value=""> Please Select Role</option>
                                                                    @foreach($role as $Role)
                                                                        <option value="{{$Role->id}}">{{$Role->name}}</option>
                                                                    @endforeach
                                                               
                                                                </select>
                                                            </div>
                                                            <!-- <div class="form-group">
                                                               <label class="control-label" for="password">Password :</label>
                                                                    <input type="password" title="Please enter your password" placeholder="Enter Your Password "  value="" name="password" id="password" class="form-control">
                                                                   @if ($errors->has('password'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('password') }}</strong>
                                                                        </span>
                                                                    @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label" for="password">Confirm Password :</label>
                                                                <input type="password" title="Confirm password" placeholder="Confirm Password"  value="" 
                                                                name="password_confirmation" id="password_confirmation" class="form-control">
                                                              
                                                               
                                                            </div> -->
                                                            <input type="Submit" class="btn btn-primary waves-effect waves-light" value="Save"></button>
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
  

</script>
@include('Admin.include.footer')