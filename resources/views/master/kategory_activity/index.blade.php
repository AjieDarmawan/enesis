@extends('master.kategory_activity.base') 

@section('content_header') 
	     <h1>
        List Of Kategory Activity
        <small>Daftar Kategory Activity</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kategory Activity</a></li>
        <li class="active">Master Kategory Activity</li>
      </ol>  
@stop

@section('content')
<div class="row">
   <div class="col-xs-12">
     <div class="box box-danger">
     	<div class="box-header">
		     <div class="col-sm-4">
           <a class="btn btn-primary" href="{{ route('kategory_activity.create') }}">Add Kategory Activity</a>
			 </div>
		 </div>
     	<div class="col-xs-10">
             <div class="box-body">
            	<table id="katactivity" name = "katactivity" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Group Name</th>
                      <th>Kategory Name</th>
                      <th>Budget Type</th>
                      <th>Flag Region</th>
                      <th>Flag MT</th>
                      <th>Active</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0 ?>
                      @if (isset($KatAct))
                        @foreach($KatAct as $value)
                        <?php $i++ ?>
                        <tr>
                        	<td> {{ $i }} </td>
                          <td> {{ ($value->group_name) }} </td>
                          <td> {{ ($value->kategory) }} </td>
                          <td> {{ ($value->budget_type) }} </td>
                          <td> {{ ($value->flag_region) }} </td>
                          <td> {{ ($value->flag_mt) }} </td>
                          <td> {{ ($value->active) }} </td>
                          <td><a href="{{ 
                          route('kategory_activity.edit',$value->id) }}
                          " class="btn btn-success btn-sm">Edit</a></td>
                        </tr>
                        @endforeach
                      @endif
                  </tbody>
                </table>  
              </div>  
            </div> 
     <!--end box danger -->
     </div>
   </div>
</div>
@stop
 