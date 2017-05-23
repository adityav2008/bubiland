@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <div class="col-md-12 col-sm-12 col-xs-12">
    @if (session('error'))
      <div class="alert alert-error">
        {{ session('error') }}
      </div>
    @endif
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    @if (session('warning'))
      <div class="alert alert-warning">
        {{ session('warning') }}
      </div>
    @endif
    @if (session('info'))
      <div class="alert alert-info">
        {{ session('info') }}
      </div>
    @endif
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <ul class="nav navbar-right panel_toolbox">
                  <li><button type="button" class="btn btn-primary btn-sm" onClick = "location.href='{{Request::root()}}/admindashboard/Seller/manage-seller?id={{$sellers->user_id}}';" type="button" >Edit</button></li>
                  <li><button type="button" onClick = "location.href='{{Request::root()}}/admindashboard/Seller/manage-seller/delete?id={{$sellers->user_id}}';" type="button" class="btn btn-warning btn-sm">Delete</button></li>
               </ul>
               <h2>View Seller </h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                  @if(isset($sellers))
                     <tr>
                        <th>Seller ID</th>
                        <td>{{$sellers->user_id}}</td>
                     </tr>
                     <tr>
                        <th>First name</th>
                        <td>{{$sellers->first_name}}</td>
                     </tr>
                     <tr>
                        <th>Last name</th>
                        <td>{{$sellers->last_name}}</td>
                     </tr>
                     <tr>
                        <th>Company</th>
                        <td>{{$sellers->company}}</td>
                     </tr>
                     <tr>
                        <th>Email</th>
                        <td><a href="mailto:{{$sellers->email}}?Subject=Hello" style="color: blue;" target="_top">{{$sellers->email}}</a></td>
                     </tr>
                     <tr>
                        <th>Mobile No.</th>
                        <td>{{$sellers->mobile_number}}</td>
                     </tr>
                     <tr>
                        <th>Addres1</th>
                        <td>{{$sellers->address1}}</td>
                     </tr>
                     <tr>
                        <th>Addres2</th>
                        <td>{{$sellers->address2}}</td>
                     </tr>
                     <tr>
                        <th>Country</th>
                        <td>{{$sellers->country}}</td>
                     </tr>
                     <tr>
                        <th>Region</th>
                        <td>{{$sellers->region}}</td>
                     </tr>

                     <tr>
                        <th>Postal Code</th>
                        <td>{{$sellers->postal_code}}</td>
                     </tr>
                     <tr>
                        <th>Paypal Email</th>
                        <td>{{$sellers->paypal_email}}</td>
                     </tr>
                     <tr>
                        <th>Status</th>
                        <td>   
                              @if(1 == $sellers->status)
                               <span class="label label-warning">Blocked</span>
                              @else
                               <span class="label label-success">Actvie</span>
                              @endif
                        </td>
                     </tr>
                     <tr>
                        <th>Newsletter</th>
                        <td>
                           @if(1 == $sellers->newsletter)
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