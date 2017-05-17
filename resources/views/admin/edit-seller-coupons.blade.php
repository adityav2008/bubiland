@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div class="x_title">
            <h2>Add Seller Coupons</h2>
            <div class="clearfix"></div>
         </div>
         <div class="x_content">
            

            @if(isset($scoupons))
              <form action="{{Request::root()}}/admindashboard/seller-coupons" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="edit" />
            @else
              <form action="{{Request::root()}}/admindashboard/seller-coupons" method="post" class="form-horizontal" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="add" />
            @endif
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Coupon ID
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('coupon_id')) error @endif">
                     @if(isset($scoupons))
                    
                     <input type="text" id="name"  name="coupon_id" value ="@if($errors->has('coupon_id')){{old('coupon_id')}}@else{{$scoupons->coupon_id}}@endif "  required />
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
                     @if(isset($scoupons))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="title" value ="@if($errors->has('title')){{old('title')}}@else{{$scoupons->title}}@endif "  required />
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
                     @if(isset($scoupons))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="coupon_code" value ="@if($errors->has('coupon_code')){{old('coupon_code')}}@else{{$scoupons->coupon_code}}@endif "  required />
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
                  <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Start Date</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('start_date')) error @endif">
                     @if(isset($scoupons))
                     <input type="date" id="datepicker1" class="form-control col-md-7 col-xs-12" name="start_date" value ="@if($errors->has('start_date')){{old('start_date')}}@else{{$scoupons->start_date}}@endif "  required />
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
                     @if(isset($scoupons))
                     <input type="date" id="datepicker2" class="form-control col-md-7 col-xs-12" name="end_date" value ="@if($errors->has('end_date')){{old('end_date')}}@else{{$scoupons->end_date}}@endif "  required />
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
                     @if(isset($scoupons))
                     <input type="number" id="name" min="0" max="1" class="form-control col-md-7 col-xs-12" name="is_visible_to_seller" value ="@if($errors->has('is_visible_to_seller')){{old('is_visible_to_seller')}}@else{{$scoupons->is_visible_to_seller}}@endif "  required />
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
                     @if(isset($scoupons))
                     <input type="number" id="name" min="0" max="1" class="form-control col-md-7 col-xs-12" name="is_visible_to_buyer" value ="@if($errors->has('is_visible_to_buyer')){{old('is_visible_to_buyer')}}@else{{$scoupons->is_visible_to_buyer}}@endif "  required />
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
                     @if(isset($scoupons))
                     <input type="number" id="name" min="0" max="1" class="form-control col-md-7 col-xs-12" name="is_visible_to_public" value ="@if($errors->has('is_visible_to_public')){{old('is_visible_to_public')}}@else{{$scoupons->is_visible_to_public}}@endif "  required />
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
                     @if(isset($scoupons))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="discount" value ="@if($errors->has('discount')){{old('discount')}}@else{{$scoupons->discount}}@endif "  required />
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
                     @if(isset($scoupons))
                     <input type="number" id="name" min="0" max="1" class="form-control col-md-7 col-xs-12" name="is_fixed" value ="@if($errors->has('is_fixed')){{old('is_fixed')}}@else{{$scoupons->is_fixed}}@endif "  required />
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
                     @if(isset($scoupons))
                     <input type="number" id="name" min="0" max="1" class="form-control col-md-7 col-xs-12" name="is_percentage" value ="@if($errors->has('is_percentage')){{old('is_percentage')}}@else{{$scoupons->is_percentage}}@endif "  required />
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
                     @if(isset($scoupons))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="role_id" value ="@if($errors->has('role_id')){{old('role_id')}}@else{{$scoupons->role_id}}@endif "  required />
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
                 	@if(isset($scoupons))
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

