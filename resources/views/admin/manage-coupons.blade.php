@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                     <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Admin Coupons</a>
                     </li>
                     <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Seller Coupons</a>
                     </li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                     <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <ul class="nav navbar-right panel_toolbox">
                           <li><button onClick = "location.href='{{Request::root()}}/admindashboard/add-coupons'" type="button" class="btn btn-primary">Add</button>
                           </li>
                        </ul>
                        <h2>Manage Admin Coupons</h2>
                        <div class="x_content">
                           <div class="table-responsive">
                              <table class="table table-striped jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <th class="column-title">Coupon rule id</th>
                                       <th class="column-title">Coupon id</th>
                                       <th class="column-title">Minimum amount</th>
                                       <th class="column-title">Maximum amount</th>
                                       <th class="column-title">Created by</th>
                                       <th class="column-title">Updated by</th>
                                       <th class="column-title">Created at</th>
                                       <th class="column-title">Updated at</th>
                                       <th class="column-title">Update</th>
                                       <th class="column-title">Manage Rules</th>
                                       <th class="column-title">Delete</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($acoupons as $acoupon)
                                    <tr>
                                       <td>{{$acoupon->coupon_rule_id}}</td>
                                       <td>{{$acoupon->coupon_id}}</td>
                                       <td>{{$acoupon->minimum_amount}}</td>
                                       <td>{{$acoupon->maximum_amount}}</td>
                                       <td>{{$acoupon->created_by}}</td>
                                       <td>{{$acoupon->updated_by}}</td>
                                       <td>{{$acoupon->created_at}}</td>
                                       <td>{{$acoupon->updated_at}}</td>
                                       <td><button onClick="location.href = '{{Request::root()}}/admindashboard/add-coupons?id={{$acoupon->coupon_rule_id}}';" type="button" class="btn btn-danger">Update</button></td>
                                       <td><button onClick="location.href = '{{Request::root()}}/admindashboard/add-coupons/manage?id={{$acoupon->coupon_rule_id}}';" type="button" class="btn btn-danger">Rules</button></td>
                                       <td><button onClick="location.href = '{{Request::root()}}/admindashboard/add-coupons/delete?id={{$acoupon->coupon_rule_id}}';" type="button" class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <ul class="nav navbar-right panel_toolbox">
                           <li><button onClick = "location.href='{{Request::root()}}/admindashboard/seller-coupon'" type="button" class="btn btn-primary">Add</button>
                           </li>
                        </ul>
                        <h2>Manage Seller Coupons</h2>
                        <div class="x_content">
                           <div class="table-responsive">
                              <table class="table table-striped jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <th class="column-title">Coupon ID</th>
                                       <th class="column-title">Coupon Title</th>
                                       <th class="column-title">Coupon Code</th>
                                       <th class="column-title">Start Date</th>
                                       <th class="column-title">End Date</th>
                                       <th class="column-title">Discount</th>
                                       <th class="column-title">Update</th>
                                       <th class="column-title">Manage Rules</th>
                                       <th class="column-title">Delete</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($scoupons as $scoupon)
                                    <tr>
                                       <td>{{$scoupon->coupon_id}}</td>
                                       <td>{{$scoupon->title}}</td>
                                       <td>{{$scoupon->coupon_code}}</td>
                                       <td>{{$scoupon->start_date}}</td>
                                       <td>{{$scoupon->end_date}}</td>
                                       <td>{{$scoupon->discount}}</td>
                                       <td><button onClick="location.href = '{{Request::root()}}/admindashboard/seller-coupon?id={{$scoupon->coupon_id}}';" type="button" class="btn btn-success">Update</button></td>
                                       <td><button onClick="location.href = '{{Request::root()}}/buyerdashboard/manage-rules/{{$scoupon->coupon_id}}';" type="button" class="btn btn-success">Rules</button></td>
                                       <td><button onClick="location.href = '{{Request::root()}}/admindashboard/seller-coupon/delete?id={{$scoupon->coupon_id}}';" type="button" class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@stop