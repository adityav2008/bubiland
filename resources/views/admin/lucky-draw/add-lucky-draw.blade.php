@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Add a New Lucky Draw Event</h2>
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
        <form class="form-horizontal form-label-left" method = "post" action = "{{Request::root()}}/admindashboard/lucky-draw/add" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Event Name
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name" class="form-control col-md-7 col-xs-12" name = "event_name" value ="{{old('event_name')}}" minlength="3" maxlength="50"  required />
              @if($errors->has('event_name'))
              <div class="alert alert-danger">
                {{$errors->first('event_name')}}
              </div>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Start Date
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name" class="form-control col-md-7 col-xs-12 datepicker1" name = "start_date" value ="{{old('start_date')}}" minlength="3" maxlength="50"  required />
              @if($errors->has('start_date'))
              <div class="alert alert-danger">
                {{$errors->first('start_date')}}
              </div>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">End Date</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name" class="form-control col-md-7 col-xs-12 datepicker2" name = "end_date" value ="{{old('end_date')}}" minlength="3" maxlength="50"  required />
              @if($errors->has('end_date'))
              <div class="alert alert-danger">
                {{$errors->first('end_date')}}
              </div>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Prize</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="select2_single form-control" id="prize" name="prize" tabindex="-1">
                <option>Select Prize Type</option>
                <option value="Bonus Points">Bonus Points</option>
                <option value="Free Products">Free Products</option>
                <option value="Cash">Cash</option>
              </select>
              @if($errors->has('amount'))
              <div class="alert alert-danger">
                {{$errors->first('amount')}}
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
            <label class="control-label col-md-3 col-sm-3 col-xs-12">No Of Winner's
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name" class="form-control col-md-7 col-xs-12" name = "winner_no" value = "{{old('winner_no')}}" required />
              @if($errors->has('winner_no'))
              <div class="alert alert-danger">
                {{$errors->first('winner_no')}}
              </div>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Participation Charge
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="charge" value="{{old('charge')}}" required />
              @if($errors->has('charge'))
              <div class="alert alert-danger">
                {{$errors->first('charge')}}
              </div>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Announcement Date
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name" class="form-control col-md-7 col-xs-12 datepicker" name="announcement_date" value="{{old('announcement_date')}}" required />
              @if($errors->has('announcement_date'))
              <div class="alert alert-danger">
                {{$errors->first('announcement_date')}}
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
    $('.datepicker1').datepicker();
    $('.datepicker2').datepicker();
})

$(document).on('change','#prize',function(){
  if($(this).val() == 'Bonus Points')
  {

  }
  if($(this).val() == 'Free Products')
  {

  }
  if($(this).val() == 'Cash')
  {

  }
})
</script>
@stop
