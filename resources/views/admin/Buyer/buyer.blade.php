@extends('admin.layouts.admindashboardlayout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
   <div class="col-md-12 col-sm-12 col-xs-12">
   @if (session('error'))
              <div class="alert alert-error">
                {{ session('error') }}
              </div>
            @endif
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif
            @if (session('warning'))
              <div class="alert alert-warning">
                {{ session('warning') }}
              </div>
            @endif
            @if (session('info'))
              <div class="alert alert-info">
                {{ session('info') }}
              </div>
            @endif
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <ul class="nav navbar-right panel_toolbox">
                  <li><button type="button" class="btn btn-primary btn-sm" onClick = "location.href='{{Request::root()}}/admindashboard/Buyer/edit-buyer'" type="button" class="btn btn-primary">Add</button></li>
               </ul>
               <h2>Manage Buyers </h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                     <thead>
                        <tr class="headings">
                           <th class="column-title">Buyer Id </th>
                           <th class="column-title">Name </th>
                           <th class="column-title">Email</th>
                           <th class="column-title">Company</th>
                           <th class="column-title">Status</th>
                           <th class="column-title"> Action</th>
                         
                        </tr>
                     </thead>
                     <tbody>
                      <?php $sno = 0; ?>

                      @foreach($buyers as $buyer)
                      <?php $sno++; ?>
                        <tr>
                           <td>{{$sno}}</td>
                           <td>{{$buyer->first_name}} {{$buyer->last_name}}</td>
                           <td>{{$buyer->email}}</td>
                           <td>{{$buyer->company}}</td>
                           <td> @if(1 == $buyer->status)
                                  <span class="label label-warning">Blocked</span>
                                @else
                                  <span class="label label-success">Actvie</span>
                                @endif
                              </td>
                          <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary">Action</button>
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu" style="margin: -6px 0px -1px -68px;">
                              <li><a href="{{Request::root()}}/admindashboard/Buyer/manage-buyer?id={{$buyer->user_id}}" >Edit</a></li>
                              <li><a href="{{Request::root()}}/admindashboard/Buyer/manage-buyer/view?id={{$buyer->user_id}}">View</a> </li>
                              <li> @if($buyer->status == 1) 
                                    <a href="{{Request::root()}}/admindashboard/Buyer/manage-buyer/block?id={{$buyer->user_id}}">Unblock</a>
                                   @else
                                   <a href="{{Request::root()}}/admindashboard/Buyer/manage-buyer/block?id={{$buyer->user_id}}">Block</a>
                                   @endif
                              </li>
                              <li class="divider"></li>
                              <li><a href="{{Request::root()}}/admindashboard/Buyer/manage-buyer/delete?id={{$buyer->user_id}}">Delete</a> </li>
                            </ul>
                          </div>
                          </td>
                        </tr>
                      @endforeach
                     </tbody>

                  </table>
                   {{ $buyers->links() }}
               </div>
            </div>
            
         </div>
      </div>
   </div>
</div>
@stop

