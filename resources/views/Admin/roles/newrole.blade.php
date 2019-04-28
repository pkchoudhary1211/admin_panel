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
                                <li class="active"><a href="#description">New Role</a></li>
                               
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
                                                            <form method="POST" id="newrole" name="newrole"  action="{{ route('new_role') }}">
                                                                @csrf
                                                                    <div class="form-group">
                                                                      <label class="control-label" for="username">Name :</label>
                                                                        <input type="text" placeholder="Please Enter Role Name" title="Please Enter Permission Name"  name="name" id="name" class="form-control">
                                
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="password">Display Name :</label>
                                                                        <input type="text" title="Display Name" placeholder="Please Enter Display Name  " value="" name="Display_Name" id="Display_Name" class="form-control">
                               
                                                                    </div>
                                                                     <div class="form-group">
                                                                     
                                                                      
                                                                            <a href="{{route('permission')}}" class="btn btn-primary waves-effect waves-light">Add Permission</a><br/>
                                                                     
                                                                     Give Permission :<br/>
                                                                         @foreach($permission as $per)
                                                                            <input type="checkbox"  class="i-checks" name="permission[]" value="{{$per->id}}" name="">{{$per->name}}<br/>
                                                                        @endforeach
                                                                    </div>
                                                                   
                                                                    <div class="form-group">
                                                                       <label class="control-label" for="password">Details :</label>
                               
                                                                        
                                                                     </div>
                                                                     <div class="form-group">
                                                                        <textarea   id="Details" name="Details" id="Details" placeholder="Description"></textarea>
                                                                    </div>
                                                                
                                                                    
                                                                    <input type="Submit" value="Save" name="" class="btn btn-primary waves-effect waves-light"></button>
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
        </div>   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="{{asset('/validation/jquery.validate.min.js')}}"></script>
 
    <script src="{{asset('adminassets/js/role.js')}}"></script>



</script>
@include('Admin.include.footer')