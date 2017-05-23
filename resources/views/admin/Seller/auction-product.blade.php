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
               <!-- <ul class="nav navbar-right panel_toolbox">
                  <li><button type="button" class="btn btn-primary btn-sm" onClick = "location.href='{{Request::root()}}/admindashboard/Seller/manage-seller/auction?id={{$sellers->user_id}}';" type="button" >Edit</button></li>
                  <li><button type="button" onClick = "location.href='{{Request::root()}}/admindashboard/Seller/manage-seller/delete?id={{$sellers->user_id}}';" type="button" class="btn btn-warning btn-sm">Delete</button></li>
               </ul> -->
               <h2>View Seller Auction Product </h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                     <thead>
                        <tr class="headings">
                           <th class="column-title">Product Id </th>
                           <th class="column-title">Brand </th>
                           <th class="column-title">Name </th>
                           <th class="column-title">Price </th>
                           <th class="column-title">Display Price</th>
                           <th class="column-title">Start Date</th>
                           <th class="column-title">End Date</th>
                           <th class="column-title">Image</th>
                           <th class="column-title">Status </th>
                           <th class="column-title">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                      <?php $sno = 0; ?>

                      @foreach($products as $product)
                      <?php $sno++; ?>
                        <tr>
                           <td>{{$sno}}</td>
                           <td>{{$product->product_brand}}</td>
                           <td width="100px">{{$product->product_name}}</td>
                           <td>{{$product->product_price}}</td>
                           <td>{{$product->display_price}}</td>
                           <td>{{$product->start_date}}</td>
                           <td>{{$product->end_date}}</td>
                           <td><img src="{{Request::root()}}/images/product_master/{{$product->product_images}}" height="80px" width="100px"></td>
                           <td>@if(1 == $product->status_value)<span class="label label-success">Actvie</span>
                              @else<span class="label label-warning">Blocked</span>@endif
                           </td>
                           <td>
                           <button type="button" onClick = "location.href='{{Request::root()}}/admindashboard/Seller/manage-seller/view-auction/auction?id={{$product->product_id}}';" type="button" class="btn btn-warning btn-sm">Detail-View</button>

                          </td>
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


@stop