@include('Admin.include.header')
@include('Admin.include.sidebar')
@include('Admin.include.topmainmenu')
    

            <!-- Mobile Menu end -->
           <br/>
           <br/>
           
        

<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
            @if(Session::has('message'))
                <div class="lobibox-notify lobibox-notify-success animated-fast fadeInDown" style="width: 400px;"><div class="lobibox-notify-icon-wrapper"><div class="lobibox-notify-icon"><div><div class="icon-el"><i class="glyphicon glyphicon-ok-sign"></i></div></div></div></div><div class="lobibox-notify-body"><div class="lobibox-notify-title">Success<div></div></div><div class="lobibox-notify-msg" style="max-height: 60px;">{{ Session::get('message') }}</div></div><span class="lobibox-close">×</span></div>
           
            @endif
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Role  Table</h1>
                                </div>
                                @if(Entrust::can('add-role'))
                                    <div class="add-product">
                                         <a href="{{route('role')}}">Add Role</a>
                                    </div>
                                @endif
                                <br/>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                       
                                    </div>
                                  
                                     <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                             
                                               <thead class="thead-dark">

                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Display Name</th>
                                                        <th>Details</th>
                                                        <th>Action</th>
                                                    </tr>
                                              </thead>
                                              
                                              <tbody>
                                                @foreach($role as $val)
                                            
                                                <tr>
                                                    <td>{{$val->name}}</td>
                                                    <td>{{$val->display_name}}</td>
                                                    <td>{{$val->description}}</td>
                                                    <td>@if(Entrust::can('edit-role'))
                                                         <a href="{{route('edit_role',$val->id)}}" data-toggle="tooltip" title="Edit" class="pd-setting-ed"><button data-toggle="tooltip" title="" class="pd-setting-ed" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                        @else No Permission
                                                        
                                                        @endif
                                                        <!--  <a href="" data-toggle="tooltip" title="Trash" class="pd-setting-ed"><button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
 -->                                                       <!--  <a href="{{url('edit_role/'.$val->id)}}" class="btn btn-warning"> Edit</a>  --></td>
                                                    
                                                </tr>
                                                @endforeach
                                             </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   <script src="{{asset('AdminAssets/js/Uservalidation.js')}}"></script>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    
    jQuery(document).ready(function() {
    jQuery('#table1').dataTable();
} );
</script>
@include('Admin.include.footer')