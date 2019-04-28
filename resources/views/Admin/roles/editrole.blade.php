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
                                <li class="active"><a href="#description">Edit Role</a></li>
                               
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                
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
                                                            <div class="errorTxt"></div>
                                                            <form method="POST" id="newrole" name="newrole"  action="{{ route('edit_role_request') }}">
                                                                @csrf
                                                                    <div class="form-group">
                                                                        <input type="text" name="role_Id" hidden="true" value="{{$role->id}}" readonly="true">
                                                                      <label class="control-label" for="username">Name :</label>
                                                                        <input type="text" placeholder="Please Enter Permission Name" title="Please Enter Permission Name" value="{{$role->name}}"  name="name" id="name" class="form-control">
                                
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="password">Display Name :</label>
                                                                        <input type="text" title="Please enter your Email Id" placeholder="Please Enter Display Name  " value="{{$role->display_name}}" name="Display_Name" id="Display_Name" class="form-control">
                               
                                                                    </div>
                                                                     <div class="form-group">
                                                                     
                                                                            
                                                                    @foreach($permission_list  as $key => $per)
                                                                            <input type="checkbox" name="permission[]" {{in_array($key,$role_permissions) ? 'checked' : 'unchecked'}}  class="i-checks" value="{{$key}}">{{$per}}<br/>
                                                                     
                                                                    @endforeach
                                                                    </div>
                                                                    <div class="form-group">
                                                                       <label class="control-label" for="password">Details :</label>
                                                                        <div class="form-group">
                                                                        <textarea rows="5" cols="10" class="" id="Details" name="Details">{{$role->description}}
                                                                             </textarea>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <input type="Submit" name="" value="Update" class="btn btn-primary waves-effect waves-light"></button>
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
        </div>    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="{{asset('/validation/jquery.validate.min.js')}}"></script>
 
    <script src="{{asset('adminassets/js/role.js')}}"></script>



</script>
@include('Admin.include.footer')