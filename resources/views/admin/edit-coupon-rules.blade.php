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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Rule ID
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('rule_id')) error @endif">
                     @if(isset($couponRule))
                    
                     <input type="text" class="form-control m-bot15" id="name"  name="rule_id" value ="@if($errors->has('rule_id')){{old('rule_id')}}@else{{$couponRule->rule_id}}@endif "  required />
	                     @if($errors->has('rule_id'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('rule_id')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" class="form-control m-bot15" name="rule_id" id="name" value="{{old('rule_id')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('title')) error @endif">
                     @if(isset($couponRule))
                     <input type="text" class="form-control m-bot15" id="name" class="form-control col-md-7 col-xs-12" name="title" value ="@if($errors->has('title')){{old('title')}}@else{{$couponRule->title}}@endif "  required />
	                     @if($errors->has('title'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('title')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" class="form-control m-bot15" name="title" id="name" value="{{old('title')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Coupon Code</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('coupon_code')) error @endif">
                     @if(isset($couponRule))
                     <input type="text" class="form-control m-bot15" id="name" class="form-control col-md-7 col-xs-12" name="coupon_code" value ="@if($errors->has('coupon_code')){{old('coupon_code')}}@else{{$couponRule->coupon_code}}@endif "  required />
	                     @if($errors->has('coupon_code'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('coupon_code')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" class="form-control m-bot15" name="coupon_code" id="name" value="{{old('coupon_code')}}">
                    @endif
                  </div>
                  
               </div>
               <div class="form-group">
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Valid Country</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('valid_country')) error @endif">
                      @if(isset($couponRule))
                     <select class="form-control m-bot15" name="valid_country">
                       @foreach($country as $key => $role)
                         <option value="@if($errors->has('valid_country')){{old('valid_country')}}@else{{$key}}@endif" @if($key == $couponRule->valid_country){{'selected'}}@endif> @if($errors->has('valid_country')){{old('valid_country')}}@else{{$key}}@endif</option>
                       @endForeach   
                      </select>
                      @else
                      <select class="form-control m-bot15" name="valid_country">
                       @foreach($country as $key => $role)
                         <option value="@if($errors->has('valid_country')){{old('valid_country')}}@else{{$key}}@endif">@if($errors->has('valid_country')){{old('valid_country')}}@else{{$key}}@endif</option>
                       @endForeach   
                      </select>
                    @endif
                  </div>
                  
               </div>
               <div class="form-group">
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Valid Currency</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('valid_currency')) error @endif">
                    @if(isset($couponRule))

                      <select class="form-control m-bot15" name="valid_currency">
      			           @foreach($currency as $key => $role)
      			             <option value="@if($errors->has('valid_currency')){{old('valid_currency')}}@else{{$key}}@endif" @if($key == $couponRule->valid_currency){{'selected'}}@endif>@if($errors->has('valid_currency')){{old('valid_currency')}}@else{{$key}}@endif</option>
      			           @endForeach   
      			        </select>

      			        @else

      			          <select class="form-control m-bot15" name="valid_currency">
      			           @foreach($currency as $key => $role)
      			             <option value="@if($errors->has('valid_currency')){{old('valid_currency')}}@else{{$key}}@endif">@if($errors->has('valid_currency')){{old('valid_currency')}}@else{{$key}}@endif</option>
      			          @endForeach   
      			          </select>

                    @endif
			     
                  </div>
               </div>
               <div class="form-group">
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Valid Upto Transactions</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('valid_upto_transactions')) error @endif">
                     @if(isset($couponRule))
                     <input type="text" class="form-control m-bot15"  class="form-control col-md-7 col-xs-12" name="valid_upto_transactions" value ="@if($errors->has('valid_upto_transactions')){{old('valid_upto_transactions')}}@else{{$couponRule->valid_upto_transactions}}@endif "  required />
	                     @if($errors->has('valid_upto_transactions'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('valid_upto_transactions')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" class="form-control m-bot15" name="valid_upto_transactions"  value="{{old('valid_upto_transactions')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Valid Upto Quantity</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('valid_upto_quantity')) error @endif">
                     @if(isset($couponRule))
                     <input type="text" class="form-control m-bot15"  class="form-control col-md-7 col-xs-12" name="valid_upto_quantity" value ="@if($errors->has('valid_upto_quantity')){{old('valid_upto_quantity')}}@else{{$couponRule->valid_upto_quantity}}@endif "  required />
	                     @if($errors->has('valid_upto_quantity'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('valid_upto_quantity')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" class="form-control m-bot15" name="valid_upto_quantity"  value="{{old('valid_upto_quantity')}}">
                    @endif
                  </div>
               </div>

               <div class="form-group">
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Valid Value</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('valid_value')) error @endif">
                     @if(isset($couponRule))
                     <input type="text" class="form-control m-bot15"  class="form-control col-md-7 col-xs-12" name="valid_value" value ="@if($errors->has('valid_value')){{old('valid_value')}}@else{{$couponRule->valid_value}}@endif "  required />
	                     @if($errors->has('valid_value'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('valid_value')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" class="form-control m-bot15" name="valid_value"  value="{{old('valid_value')}}">
                    @endif
                  </div>
               </div>
               
               <div class="form-group">
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Start Date</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('start_date')) error @endif">
                     @if(isset($couponRule))
                     <input type="date" class="form-control m-bot15" id="datepicker1" class="form-control col-md-7 col-xs-12" name="start_date" value ="@if($errors->has('start_date')){{old('start_date')}}@else{{$couponRule->start_date}}@endif "  required />
	                     @if($errors->has('start_date'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('start_date')}}
	                     </div>
	                     @endif
                     @else
                    <input type="date" class="form-control m-bot15" name="start_date" id="datepicker1" value="{{old('start_date')}}">
                    @endif
                  </div>
               </div>

               <div class="form-group">
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">End Date</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('end_date')) error @endif">
                     @if(isset($couponRule))
                     <input type="date" class="form-control m-bot15" id="datepicker2" class="form-control col-md-7 col-xs-12" name="end_date" value ="@if($errors->has('end_date')){{old('end_date')}}@else{{$couponRule->end_date}}@endif "  required />
	                     @if($errors->has('end_date'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('end_date')}}
	                     </div>
	                     @endif
                     @else
                    <input type="date" class="form-control m-bot15" name="end_date" id="datepicker2" value="{{old('end_date')}}">
                    @endif
                  </div>
               </div>

               <div class="form-group">
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Visible to seller </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('is_visible_to_seller')) error @endif">
                    @if(isset($couponRule))
                      <select class="form-control m-bot15" name="is_visible_to_seller">
                         <option value="0" @if(0 == $couponRule->is_visible_to_seller){{'selected'}}@endif>No</option>
                         <option value="1" @if(1 == $couponRule->is_visible_to_seller){{'selected'}}@endif>Yes</option> 
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
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Visible to buyer </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('is_visible_to_buyer')) error @endif">
                     @if(isset($couponRule))
                      <select class="form-control m-bot15" name="is_visible_to_buyer">
                         <option value="0" @if(0 == $couponRule->is_visible_to_buyer){{'selected'}}@endif>No</option>
                         <option value="1" @if(1 == $couponRule->is_visible_to_buyer){{'selected'}}@endif>Yes</option> 
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
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Visible to Public </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('is_visible_to_public')) error @endif">
                     @if(isset($couponRule))
                      <select class="form-control m-bot15" name="is_visible_to_public">
                         <option value="0" @if(0 == $couponRule->is_visible_to_public){{'selected'}}@endif>No</option>
                         <option value="1" @if(1 == $couponRule->is_visible_to_public){{'selected'}}@endif>Yes</option> 
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
               </div>
                <div class="form-group">
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Discount </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('discount')) error @endif">
                     @if(isset($couponRule))
                     <input type="text" class="form-control m-bot15" id="name" class="form-control col-md-7 col-xs-12" name="discount" value ="@if($errors->has('discount')){{old('discount')}}@else{{$couponRule->discount}}@endif"  required />
	                     @if($errors->has('discount'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('discount')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" class="form-control m-bot15"  min="0" max="1" name="discount" id="name" value="{{old('discount')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Is Fixed </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('is_fixed')) error @endif">
                      @if(isset($couponRule))
                      <select class="form-control m-bot15" name="is_fixed">
                         <option value="0" @if(0 == $couponRule->is_fixed){{'selected'}}@endif>No</option>
                         <option value="1" @if(1 == $couponRule->is_fixed){{'selected'}}@endif>Yes</option> 
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
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Is Percentage </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('is_percentage')) error @endif">
                     @if(isset($couponRule))
                      <select class="form-control m-bot15" name="is_percentage">
                         <option value="0" @if(0 == $couponRule->is_percentage){{'selected'}}@endif>No</option>
                         <option value="1" @if(1 == $couponRule->is_percentage){{'selected'}}@endif>Yes</option> 
                    </select>
                    @else
                      <select class="form-control m-bot15" name="is_percentage">
                         <option value="0">No</option>
                         <option value="1">Yes</option> 
                    </select>
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Role ID</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('role_id')) error @endif">
                     @if(isset($couponRule))
                     <input type="text" class="form-control m-bot15" id="name" class="form-control col-md-7 col-xs-12" name="role_id" value ="@if($errors->has('role_id')){{old('role_id')}}@else{{$couponRule->role_id}}@endif "  required />
	                     @if($errors->has('role_id'))
	                     <div class="alert alert-danger">
	                        {{$errors->first('role_id')}}
	                     </div>
	                     @endif
                     @else
                    <input type="text" class="form-control m-bot15"  min="0" max="1" name="role_id" id="name" value="{{old('role_id')}}">
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

