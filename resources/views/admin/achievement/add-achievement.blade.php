@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Add a New Achievement</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
        <form class="form-horizontal form-label-left" method = "post" action = "{{Request::root()}}/admindashboard/achievement/manage-achievement/add" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Achievement Name
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name" class="form-control col-md-7 col-xs-12" name = "achievement_name" value ="{{old('achievement_name')}}" minlength="3" maxlength="50"  required />
              @if($errors->has('achievement_name'))
              <div class="alert alert-danger">
                {{$errors->first('achievement_name')}}
              </div>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea required="required" class="form-control" name="description" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10">{{old('description')}}</textarea>
              @if($errors->has('description'))
              <div class="alert alert-danger">
                {{$errors->first('description')}}
              </div>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bonus Point
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name" class="form-control col-md-7 col-xs-12" name = "bonus_point" value = "{{old('bonus_point')}}" minlength="3" maxlength="50"  required />
              @if($errors->has('bonus_point'))
              <div class="alert alert-danger">
                {{$errors->first('bonus_point')}}
              </div>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Achievement Type
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="select2_single form-control" name="achievement_type" tabindex="-1">
                <option></option>
                @if(!EMPTY($achievement_category))
                  @foreach($achievement_category as $list)
                    <option value="{{$list->id}}">{{$list->name}}</option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Expiry Date
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name" class="form-control col-md-7 col-xs-12 datepicker" name = "expiry_date" value = "" minlength="3" maxlength="50"  required />
              @if($errors->has('expiry_date'))
              <div class="alert alert-danger">
                {{$errors->first('expiry_date')}}
              </div>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="select2_single form-control" name="status" tabindex="-1">
                <option></option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-success">Add</button>
              <a href="{{URL::previous()}}" class="btn btn-danger">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $('.datepicker').datepicker();
})
</script>
@stop
