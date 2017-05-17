@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div class="x_title">
            <h2>Add Admin Coupons</h2>
            <div class="clearfix"></div>
         </div>
         <div class="x_content">
            

            @if(isset($coupons))
              <form action="{{Request::root()}}/admindashboard/add-coupons" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="edit" />
            @else
              <form action="{{Request::root()}}/admindashboard/add-coupons" method="post" class="form-horizontal" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="add" />
            @endif
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Coupon Rule ID
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('coupon_rule_id')) error @endif">
                     @if(isset($coupons))
                    
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="coupon_rule_id" value ="@if($errors->has('coupon_rule_id')){{old('coupon_rule_id')}}@else{{$coupons->coupon_rule_id}}@endif "  required />
	                     @if($errors->has('coupon_rule_id'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('coupon_rule_id')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" name="coupon_rule_id" id="name" value="{{old('coupon_rule_id')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Coupon ID</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('coupon_id')) error @endif">
                     @if(isset($coupons))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="coupon_id" value ="@if($errors->has('coupon_id')){{old('coupon_id')}}@else{{$coupons->coupon_id}}@endif "  required />
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
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Minimum Amount</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('minimum_amount')) error @endif">
                     @if(isset($coupons))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="minimum_amount" value ="@if($errors->has('minimum_amount')){{old('minimum_amount')}}@else{{$coupons->minimum_amount}}@endif "  required />
	                     @if($errors->has('minimum_amount'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('minimum_amount')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" name="minimum_amount" id="name" value="{{old('minimum_amount')}}">
                    @endif
                  </div>
                  
               </div>
               <div class="form-group">
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Minimum Amount</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('maximum_amount')) error @endif">
                     @if(isset($coupons))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="maximum_amount" value ="@if($errors->has('maximum_amount')){{old('maximum_amount')}}@else{{$coupons->maximum_amount}}@endif "  required />
	                     @if($errors->has('maximum_amount'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('maximum_amount')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" name="maximum_amount" id="name" value="{{old('maximum_amount')}}">
                    @endif
                  </div>
               </div>

               <div class="ln_solid"></div>
               <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                 	@if(isset($coupons))
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
@stop

