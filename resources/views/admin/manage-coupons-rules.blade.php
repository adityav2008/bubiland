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
                     <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Manage Coupons rule </a>
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
                                   
                                    <tr>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td><button onClick="location.href = '{{Request::root()}}/admindashboard/add-coupons?id=';" type="button" class="btn btn-danger">Update</button></td>
                                       <td><button onClick="location.href = '{{Request::root()}}/admindashboard/manage-rules/';" type="button" class="btn btn-danger">Rules</button></td>
                                       <td><button onClick="location.href = '{{Request::root()}}/admindashboard/delete-coupon?id=';" type="button" class="btn btn-danger">Delete</button></td>
                                    </tr>
                              
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