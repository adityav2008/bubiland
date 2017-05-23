@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div class="x_title">
          @if(isset($buyers))
            <h2>Update Buyer</h2>
          @else
            <h2>Add Buyer</h2>
          @endif
            <div class="clearfix"></div>
         </div>
         <div class="x_content">
            @if(isset($buyers))
              <form action="{{Request::root()}}/admindashboard/Buyer/edit-buyer?id={{$buyers->user_id}}" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="edit" />
            @else
              <form action="{{Request::root()}}/admindashboard/Buyer/edit-buyer" method="post" class="form-horizontal" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="add" />
            @endif
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">First Name</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     @if(isset($buyers))
                     <input type="text" id="name" class="form-control m-bot15"  name="first_name" value ="@if($errors->has('first_name')){{old('first_name')}}@else{{$buyers->first_name}}@endif"  required />
                       @if($errors->has('first_name'))
                       <div class="alert alert-danger">
                          {{$errors->first('first_name')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="first_name" class="form-control m-bot15" id="name" value="{{old('first_name')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     @if(isset($buyers))
                     <input type="text" id="name" class="form-control m-bot15"  name="last_name" value ="@if($errors->has('last_name')){{old('last_name')}}@else{{$buyers->last_name}}@endif"  required />
                       @if($errors->has('last_name'))
                       <div class="alert alert-danger">
                          {{$errors->first('last_name')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="last_name" class="form-control m-bot15" id="name" value="{{old('last_name')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Company</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     @if(isset($buyers))
                     <input type="text" id="name" class="form-control m-bot15"  name="company" value ="@if($errors->has('company')){{old('company')}}@else{{$buyers->company}}@endif"  required />
                       @if($errors->has('company'))
                       <div class="alert alert-danger">
                          {{$errors->first('company')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="company" class="form-control m-bot15" id="name" value="{{old('company')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     @if(isset($buyers))
                     <input type="text" id="name" class="form-control m-bot15"  name="email" value ="@if($errors->has('email')){{old('email')}}@else{{$buyers->email}}@endif"  required />
                       @if($errors->has('email'))
                       <div class="alert alert-danger">
                          {{$errors->first('email')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="email" class="form-control m-bot15" id="name" value="{{old('email')}}">
                    @endif
                  </div>
               </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     @if(isset($buyers))
                     <input type="password" id="name" class="form-control m-bot15"  name="password" value ="@if($errors->has('password')){{old('password')}}@else{{$buyers->password}}@endif"  required />
                       @if($errors->has('password'))
                       <div class="alert alert-danger">
                          {{$errors->first('password')}}
                       </div>
                       @endif
                     @else
                    <input type="password" name="password" class="form-control m-bot15" id="name" value="{{old('password')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No.</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     @if(isset($buyers))
                     <input type="text" id="name" class="form-control m-bot15"  name="mobile_number" value ="@if($errors->has('mobile_number')){{old('mobile_number')}}@else{{$buyers->mobile_number}}@endif"  required />
                       @if($errors->has('mobile_number'))
                       <div class="alert alert-danger">
                          {{$errors->first('mobile_number')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="mobile_number" class="form-control m-bot15" id="name" value="{{old('mobile_number')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Address1</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     @if(isset($buyers))
                     <input type="text" id="name" class="form-control m-bot15"  name="address1" value ="@if($errors->has('address1')){{old('address1')}}@else{{$buyers->address1}}@endif"  required />
                       @if($errors->has('address1'))
                       <div class="alert alert-danger">
                          {{$errors->first('address1')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="address1" class="form-control m-bot15" id="name" value="{{old('address1')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Address2</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     @if(isset($buyers))
                     <input type="text" id="name" class="form-control m-bot15"  name="address2" value ="@if($errors->has('address2')){{old('address2')}}@else{{$buyers->address2}}@endif"  required />
                       @if($errors->has('address2'))
                       <div class="alert alert-danger">
                          {{$errors->first('address2')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="address2" class="form-control m-bot15" id="name" value="{{old('address2')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     @if(isset($buyers))
                     <select class="form-control m-bot15" name="country">
                       @foreach($country as $key => $role)
                         <option value="@if($errors->has('country')){{old('country')}}@else{{$key}}@endif" @if($key == $buyers->country){{'selected'}}@endif> 
                         @if($errors->has('country')){{old('country')}}@else{{$key}}@endif</option>
                       @endForeach   
                      </select>
                      @else
                      <select class="form-control m-bot15" name="country">
                       @foreach($country as $key => $role)
                         <option value="@if($errors->has('country')){{old('country')}}@else{{$key}}@endif">@if($errors->has('country')){{old('country')}}@else{{$key}}@endif</option>
                       @endForeach   
                      </select>
                     @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Region</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     @if(isset($buyers))
                     <input type="text" id="name" class="form-control m-bot15"  name="address1" value ="@if($errors->has('address1')){{old('address1')}}@else{{$buyers->address1}}@endif"  required />
                       @if($errors->has('address1'))
                       <div class="alert alert-danger">
                          {{$errors->first('address1')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="address1" class="form-control m-bot15" id="name" value="{{old('address1')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Postal Code</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     @if(isset($buyers))
                     <input type="text" id="name" class="form-control m-bot15"  name="postal_code" value ="@if($errors->has('postal_code')){{old('postal_code')}}@else{{$buyers->postal_code}}@endif"  required />
                       @if($errors->has('postal_code'))
                       <div class="alert alert-danger">
                          {{$errors->first('postal_code')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="postal_code" class="form-control m-bot15" id="name" value="{{old('postal_code')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Paypal Email</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     @if(isset($buyers))
                     <input type="email" id="name" class="form-control m-bot15"  name="paypal_email" value ="@if($errors->has('paypal_email')){{old('paypal_email')}}@else{{$buyers->paypal_email}}@endif"  required />
                       @if($errors->has('paypal_email'))
                       <div class="alert alert-danger">
                          {{$errors->first('paypal_email')}}
                       </div>
                       @endif
                     @else
                    <input type="email" name="paypal_email" class="form-control m-bot15" id="name" value="{{old('paypal_email')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('status')) error @endif">
                    @if(isset($buyers))
                      <select class="form-control m-bot15" name="status">
                         <option value="0" @if(0 == $buyers->status){{'selected'}}@endif>Active</option>
                         <option value="1" @if(1 == $buyers->status){{'selected'}}@endif>Blocked</option> 
                    </select>
                    @else
                      <select class="form-control m-bot15" name="status">
                         <option value="0">Active</option>
                         <option value="1">Blocked</option> 
                    </select>
                    @endif
                  </div>
               </div>
               
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Newsletter</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('newsletter')) error @endif">
                    @if(isset($buyers))
                      <select class="form-control m-bot15" name="newsletter">
                         <option value="0" @if(0 == $buyers->newsletter){{'selected'}}@endif>Not Subscribed</option>
                         <option value="1" @if(1 == $buyers->newsletter){{'selected'}}@endif>Subscribed</option> 
                    </select>
                    @else
                      <select class="form-control m-bot15" name="newsletter">
                         <option value="0">Not Subscribed</option>
                         <option value="1">Subscribed</option> 
                    </select>
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                 	@if(isset($buyers))
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
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
$('#datepicker').timepicker({
    timeFormat: 'hh:m:ss p',
    interval: 1,
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
</script>
@stop

