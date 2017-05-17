@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Achievement List</h2>
        <div class="pull-right">
          <a href="{{Request::root()}}/admindashboard/achievement/manage-achievement/add" class="btn btn-success btn-sm">Add Achievement</a>
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
              <th>Name</th>
              <th>Description</th>
              <th>Bonus Points</th>
              <th>Achievement Type</th>
              <th>Expiry Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if(!EMPTY($achievement_list))
            <?php $i=1; ?>
            @foreach($achievement_list as $list )
            <tr>
              <td>{{$i++}}.</td>
              <td>{{$list->achievement_name}}</td>
              <td>{{$list->description}}</td>
              <td>{{$list->bonus_point}}</td>
              <?php
                  $category = \App\Model\AchievementCategory::where('id',$list->achievement_type)->first(['name']);
              ?>
              <td>{{$category->name}}</td>
              <td>{{$list->expiry_date}}</td>
              <td>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Click
                    <span class="caret"></span>
                  </button>
                  <ul role="menu" class="dropdown-menu">
                    <li>
                      <a href="{{Request::root()}}/admindashboard/achievement/manage-achievement/edit/{{$list->id}}">Edit</a>
                    </li>
                    <li>
                      <a href="{{Request::root()}}/admindashboard/achievement/manage-achievement/delete/{{$list->id}}">Delete</a>
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
