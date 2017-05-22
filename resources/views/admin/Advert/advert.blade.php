@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <ul class="nav navbar-right panel_toolbox">
                  <li><button type="button" class="btn btn-primary btn-sm" onClick = "location.href='{{Request::root()}}/admindashboard/Advert/edit-advert'" type="button" class="btn btn-primary">Add</button></li>
               </ul>
               <h2>Manage Adverts </h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                     <thead>
                        <tr class="headings">
                           <th class="column-title">Advert Id </th>
                           <th class="column-title">Advert Name </th>
                           <th class="column-title">Page Url </th>
                           <th class="column-title">Image</th>
                           <th class="column-title">Views</th>
                           <th class="column-title">Clicks </th>
                           <th class="column-title">Status </th>
                           <th class="column-title">Viewed At </th>
                           <th class="column-title">Edit </th>
                           <th class="column-title">Delete </th>
                        </tr>
                     </thead>
                     <tbody>
                      <?php $sno = 0; ?>

                      @foreach($advert as $adds)
                      <?php $sno++; ?>
                        <tr>
                           <td>{{$sno}}</td>
                           <td>{{$adds->alt}}</td>
                           <td>{{$adds->url}}</td>
                           <td><img src="{{Request::root()}}{{$adds->image_url}}" height="80px" width="100px"></td>
                           <td>{{$adds->views}}</td>
                           <td>{{$adds->clicks}}</td>
                          <td>@if(1 == $adds->active){{"Active"}}@else{{"Inactive"}}@endif</td>
                          <td> {{$adds->viewed_at}} </td>
                           <td><button  onClick="location.href = '{{Request::root()}}/admindashboard/Advert/manage-advert?id={{$adds->id}}';" type="button" class="btn btn-success" type="button" class="btn btn-success">Edit</button></td>
                           <td><button type="button" class="btn btn-danger">Delete</button></td>
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

