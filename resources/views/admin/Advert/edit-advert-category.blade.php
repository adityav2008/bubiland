@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div class="x_title">
            <h2>Add Adverts</h2>
            <div class="clearfix"></div>
         </div>
         <div class="x_content">
            
            @if(isset($addscategory))

              <form action="{{Request::root()}}/admindashboard/Advert/edit-advert-category?id={{$addscategory->id}}" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="edit" />
            @else
              <form action="{{Request::root()}}/admindashboard/Advert/edit-advert-category" method="post" class="form-horizontal" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="add" />
            @endif
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('type')) error @endif">
                     @if(isset($addscategory))
                     <input type="text" id="name" class="form-control m-bot15"  name="type" value ="@if($errors->has('type')){{old('type')}}@else{{$addscategory->type}}@endif "  required />
                       @if($errors->has('type'))
                       <div class="alert alert-danger">
                          {{$errors->first('type')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="type" class="form-control m-bot15" id="name" value="{{old('type')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Width </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('width')) error @endif">
                     @if(isset($addscategory))
                     <input type="text" id="name" class="form-control m-bot15"  name="width" value ="@if($errors->has('width')){{old('width')}}@else{{$addscategory->width}}@endif "  required />
                       @if($errors->has('width'))
                       <div class="alert alert-danger">
                          {{$errors->first('width')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="width" class="form-control m-bot15" id="name" value="{{old('width')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Height</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('height')) error @endif">
                     @if(isset($addscategory))
                     <input type="text" class="form-control"  name="height" value ="@if($errors->has('height')){{old('height')}}@else{{$addscategory->height}}@endif "  required />
                       @if($errors->has('height'))
                       <div class="alert alert-danger">
                          {{$errors->first('height')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="height" class="form-control " value="{{old('height')}}">
                    @endif
                  </div>
               </div>
               
               <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                 	@if(isset($addscategory))
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

