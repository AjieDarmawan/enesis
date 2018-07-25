@extends('master.group_hirarki_limit.base') 

@section('content_header') 
	     <h1>
        List Of Group Hirarki Limit </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kategory Group Hirarki Limit</a></li>
        <li class="active">Master Group Hirarki Limit</li>
      </ol>  
@stop

@section('content')
<div class="row">
   <div class="col-xs-12">
     <div class="box box-danger">
     	<div class="box-header">
		     <div class="col-sm-4">
		       <a class="btn btn-primary" href="{{ route('group_hirarki_limit.create') }}">Add Group Hirarki Limit</a>
			 </div>
		 </div>
     	<div class="col-xs-10">
             <div class="box-body">
            	<table id="tbgrphirarki" name = "tbgrphirarki" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Description</th>
                      <th>Amount From</th>
                      <th>Amount To</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0 ?>
                      @if (isset($IHirarki))
                        @foreach($IHirarki as $value)
                        <?php $i++ ?>
                        <tr>
                        	<td> {{ $i }} </td>
                          <td> {{ ($value->description) }} </td>
                          <td> {{ ($value->amount_from) }} </td>
                          <td> {{ ($value->amount_to) }} </td>
                          <td><a href="{{ 
                          route('group_hirarki_limit.edit',$value->id) }}
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
 