@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div class="x_title">
            <h2>Add Coupon Rules</h2>
            <div class="clearfix"></div>
         </div>
         <div class="x_content">
            @if(isset($couponRule))
              <form action="{{Request::root()}}/admindashboard/add-coupons/manage" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="edit" />
            @else
              <form action="{{Request::root()}}/admindashboard/add-coupons/manage" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="add" />
            @endif
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Rule ID
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('coupon_id')) error @endif">
                     @if(isset($couponRule))
                    
                     <input type="text" id="name"  name="coupon_id" value ="@if($errors->has('coupon_id')){{old('coupon_id')}}@else{{$couponRule->coupon_id}}@endif "  required />
	                     @if($errors->has('coupon_id'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('coupon_id')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" name="coupon_id" id="name" value="{{old('coupon_id')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('title')) error @endif">
                     @if(isset($couponRule))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="title" value ="@if($errors->has('title')){{old('title')}}@else{{$couponRule->title}}@endif "  required />
	                     @if($errors->has('title'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('title')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" name="title" id="name" value="{{old('title')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Coupon Code</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('coupon_code')) error @endif">
                     @if(isset($couponRule))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="coupon_code" value ="@if($errors->has('coupon_code')){{old('coupon_code')}}@else{{$couponRule->coupon_code}}@endif "  required />
	                     @if($errors->has('coupon_code'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('coupon_code')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" name="coupon_code" id="name" value="{{old('coupon_code')}}">
                    @endif
                  </div>
                  
               </div>
               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('valid_country')) error @endif">
                     @if(isset($couponRule))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="valid_country" value ="@if($errors->has('valid_country')){{old('valid_country')}}@else{{$couponRule->valid_country}}@endif "  required />
	                     @if($errors->has('valid_country'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('valid_country')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" name="valid_country" id="name" value="{{old('valid_country')}}">
                    @endif
                  </div>
                  
               </div>
               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Currency</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('valid_currency')) error @endif">
                    
                   
                     <select class="form-control m-bot15" name="valid_currency">
			         @foreach($currency as $key => $role)
			           <option value="{{$key}}">{{$key}}</option>
			         @endForeach   
			        </select>
			        



	                    
                  
                  </div>
               </div>
               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Valid Upto Transactions</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('valid_upto_transactions')) error @endif">
                     @if(isset($couponRule))
                     <input type="text"  class="form-control col-md-7 col-xs-12" name="valid_upto_transactions" value ="@if($errors->has('valid_upto_transactions')){{old('valid_upto_transactions')}}@else{{$couponRule->valid_upto_transactions}}@endif "  required />
	                     @if($errors->has('valid_upto_transactions'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('valid_upto_transactions')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" name="valid_upto_transactions"  value="{{old('valid_upto_transactions')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Valid Upto Quantity</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('valid_upto_quantity')) error @endif">
                     @if(isset($couponRule))
                     <input type="text"  class="form-control col-md-7 col-xs-12" name="valid_upto_quantity" value ="@if($errors->has('valid_upto_quantity')){{old('valid_upto_quantity')}}@else{{$couponRule->valid_upto_quantity}}@endif "  required />
	                     @if($errors->has('valid_upto_quantity'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('valid_upto_quantity')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" name="valid_upto_quantity"  value="{{old('valid_upto_quantity')}}">
                    @endif
                  </div>
               </div>

               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Valid Value</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('valid_value')) error @endif">
                     @if(isset($couponRule))
                     <input type="text"  class="form-control col-md-7 col-xs-12" name="valid_value" value ="@if($errors->has('valid_value')){{old('valid_value')}}@else{{$couponRule->valid_value}}@endif "  required />
	                     @if($errors->has('valid_value'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('valid_value')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" name="valid_value"  value="{{old('valid_value')}}">
                    @endif
                  </div>
               </div>
               
               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Start Date</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('start_date')) error @endif">
                     @if(isset($couponRule))
                     <input type="date" id="datepicker1" class="form-control col-md-7 col-xs-12" name="start_date" value ="@if($errors->has('start_date')){{old('start_date')}}@else{{$couponRule->start_date}}@endif "  required />
	                     @if($errors->has('start_date'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('start_date')}}
	                     </div>
	                     @endif
                     @else
                    <input type="date" name="start_date" id="datepicker1" value="{{old('start_date')}}">
                    @endif
                  </div>
               </div>

               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">End Date</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('end_date')) error @endif">
                     @if(isset($couponRule))
                     <input type="date" id="datepicker2" class="form-control col-md-7 col-xs-12" name="end_date" value ="@if($errors->has('end_date')){{old('end_date')}}@else{{$couponRule->end_date}}@endif "  required />
	                     @if($errors->has('end_date'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('end_date')}}
	                     </div>
	                     @endif
                     @else
                    <input type="date" name="end_date" id="datepicker2" value="{{old('end_date')}}">
                    @endif
                  </div>
               </div>

               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Visible to seller </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('is_visible_to_seller')) error @endif">
                     @if(isset($couponRule))
                     <input type="number" id="name" min="0" max="1" class="form-control col-md-7 col-xs-12" name="is_visible_to_seller" value ="@if($errors->has('is_visible_to_seller')){{old('is_visible_to_seller')}}@else{{$couponRule->is_visible_to_seller}}@endif "  required />
	                     @if($errors->has('is_visible_to_seller'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('is_visible_to_seller')}}
	                     </div>
	                     @endif
                     @else
                    <input type="number"  min="0" max="1" name="is_visible_to_seller" id="name" value="{{old('is_visible_to_seller')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Visible to buyer </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('is_visible_to_buyer')) error @endif">
                     @if(isset($couponRule))
                     <input type="number" id="name" min="0" max="1" class="form-control col-md-7 col-xs-12" name="is_visible_to_buyer" value ="@if($errors->has('is_visible_to_buyer')){{old('is_visible_to_buyer')}}@else{{$couponRule->is_visible_to_buyer}}@endif "  required />
	                     @if($errors->has('is_visible_to_buyer'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('is_visible_to_buyer')}}
	                     </div>
	                     @endif
                     @else
                    <input type="number"  min="0" max="1" name="is_visible_to_buyer" id="name" value="{{old('is_visible_to_buyer')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Visible to Public </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('is_visible_to_public')) error @endif">
                     @if(isset($couponRule))
                     <input type="number" id="name" min="0" max="1" class="form-control col-md-7 col-xs-12" name="is_visible_to_public" value ="@if($errors->has('is_visible_to_public')){{old('is_visible_to_public')}}@else{{$couponRule->is_visible_to_public}}@endif "  required />
	                     @if($errors->has('is_visible_to_public'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('is_visible_to_public')}}
	                     </div>
	                     @endif
                     @else
                    <input type="number"  min="0" max="1" name="is_visible_to_public" id="name" value="{{old('is_visible_to_public')}}">
                    @endif
                  </div>
               </div>
                <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Discount </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('discount')) error @endif">
                     @if(isset($couponRule))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="discount" value ="@if($errors->has('discount')){{old('discount')}}@else{{$couponRule->discount}}@endif "  required />
	                     @if($errors->has('discount'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('discount')}}
	                     </div>
	                     @endif
                     @else
                    <input type="number"  min="0" max="1" name="discount" id="name" value="{{old('discount')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Is Fixed </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('is_fixed')) error @endif">
                     @if(isset($couponRule))
                     <input type="number" id="name" min="0" max="1" class="form-control col-md-7 col-xs-12" name="is_fixed" value ="@if($errors->has('is_fixed')){{old('is_fixed')}}@else{{$couponRule->is_fixed}}@endif "  required />
	                     @if($errors->has('is_fixed'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('is_fixed')}}
	                     </div>
	                     @endif
                     @else
                    <input type="number"  min="0" max="1" name="is_fixed" id="name" value="{{old('is_fixed')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Is Percentage </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('is_percentage')) error @endif">
                     @if(isset($couponRule))
                     <input type="number" id="name" min="0" max="1" class="form-control col-md-7 col-xs-12" name="is_percentage" value ="@if($errors->has('is_percentage')){{old('is_percentage')}}@else{{$couponRule->is_percentage}}@endif "  required />
	                     @if($errors->has('is_percentage'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('is_percentage')}}
	                     </div>
	                     @endif
                     @else
                    <input type="number"  min="0" max="1" name="is_percentage" id="name" value="{{old('is_percentage')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Role ID</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('role_id')) error @endif">
                     @if(isset($couponRule))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="role_id" value ="@if($errors->has('role_id')){{old('role_id')}}@else{{$couponRule->role_id}}@endif "  required />
	                     @if($errors->has('role_id'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('role_id')}}
	                     </div>
	                     @endif
                     @else
                    <input type="number"  min="0" max="1" name="role_id" id="name" value="{{old('role_id')}}">
                    @endif
                  </div>
               </div>
               <div class="ln_solid"></div>
               <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                 	@if(isset($couponRule))
                 	<button type="submit" name = "submit" class="btn btn-success">Update</button>
					@else
					<button type="submit" name = "submit" class="btn btn-success">Add</button>
					@endif
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function(){
         // Find any date inputs and override their functionality
         $('input[type="date"]').datepicker({
                  dateFormat : 'yy-mm-dd'
                }
             );
         $( "#datepicker1" ).datepicker();
         $( "#datepicker" ).datepicker("show");
         $( "#datepicker2" ).datepicker();
         $( "#datepicker" ).datepicker("show");
    });
</script>
@stop

