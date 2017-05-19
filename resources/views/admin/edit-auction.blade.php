@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div class="x_title">
            <h2>Add auction Categories</h2>
            <div class="clearfix"></div>
         </div>
         <div class="x_content">
            
            @if(isset($auctioncategories))
              <form action="{{Request::root()}}//admindashboard/add-auction-category?id={{$auctioncategories->auction_category_id}}" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="edit" />
            @else
              <form action="{{Request::root()}}//admindashboard/add-auction-category" method="post" class="form-horizontal" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="add" />
            @endif
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Auction Category Name
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('auction_category_name')) error @endif">
                     @if(isset($auctioncategories))
                     <input type="text" id="name" class="form-control m-bot15"  name="auction_category_name" value ="@if($errors->has('auction_category_name')){{old('auction_category_name')}}@else{{$auctioncategories->auction_category_name}}@endif "  required />
                       @if($errors->has('auction_category_name'))
                       <div class="alert alert-danger">
                          {{$errors->first('auction_category_name')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="auction_category_name" class="form-control m-bot15" id="name" value="{{old('auction_category_name')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('status_value')) error @endif">
                    @if(isset($auctioncategories))
                      <select class="form-control m-bot15" name="status_value">
                         <option value="0" @if(0 == $auctioncategories->status_value){{'selected'}}@endif>Inactive</option>
                         <option value="1" @if(1 == $auctioncategories->status_value){{'selected'}}@endif>Active</option> 
                    </select>
                    @else
                      <select class="form-control m-bot15" name="status_value">
                         <option value="0">Inactive</option>
                         <option value="1">Active</option> 
                    </select>
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Index</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('index_value')) error @endif">
                    @if(isset($auctioncategories))
                      <select class="form-control m-bot15" name="index_value">
                         <option value="0" @if(0 == $auctioncategories->index_value){{'selected'}}@endif>Inactive</option>
                         <option value="1" @if(1 == $auctioncategories->index_value){{'selected'}}@endif>Active</option> 
                    </select>
                    @else
                      <select class="form-control m-bot15" name="index_value">
                         <option value="0">Inactive</option>
                         <option value="1">Active</option> 
                    </select>
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                 	@if(isset($auctioncategories))
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

