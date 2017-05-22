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
            
            @if(isset($adverts))
              <form action="{{Request::root()}}/admindashboard/Advert/edit-advert?id={{$adverts->id}}" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="edit" />
            @else
              <form action="{{Request::root()}}/admindashboard/Advert/edit-advert" method="post" class="form-horizontal" enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="action" value="add" />
            @endif
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Adverts Name</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('alt')) error @endif">
                     @if(isset($adverts))
                     <input type="text" id="name" class="form-control m-bot15"  name="alt" value ="@if($errors->has('alt')){{old('alt')}}@else{{$adverts->alt}}@endif "  required />
                       @if($errors->has('alt'))
                       <div class="alert alert-danger">
                          {{$errors->first('alt')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="alt" class="form-control m-bot15" id="name" value="{{old('alt')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Page Url </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('url')) error @endif">
                     @if(isset($adverts))
                     <input type="text" id="name" class="form-control m-bot15"  name="url" value ="@if($errors->has('url')){{old('url')}}@else{{$adverts->url}}@endif "  required />
                       @if($errors->has('url'))
                       <div class="alert alert-danger">
                          {{$errors->first('url')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="url" class="form-control m-bot15" id="name" value="{{old('url')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('image_url')) error @endif">
                     @if(isset($adverts))
                     <input type="file" class="form-control"  name="image_url" value ="@if($errors->has('image_url')){{old('image_url')}}@else{{$adverts->image_url}}@endif "  required />
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
               <!-- <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Image Path </label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('image_path')) error @endif">
                     @if(isset($adverts))
                     <input type="text" id="name" class="form-control m-bot15"  name="image_path" value ="@if($errors->has('image_path')){{old('image_path')}}@else{{$adverts->image_path}}@endif "  required />
                       @if($errors->has('image_path'))
                       <div class="alert alert-danger">
                          {{$errors->first('image_path')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="image_path" class="form-control m-bot15" id="name" value="{{old('image_path')}}">
                    @endif
                  </div>
               </div> -->
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Views</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('views')) error @endif">
                     @if(isset($adverts))
                     <input type="text" id="name" class="form-control m-bot15"  name="views" value ="@if($errors->has('views')){{old('views')}}@else{{$adverts->views}}@endif"  required />
                       @if($errors->has('views'))
                       <div class="alert alert-danger">
                          {{$errors->first('views')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="views" class="form-control m-bot15" id="name" value="{{old('views')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Clicks</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('clicks')) error @endif">
                     @if(isset($adverts))
                     <input type="text" id="name" class="form-control m-bot15"  name="clicks" value ="@if($errors->has('clicks')){{old('clicks')}}@else{{$adverts->clicks}}@endif"  required />
                       @if($errors->has('clicks'))
                       <div class="alert alert-danger">
                          {{$errors->first('clicks')}}
                       </div>
                       @endif
                     @else
                    <input type="text" name="clicks" class="form-control m-bot15" id="name" value="{{old('clicks')}}">
                    @endif
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Active</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('active')) error @endif">
                    @if(isset($adverts))
                      <select class="form-control m-bot15" name="active">
                         <option value="0" @if(0 == $adverts->active){{'selected'}}@endif>Inactive</option>
                         <option value="1" @if(1 == $adverts->active){{'selected'}}@endif>Active</option> 
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
                  <label  class="control-label col-md-3 col-sm-3 col-xs-12">Advert Category</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('advert_category_id')) error @endif">
                    @if(isset($adverts))
                      <select class="form-control m-bot15" name="advert_category_id">
                        @foreach($categoryId as $keys => $category)
                        {{$category}}
                        <option value="@if($errors->has('advert_category_id')){{old('advert_category_id')}}@else{{$category->id}}@endif"> @if($errors->has('advert_category_id')){{old('advert_category_id')}}@else{{$category->id}}@endif</option>
                        @endforeach
                      </select>
                    @else
                       <select class="form-control m-bot15" name="advert_category_id">
                         @foreach($categoryId as $category)
                         <option value="@if($errors->has('advert_category_id')){{old('advert_category_id')}}@else{{$category->id}}@endif"> @if($errors->has('advert_category_id')){{old('advert_category_id')}}@else{{$category->id}}@endif</option>
                        @endforeach
                      </select> 
                    @endif
                  </div>
               </div>

               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Veiwed at</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 @if ($errors->has('viewed_at')) error @endif">
                     @if(isset($adverts))
                     <input type="datetime" id="datepicker" class="form-control m-bot15 time"  name="viewed_at" value ="@if($errors->has('viewed_at')){{old('viewed_at')}}@else{{$adverts->viewed_at}}@endif"  required />
                       @if($errors->has('viewed_at'))
                       <div class="alert alert-danger">
                          {{$errors->first('viewed_at')}}
                       </div>
                       @endif
                     @else
                    <input type="datetime" name="viewed_at" class="form-control m-bot15" id="datepicker" value="{{old('viewed_at')}}">
                    @endif
                  </div>
               </div>

               <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                 	@if(isset($adverts))
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

