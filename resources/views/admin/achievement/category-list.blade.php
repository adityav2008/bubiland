@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Achievement Category List</h2>
        <div class="pull-right">
          <a href="{{Request::root()}}/admindashboard/achievement/manage-category/add" class="btn btn-success btn-sm">Add Achievement Category</a>
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
              <th>Categoty Name</th>
              <th>Created at</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if(!EMPTY($category_list))
            <?php $i=1; ?>
            @foreach($category_list as $list )
            <tr>
              <td>{{$i++}}.</td>
              <td>{{$list->name}}</td>
              <td>{{$list->created_at}}</td>
              <td>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Click
                    <span class="caret"></span>
                  </button>
                  <ul role="menu" class="dropdown-menu">
                    <li>
                      <a href="{{Request::root()}}/admindashboard/achievement/manage-category/edit/{{$list->id}}">Edit</a>
                    </li>
                    <li>
                      <a href="{{Request::root()}}/admindashboard/achievement/manage-category/delete/{{$list->id}}">Delete</a>
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
