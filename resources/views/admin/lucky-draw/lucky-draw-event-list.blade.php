@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Lucky Draw Event List</h2>
        <div class="pull-right">
          <a href="{{Request::root()}}/admindashboard/lucky-draw/add" class="btn btn-success btn-sm">Add Lucky Draw Event</a>
        </div>
        <div class="clearfix"></div>
      </div>
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
      <br>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Event Name</th>
              <th>Time</th>
              <th>Prize</th>
              <th>No. Of Winner</th>
              <th>Winner Names</th>
              <th>Participation Charge</th>
              <th>Announcement date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if(!EMPTY($event_list))
            <?php $i=1; ?>
            @foreach($event_list as $list )
            <tr>
              <td>{{$i++}}.</td>
              <td>{{$list->event_name}}</td>
              <td>{{$list->start_date}} - {{$list->end_date}}</td>
              <td>{{$list->prize}}</td>
              <td>{{$list->winner_no}}</td>
              <td>{{$list->winner_names}}</td>
              <td>{{$list->charge}}</td>
              <td>{{$list->announcement_date}}</td>
              <td>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Click
                    <span class="caret"></span>
                  </button>
                  <ul role="menu" class="dropdown-menu">
                    <li>
                      <a href="{{Request::root()}}/admindashboard/lucky-draw/add/{{$list->id}}">Edit</a>
                    </li>
                    <li>
                      <a href="{{Request::root()}}/admindashboard/lucky-draw/delete/{{$list->id}}">Delete</a>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop
