@extends('master.type_market.base') 

@section('content_header') 
	     <h1>
        List Of Type Market
        <small>Daftar Type Market</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Type Market</a></li>
        <li class="active">Master Type Market</li>
      </ol>  
@stop

@section('content')
<div class="row">
   <div class="col-xs-12">
     <div class="box box-danger">
     	<div class="box-header">
		     <div class="col-sm-4">
		       <a class="btn btn-primary" href="{{ route('type_market.create') }}">Add Type Market</a>
			 </div>
		 </div>
     	<div class="col-xs-10">
             <div class="box-body">
            	<table id="TMarket" name = "TMarket" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Type Market Code</th>
                      <th>Description</th>
                      <th>Active</th>                      
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0 ?>
                      @if (isset($TypMarket))
                        @foreach($TypMarket as $value)
                        <?php $i++ ?>
                        <tr>
                        	<td> {{ $i }} </td>
                          <td> {{ ($value->type_market_code) }} </td>
                          <td> {{ ($value->description) }} </td>
                          <td> {{ ($value->active) }} </td>                          
                          <td><a href="{{ 
                          route('type_market.edit',$value->id) }}
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
 