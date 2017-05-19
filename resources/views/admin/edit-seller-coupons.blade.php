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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Coupon ID
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('coupon_id')) error @endif">
                     @if(isset($scoupons))
                    
                     <input type="text" id="name" class="form-control m-bot15"  name="coupon_id" value ="@if($errors->has('coupon_id')){{old('coupon_id')}}@else{{$scoupons->coupon_id}}@endif "  required />
	                     @if($errors->has('coupon_id'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('coupon_id')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" name="coupon_id" class="form-control m-bot15" id="name" value="{{old('coupon_id')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('title')) error @endif">
                     @if(isset($scoupons))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="title" value ="@if($errors->has('title')){{old('title')}}@else{{$scoupons->title}}@endif "  required />
	                     @if($errors->has('title'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('title')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" name="title" class="form-control m-bot15" id="name" value="{{old('title')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Coupon Code</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('coupon_code')) error @endif">
                     @if(isset($scoupons))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="coupon_code" value ="@if($errors->has('coupon_code')){{old('coupon_code')}}@else{{$scoupons->coupon_code}}@endif "  required />
	                     @if($errors->has('coupon_code'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('coupon_code')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" name="coupon_code" class="form-control m-bot15" id="name" value="{{old('coupon_code')}}">
                    @endif
                  </div>
                  
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Start Date</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('start_date')) error @endif">
                     @if(isset($scoupons))
                     <input type="date" id="datepicker1" class="form-control col-md-7 col-xs-12" name="start_date" value ="@if($errors->has('start_date')){{old('start_date')}}@else{{$scoupons->start_date}}@endif "  required />
	                     @if($errors->has('start_date'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('start_date')}}
	                     </div>
	                     @endif
                     @else
                    <input type="date" name="start_date" class="form-control m-bot15" id="datepicker1" value="{{old('start_date')}}">
                    @endif
                  </div>
               </div>

               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">End Date</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('end_date')) error @endif">
                     @if(isset($scoupons))
                     <input type="date" id="datepicker2" class="form-control col-md-7 col-xs-12" name="end_date" value ="@if($errors->has('end_date')){{old('end_date')}}@else{{$scoupons->end_date}}@endif "  required />
	                     @if($errors->has('end_date'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('end_date')}}
	                     </div>
	                     @endif
                     @else
                    <input type="date" name="end_date" class="form-control m-bot15" id="datepicker2" value="{{old('end_date')}}">
                    @endif
                  </div>
               </div>

               <!-- <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Visible to seller </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('is_visible_to_seller')) error @endif">
                    @if(isset($scoupons))
                      <select class="form-control m-bot15" name="is_visible_to_seller">
                         <option value="0" @if(0 == $scoupons->is_visible_to_seller){{'selected'}}@endif>No</option>
                         <option value="1" @if(1 == $scoupons->is_visible_to_seller){{'selected'}}@endif>Yes</option> 
                    </select>
                    @else
                      <select class="form-control m-bot15" name="is_visible_to_seller">
                         <option value="0">No</option>
                         <option value="1">Yes</option> 
                    </select>
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Visible to buyer </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('is_visible_to_buyer')) error @endif">
                     @if(isset($scoupons))
                      <select class="form-control m-bot15" name="is_visible_to_buyer">
                         <option value="0" @if(0 == $scoupons->is_visible_to_buyer){{'selected'}}@endif>No</option>
                         <option value="1" @if(1 == $scoupons->is_visible_to_buyer){{'selected'}}@endif>Yes</option> 
                    </select>
                    @else
                      <select class="form-control m-bot15" name="is_visible_to_buyer">
                         <option value="0">No</option>
                         <option value="1">Yes</option> 
                    </select>
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Visible to Public </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('is_visible_to_public')) error @endif">
                     @if(isset($scoupons))
                      <select class="form-control m-bot15" name="is_visible_to_public">
                         <option value="0" @if(0 == $scoupons->is_visible_to_public){{'selected'}}@endif>No</option>
                         <option value="1" @if(1 == $scoupons->is_visible_to_public){{'selected'}}@endif>Yes</option> 
                    </select>
                       @if($errors->has('is_visible_to_public'))
                       <div class="alert alert-danger">
                          {{$errors->first('is_visible_to_public')}}
                       </div>
                       @endif
                    @else
                      <select class="form-control m-bot15" name="is_visible_to_public">
                         <option value="0">No</option>
                         <option value="1">Yes</option> 
                    </select>
                    @endif
                  </div>
               </div> -->
               
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">No of Use </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('no_of_transaction')) error @endif">
                      @if(isset($scoupons))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="no_of_transaction" value ="@if($errors->has('no_of_transaction')){{old('no_of_transaction')}}@else{{$scoupons->no_of_transaction}}@endif "  required />
                       @if($errors->has('no_of_transaction'))
                       <div class="alert alert-danger">
                          {{$errors->first('no_of_transaction')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="no_of_transaction" class="form-control m-bot15" id="name" value="{{old('no_of_transaction')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Discount Type </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('discount_type')) error @endif">
                    @if(isset($scoupons))
                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Is Percentage <input type="radio" name="discount_type" value="percentage" @if('percentage' == $scoupons->discount_type){{'checked'}}@endif></label>
                    
                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Is Fixed <input type="radio" name="discount_type" value="fixed" @if('fixed' == $scoupons->discount_type){{'checked'}}@endif></label>
                    
                    @else
                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Is Percentage <input type="radio" name="discount_type" value="percentage"> </label>
                    
                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Is Fixed <input type="radio" name="discount_type" value="fixed"></label>
                    
                    @endif
                    </div>
               </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Discount @if('percentage' == $scoupons->discount_type){{'(%)'}}@elseif('fixed' == $scoupons->discount_type){{'($)'}}@endif</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('discount')) error @endif">
                     @if(isset($scoupons))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="discount" value ="@if($errors->has('discount')){{old('discount')}}@else{{$scoupons->discount}}@endif "  required />
	                     @if($errors->has('discount'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('discount')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text"  min="0" max="1" class="form-control m-bot15" name="discount" id="name" value="{{old('discount')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('status')) error @endif">
                    @if(isset($scoupons))
                      <select class="form-control m-bot15" name="status">
                         <option value="0" @if(0 == $scoupons->status){{'selected'}}@endif>Inactive</option>
                         <option value="1" @if(1 == $scoupons->status){{'selected'}}@endif>Active</option> 
                    </select>
                    @else
                      <select class="form-control m-bot15" name="status">
                         <option value="0">Inactive</option>
                         <option value="1">Active</option> 
                    </select>
                    @endif
                  </div>
               </div>
               <!-- <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Is Fixed </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('is_fixed')) error @endif">
                    @if(isset($scoupons))
                      <select class="form-control m-bot15" name="is_fixed">
                         <option value="0" @if(0 == $scoupons->is_fixed){{'selected'}}@endif>No</option>
                         <option value="1" @if(1 == $scoupons->is_fixed){{'selected'}}@endif>Yes</option> 
                    </select>
                    @else
                      <select class="form-control m-bot15" name="is_fixed">
                         <option value="0">No</option>
                         <option value="1">Yes</option> 
                    </select>
                    @endif
                    

                  </div>
               </div>

               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Is Percentage </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('is_percentage')) error @endif">
                     @if(isset($scoupons))
                      <select class="form-control m-bot15" name="is_percentage">
                         <option value="0" @if(0 == $scoupons->is_percentage){{'selected'}}@endif>No</option>
                         <option value="1" @if(1 == $scoupons->is_percentage){{'selected'}}@endif>Yes</option> 
                    </select>
                    @else
                      <select class="form-control m-bot15" name="is_percentage">
                         <option value="0">No</option>
                         <option value="1">Yes</option> 
                    </select>
                    @endif
                  </div>
               </div> -->
               
               <!-- <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Role ID</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('role')) error @endif">
                     @if(isset($scoupons))
                     <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="role" value ="@if($errors->has('role')){{old('role_id')}}@else{{$scoupons->role}}@endif "  required />
	                     @if($errors->has('role'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('role')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" class="form-control m-bot15"  min="0" max="1" name="role" id="name" value="{{old('role')}}">
                    @endif
                  </div>
               </div> -->
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

