@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <ul class="nav navbar-right panel_toolbox">
                  <li><button type="button" class="btn btn-primary btn-sm" onClick = "location.href='{{Request::root()}}/admindashboard/Buyer/manage-buyer?id={{$buyers->user_id}}';" type="button" >Edit</button></li>
                  <li><button type="button" onClick = "location.href='{{Request::root()}}/admindashboard/Buyer/manage-buyer/delete?id={{$buyers->user_id}}';" type="button" class="btn btn-warning btn-sm">Delete</button></li>
               </ul>
               <h2>View Buyer </h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                  @if(isset($buyers))
                     <tr>
                        <th>Buyer ID</th>
                        <td>{{$buyers->user_id}}</td>
                     </tr>
                     <tr>
                        <th>First name</th>
                        <td>{{$buyers->first_name}}</td>
                     </tr>
                     <tr>
                        <th>Last name</th>
                        <td>{{$buyers->last_name}}</td>
                     </tr>
                     <tr>
                        <th>Company</th>
                        <td>{{$buyers->company}}</td>
                     </tr>
                     <tr>
                        <th>Email</th>
                        <td><a href="mailto:{{$buyers->email}}?Subject=Hello" style="color: blue;" target="_top">{{$buyers->email}}</a></td>
                     </tr>
                     <tr>
                        <th>Mobile No.</th>
                        <td>{{$buyers->mobile_number}}</td>
                     </tr>
                     <tr>
                        <th>Addres1</th>
                        <td>{{$buyers->address1}}</td>
                     </tr>
                     <tr>
                        <th>Addres2</th>
                        <td>{{$buyers->address2}}</td>
                     </tr>
                     <tr>
                        <th>Country</th>
                        <td>{{$buyers->country}}</td>
                     </tr>
                     <tr>
                        <th>Region</th>
                        <td>{{$buyers->region}}</td>
                     </tr>

                     <tr>
                        <th>Postal Code</th>
                        <td>{{$buyers->postal_code}}</td>
                     </tr>
                     <tr>
                        <th>Paypal Email</th>
                        <td>{{$buyers->paypal_email}}</td>
                     </tr>
                     <tr>
                        <th>Status</th>
                        <td>   
                              @if(1 == $buyers->status)
                               <span class="label label-warning">Blocked</span>
                              @else
                               <span class="label label-success">Actvie</span>
                              @endif
                        </td>
                     </tr>
                     <tr>
                        <th>Newsletter</th>
                        <td>
                           @if(1 == $buyers->newsletter)
                              <span class="label label-info">Subscribed</span>
                           @else
                           <span class="label label-primary">Not Subscribe</span>
                           @endif
                        </td>
                     </tr>
                     @endif
                  </table>
               </div>
            </div>
            </div>
         </div>
      </div>
   </div>
</div>


@stop