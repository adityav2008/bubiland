@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div class="x_title">
            <h2>Add Banner</h2>
            <div class="clearfix"></div>
         </div>
         <div class="x_content">
            @if(isset($banners))
              <form action="{{Request::root()}}/admindashboard/Banner/edit-banner?id={{$banners->id}}" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="edit" />
            @else
              <form action="{{Request::root()}}/admindashboard/Banner/edit-banner" method="post" class="form-horizontal" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="add" />
            @endif
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Banner Name</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     @if(isset($banners))
                     <input type="text" id="name" class="form-control m-bot15"  name="name" value ="@if($errors->has('name')){{old('name')}}@else{{$banners->name}}@endif"  required />
                       @if($errors->has('name'))
                       <div class="alert alert-danger">
                          {{$errors->first('name')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="name" class="form-control m-bot15" id="name" value="{{old('name')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Page Url </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('page')) error @endif">
                     @if(isset($banners))
                     <input type="text" id="name" class="form-control m-bot15"  name="page" value ="@if($errors->has('page')){{old('page')}}@else{{$banners->page}}@endif"  required />
                       @if($errors->has('page'))
                       <div class="alert alert-danger">
                          {{$errors->first('page')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="page" class="form-control m-bot15" id="name" value="{{old('page')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('image_url')) error @endif">
                     @if(isset($banners))
                     <input type="file" class="form-control"  name="image_url" value ="@if($errors->has('image_url')){{old('image_url')}}@else{{$banners->image_url}}@endif"  required />
                       @if($errors->has('image_url'))
                       <div class="alert alert-danger">
                          {{$errors->first('image_url')}}
                       </div>
                       @endif
                     @else
                    <input type="file" name="image_url" class="form-control " value="{{old('image_url')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Image Height </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('height')) error @endif">
                     @if(isset($banners))
                     <input type="text" id="name" class="form-control m-bot15"  name="height" value ="@if($errors->has('height')){{old('height')}}@else{{$banners->height}}@endif "  required />
                       @if($errors->has('height'))
                       <div class="alert alert-danger">
                          {{$errors->first('height')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="height" class="form-control m-bot15" id="name" value="{{old('height')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Image Width </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('width')) error @endif">
                     @if(isset($banners))
                     <input type="text" id="name" class="form-control m-bot15"  name="width" value ="@if($errors->has('width')){{old('width')}}@else{{$banners->width}}@endif "  required />
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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Active</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('active')) error @endif">
                    @if(isset($banners))
                      <select class="form-control m-bot15" name="active">
                         <option value="0" @if(0 == $banners->active){{'selected'}}@endif>Inactive</option>
                         <option value="1" @if(1 == $banners->active){{'selected'}}@endif>Active</option> 
                    </select>
                    @else
                      <select class="form-control m-bot15" name="active">
                         <option value="0">Inactive</option>
                         <option value="1">Active</option> 
                    </select>
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                 	@if(isset($banners))
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

