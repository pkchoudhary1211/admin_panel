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
                                <li class="active"><a href="#description">Edit User</a></li>
                              
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
                                                            <form method="POST" id="addaccount" name="addaccount"  action="{{ route('edit_user_request') }}">
                      
                                                             {{csrf_field()}}
                                                            <div class="form-group">
                                                                <input type="text" hidden="true" name="user_Id" value="{{$user->id}}">
                                                                    <label class="control-label" for="username">Name :</label>
                                                                    <input type="text" placeholder="Enter Your Name" title="Please enter Name"  name="name" id="name" class="form-control" value="{{$user->name}}">
                                                                     @if ($errors->has('name'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('name') }}</strong>
                                                                        </span>
                                                                    @endif
                                                            </div>
                                                            <div class="form-group">
                                                               <label class="control-label" for="password">Email :</label>
                                                                    <input type="email" title="Please enter your Email Id" placeholder="Enter Your Email Id " value="{{$user->email}}" name="email" id="email" class="form-control">
                                                                    @if ($errors->has('email'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('email') }}</strong>
                                                                        </span>
                                                                    @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label" for="Role"> Role :</label>
                                
                             
                                   
                                                                <select name="role"  id="role" class="form-control">
                                                                    <option value=""> Please Select Role</option>
                                                                    @foreach($role as $Role)
                                                                        <option value="{{$Role->id}}">{{$Role->name}}</option>
                                                                    @endforeach
                                                               
                                                                </select>
                                                            </div>
                                                            
                                                            <input type="Submit" class="btn btn-primary waves-effect waves-light" value="Update"></button>
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

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="{{asset('/validation/jquery.validate.min.js')}}"></script>
 
    <script src="{{asset('adminassets/js/Uservalidation.js')}}"></script>



</script>
@include('Admin.include.footer')