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
                     <li role="presentation" class=""><a href="#tab_content3" role="tab" id="rule-tab" data-toggle="tab" aria-expanded="false">Coupons Rules</a>
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
                                       <th class="column-title">Coupon ID</th>
                                       <th class="column-title">Coupon Title</th>
                                       <th class="column-title">Coupon Code</th>
                                       <th class="column-title">No. of uses </th>
                                       <th class="column-title">Start Date</th>
                                       <th class="column-title">End Date</th>
                                       <th class="column-title">Discount</th>
                                       <th class="column-title">Status</th>
                                       <th class="column-title">Update</th>
                                    <!--    <th class="column-title">Manage Rules</th> -->
                                       <th class="column-title">Delete</th>
                                    </tr>
                                 </thead>
                                 <tbody>


                                    @foreach($acoupons as $scoupon)
                                    <tr>
                                       <td>{{$scoupon->coupon_id}}</td>
                                       <td>{{$scoupon->title}}</td>
                                       <td>{{$scoupon->coupon_code}}</td>
                                       <td>{{$scoupon->no_of_transaction}}</td>
                                       <td>{{$scoupon->start_date}}</td>
                                       <td>{{$scoupon->end_date}}</td>
                                       <td>{{$scoupon->discount}} @if('percentage' == $scoupon->discount_type){{' %'}}@elseif('fixed' == $scoupon->discount_type){{' $'}}@endif</td></td>
                                       <td>@if('1' == $scoupon->status){{'Active'}}@elseif('0' == $scoupon->status){{'Inactive'}}@endif</td>

                                       <td><button onClick="location.href = '{{Request::root()}}/admindashboard/add-coupons?id={{$scoupon->coupon_id}}';" type="button" class="btn btn-success">Update</button></td>
                                       <!-- <td><button onClick="location.href = '{{Request::root()}}/buyerdashboard/manage-rules/{{$scoupon->coupon_id}}';" type="button" class="btn btn-success">Rules</button></td> -->
                                       <td><button onClick="location.href = '{{Request::root()}}/admindashboard/add-coupons/delete?id={{$scoupon->coupon_id}}';" type="button" class="btn btn-danger">Delete</button></td>
                                       
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
                                       <th class="column-title">No. of uses </th>
                                       <th class="column-title">Discount</th>
                                       <th class="column-title">Status</th>
                                       <th class="column-title">Update</th>
                                    <!--    <th class="column-title">Manage Rules</th> -->
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
                                       <td>{{$scoupon->no_of_transaction}}</td>
                                       <td>{{$scoupon->discount}} @if('percentage' == $scoupon->discount_type){{' %'}}@elseif('fixed' == $scoupon->discount_type){{' $'}}@endif</td>
                                       <td>@if('1' == $scoupon->status){{'Active'}}@elseif('0' == $scoupon->status){{'Inactive'}}@endif</td>
                                       <td><button onClick="location.href = '{{Request::root()}}/admindashboard/seller-coupon?id={{$scoupon->coupon_id}}';" type="button" class="btn btn-success">Update</button></td>
                                       <!-- <td><button onClick="location.href = '{{Request::root()}}/buyerdashboard/manage-rules/{{$scoupon->coupon_id}}';" type="button" class="btn btn-success">Rules</button></td> -->
                                       <td><button onClick="location.href = '{{Request::root()}}/admindashboard/seller-coupon/delete?id={{$scoupon->coupon_id}}';" type="button" class="btn btn-danger">Delete</button></td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="rule-tab">
                        <ul class="nav navbar-right panel_toolbox">
                           <li><button onClick = "location.href='{{Request::root()}}/admindashboard/add-coupons/manage'" type="button" class="btn btn-primary">Add</button>
                           </li>
                        </ul>
                        <h2>Manage Coupons Rules</h2>
                        <div class="x_content">
                           <div class="table-responsive">
                              <table class="table table-striped jambo_table bulk_action">
                                 <thead>
                                    <tr class="headings">
                                       <th class="column-title">Rule ID</th>
                                       <th class="column-title">Coupon Title</th>
                                       <th class="column-title">Coupon Code</th>
                                       <th class="column-title">Discount</th>
                                       <th class="column-title">In Currency</th>
                                       <th class="column-title">In Percentage</th>
                                       <th class="column-title">Vaild Upto Transactions</th>
                                       <th class="column-title">Start Date</th>
                                       <th class="column-title">End Date</th>
                                       <th class="column-title">Update</th>
                                       <th class="column-title">Delete</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($rules as $rule)
                                    <tr>
                                       <td>{{$rule->rule_id}}</td>
                                       <td>{{$rule->title}}</td>
                                       <td>{{$rule->coupon_code}}</td>
                                       <td>{{$rule->discount}}</td>
                                       <td>{{$rule->valid_currency}}</td>
                                       <td>@if($rule->is_percentage == 1){{"Yes"}}@else{{"No"}}@endif</td>
                                       <td>{{$rule->valid_upto_transactions}}</td>
                                       <td>{{$rule->start_date}}</td>
                                       <td>{{$rule->end_date}}</td>
                                       <td><button onClick="location.href = '{{Request::root()}}/admindashboard/add-coupons/manage?id={{$rule->rule_id}}';" type="button" class="btn btn-success">Update</button></td>
                                       <td><button onClick="location.href = '{{Request::root()}}/admindashboard/add-coupons/manage/delete?id={{$rule->rule_id}}';" type="button" class="btn btn-danger">Delete</button></td>
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