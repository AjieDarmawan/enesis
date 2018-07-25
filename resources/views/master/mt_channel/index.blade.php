@extends('master.mt_channel.base') 

@section('content_header') 
	     <h1>
        List Of Mt Channel
        <small>Daftar Mt Channel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Mt Channel</a></li>
        <li class="active">Master Mt Channel</li>
      </ol>  
@stop

@section('content')
<div class="row">
   <div class="col-xs-12">
     <div class="box box-danger">
     	<div class="box-header">
		     <div class="col-sm-4">
		       <a class="btn btn-primary" href="{{ route('mt_channel.create') }}">Add Mt Channel</a>
			 </div>
		 </div>
     	<div class="col-xs-10">
             <div class="box-body">
            	<table id="mtchannel" name = "mtchannel" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Type Market Code</th>
                      <th>Channel Name</th>
                      <th>Active</th>                      
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0 ?>
                      @if (isset($MtChann))
                        @foreach($MtChann as $value)
                        <?php $i++ ?>
                        <tr>
                        	<td> {{ $i }} </td>
                          <td> {{ ($value->type_market_code) }} </td>
                          <td> {{ ($value->channel_name) }} </td>
                          <td> {{ ($value->active) }} </td>                          
                          <td><a href="{{ 
                          route('mt_channel.edit',$value->id) }}
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
 