@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Add a New Achievement Category</h2>
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
        <form class="form-horizontal form-label-left" method = "post" action = "{{Request::root()}}/admindashboard/achievement/manage-category/edit" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id" value="{{ $category_data->id }}">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Category Name
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name" class="form-control col-md-7 col-xs-12" name = "name" value = "{{ $category_data->name }}" minlength="3" maxlength="50"  required />
              @if($errors->has('name'))
              <div class="alert alert-danger">
                {{$errors->first('name')}}
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
                <option value="1" {{ $category_data->status == 1 ? 'selected' : ''  }}>Active</option>
                <option value="0" {{ $category_data->status == 0 ? 'selected' : '' }}>Inactive</option>
              </select>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-success">Update</button>
              <a href="{{URL::previous()}}" class="btn btn-danger">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop
