@extends('master.budget_dstr.base') 

@section('content_header') 
	     <h1>
        List Of  budget Asdh
        <small>Daftar budget Asdh</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> budget Asdh as $value</a></li>
        <li class="active">budget Asdh</li>
      </ol>  
@stop

@section('content')
<div class="row">
   <div class="col-xs-12">
     <div class="box box-danger">
     	<div class="box-header">
		     <div class="col-sm-4">
           <a class="btn btn-primary" href="{{ route('budget_asdh.create') }}">Add budget Asdh</a>
			 </div>
		 </div>
     	<div class="col-xs-10">
             <div class="box-body">
            	<table id="budget_dstr" name = "budget_dstr" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>No.</th>
                    <th>Budget ID</th>  
                    <th>Area</th>                   
                    <th>Asdh</th>    
                    <th>Month-Year</th>                       
                    <th>Budget-amount</th>    
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0 ?>
                       @foreach($budget_dstr as $value)
                        <?php $i++ ?>
                        <tr>
                        	<td> {{ $i }} </td>
                          <td> {{ ($value->budget_dst_id) }} </td>                      
                          <td> {{ ($value->area_id) }} </td>
                          <td> {{ ($value->asdh_id) }} </td>
                          <td> {{ ($value->monthyear) }} </td>
                          <td> {{ ($value->budget_amount) }} </td> 
                         <!--
                          <td><a href="{{ 
                          route('division.edit',$value->id) }}
                          " class="btn btn-success btn-sm">Edit</a></td>
                        -->
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
 