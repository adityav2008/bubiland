@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <ul class="nav navbar-right panel_toolbox">
                  <li><button type="button" class="btn btn-primary btn-sm" onClick = "location.href='{{Request::root()}}/admindashboard/Banner/edit-banner'" type="button" class="btn btn-primary">Add</button></li>
               </ul>
               <h2>Manage Banners </h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                     <thead>
                        <tr class="headings">
                           <th class="column-title">Banner Id </th>
                           <th class="column-title">Banner Name </th>
                           <th class="column-title">Page Url </th>
                           <th class="column-title">Image</th>
                           <th class="column-title">Height</th>
                           <th class="column-title">Width </th>
                           <th class="column-title">Status </th>
                           <th class="column-title">Edit </th>
                           <th class="column-title">Delete </th>
                        </tr>
                     </thead>
                     <tbody>
                      <?php $sno = 0; ?>

                      @foreach($banners as $banner)
                      <?php $sno++; ?>
                        <tr>
                           <td>{{$sno}}</td>
                           <td>{{$banner->name}}</td>
                           <td>{{$banner->page}}</td>
                           <td><img src="{{Request::root()}}{{$banner->image_url}}" height="80px" width="100px"></td>
                           <td>{{$banner->height}}</td>
                           <td>{{$banner->width}}</td>
                          <td>@if(1 == $banner->active){{"Active"}}@else{{"Inactive"}}@endif</td>
                         
                           <td><button  onClick="location.href = '{{Request::root()}}/admindashboard/Banner/manage-banner?id={{$banner->id}}';" type="button" class="btn btn-success" type="button" class="btn btn-success">Edit</button></td>
                           <td><button onClick="location.href = '{{Request::root()}}/admindashboard/Banner/manage-banner/delete?id={{$banner->id}}';" type="button" class="btn btn-danger">Delete</button></td>
                        </tr>
                      @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@stop

