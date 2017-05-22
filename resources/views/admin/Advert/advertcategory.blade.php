@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <ul class="nav navbar-right panel_toolbox">
                  <li><button type="button" class="btn btn-primary btn-sm" onClick = "location.href='{{Request::root()}}/admindashboard/Advert/edit-advert-category'" type="button" class="btn btn-primary">Add</button></li>
               </ul>
               <h2>Manage Adverts </h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                     <thead>
                        <tr class="headings">
                           <th class="column-title">Category Id </th>
                           <th class="column-title">Category Name </th>
                           <th class="column-title">width </th>
                           <th class="column-title">height</th>
                           <th class="column-title">Edit </th>
                           <th class="column-title">Delete </th>
                        </tr>
                     </thead>
                     <tbody>
                    
                       @foreach($addscategory as $add_category)
                        <tr>
                           <td>{{$add_category->id}}</td>
                           <td>{{$add_category->type}}</td>
                           <td>{{$add_category->width}}</th>
                           <td>{{$add_category->height}}</th>
                           <td><button  onClick="location.href = '{{Request::root()}}/admindashboard/Advert/edit-advert-category?id={{$add_category->id}}';" type="button" class="btn btn-success" type="button" class="btn btn-success">Edit</button></td>
                           <td><button onClick="location.href = '{{Request::root()}}/admindashboard/Advert/edit-advert-category/delete?id={{$add_category->id}}';" type="button" class="btn btn-danger">Delete</button></td>
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

