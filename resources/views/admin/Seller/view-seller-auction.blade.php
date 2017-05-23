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
                  <!-- <li><button type="button" class="btn btn-primary btn-sm" onClick = "location.href='{{Request::root()}}/admindashboard/Seller/manage-seller?id={{$products->user_id}}';" type="button" >Edit</button></li>
                  <li><button type="button" onClick = "location.href='{{Request::root()}}/admindashboard/Seller/manage-seller/delete?id={{$products->user_id}}';" type="button" class="btn btn-warning btn-sm">Delete</button></li> -->
               </ul>
               <h2>Seller Auction Product</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                  @if(isset($products))
                     <tr>
                        <th>Product ID</th>
                        <td>{{$products->product_id}}</td>
                     </tr>
                     <tr>
                        <th>Name</th>
                        <td>{{$products->product_name}}</td>
                     </tr>
                     <tr>
                        <th>Brand name</th>
                        <td>{{$products->product_brand}}</td>
                     </tr>
                     <tr>
                        <th>Price</th>
                        <td>{{$products->product_price}}</td>
                     </tr>
                     <tr>
                        <th>Display Price</th>
                        <td>{{$products->display_price}}</td>
                     </tr>
                     <tr>
                        <th>Start Date</th>
                        <td>{{$products->start_date}}</td>
                     </tr>
                     <tr>
                        <th>End Date</th>
                        <td>{{$products->end_date}}</td>
                     </tr>
                     <tr>
                        <th>Image</th>
                        <td><img src="{{Request::root()}}/images/product_master/{{$products->product_images}}" height="80px" width="100px"></td>
                     </tr>
                     <tr>
                        <th>Description</th>
                        <td>{{wordwrap(strip_tags($products->product_description))}}</td>
                     </tr>
                     
                     <tr>
                        <th>Features</th>
                        <td>{{$products->product_features}}</td>
                     </tr>

                     <tr>
                        <th>Condition</th>
                        <td>{{$products->product_condition}}</td>
                     </tr>
                     <tr>
                        <th>Category</th>
                        <td>{{$products->product_category}}</td>
                     </tr>
                     <tr>
                        <th>Sub-category</th>
                        <td>{{$products->product_subcategory}}</td>
                     </tr>
                     <tr>
                        <th>Attributes</th>
                        <td>{{$products->attributes}}</td>
                     </tr>
                     <tr>
                        <th>Sub-category</th>
                        <td>{{$products->keywords}}</td>
                     </tr>
                     <tr>
                        <th>Seller Discount</th>
                        <td>{{$products->seller_discount}}</td>
                     </tr>
                      <tr>
                        <th>Price After Discount</th>
                        <td>{{$products->price_after_discount}}</td>
                     </tr>
                      <tr>
                        <th>Weight</th>
                        <td>{{$products->weight}}</td>
                     </tr>
                      <tr>
                        <th>Location</th>
                        <td>{{$products->location}}</td>
                     </tr>
                     <tr>
                        <th>Stock</th>
                        <td>{{$products->stock}}</td>
                     </tr>
                      <tr>
                        <th>Sold Units</th>
                        <td>{{$products->sold_units}}</td>
                     </tr>
                      <tr>
                        <th>Location</th>
                        <td>{{$products->location}}</td>
                     </tr>
                     
                     <tr>
                        <th>Status</th>
                        <td>   
                              @if(1 == $products->product_status)
                               <span class="label label-warning">Blocked</span>
                              @else
                               <span class="label label-success">Actvie</span>
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