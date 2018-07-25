@extends('master.division.base') 

@section('content_header') 
	     <h1>
        List Of  division
        <small>Daftar  division</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> division</a></li>
        <li class="active">Master  division</li>
      </ol>  
@stop

@section('content')
<div class="row">
   <div class="col-xs-12">
     <div class="box box-danger">
     	<div class="box-header">
		     <div class="col-sm-4">
           <a class="btn btn-primary" href="{{ route('division.create') }}">Add  division</a>
			 </div>
		 </div>
     	<div class="col-xs-10">
             <div class="box-body">
            	<table id="division" name = "division" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Division code</th>
                      <th>Division name</th>                    
                      <th>Active</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0 ?>
                       @foreach($Div as $value)
                        <?php $i++ ?>
                        <tr>
                        	<td> {{ $i }} </td>
                          <td> {{ ($value->division_code) }} </td>
                          <td> {{ ($value->division_name) }} </td>
                          <td> {{ ($value->active) }} </td>                       
                          <td><a href="{{ 
                          route('division.edit',$value->id) }}
                          " class="btn btn-success btn-sm">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
              </div>  
            </div> 
     <!--end box danger -->
     </div>
   </div>
</div>
@stop
 