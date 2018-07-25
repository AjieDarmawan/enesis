@extends('master.gt_store.base') 

@section('content_header') 
	     <h1>
        List Of Gt Store
        <small>Daftar Gt Store</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Gt Store</a></li>
        <li class="active">Master Gt Store</li>
      </ol>  
@stop

@section('content')
<div class="row">
   <div class="col-xs-12">
     <div class="box box-danger">
     	<div class="box-header">
		     <div class="col-sm-4">
		       <a class="btn btn-primary" href="{{ route('gt_store.create') }}">Add Gt Store</a>
			 </div>
		 </div>
     	<div class="col-xs-10">
             <div class="box-body">
            	<table id="gstore" name = "gstore" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Custship Id</th>
                      <th>Customer Numb</th>
                      <th>Store Name</th>
                      <th>Alamat</th>
                      <th>Alamat2</th>
                      <th>Alamat3</th>
                      <th>Alamat4</th>
                      <th>Kota</th>
                      <th>Propinsi</th>
                      <th>Active</th>
                      <th>Typ Market Code</th>                     
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php $i = 0 ?>
                      @if (isset($GtStore))
                        @foreach($GtStore as $value)
                        <?php $i++ ?>
                        <tr>
                        	<td> {{ $i }} </td>
                          <td> {{ ($value->cust_ship_id) }} </td>
                          <td> {{ ($value->customer_number) }} </td>
                          <td> {{ ($value->store_name) }} </td>
                          <td> {{ ($value->alamat) }} </td>
                          <td> {{ ($value->alamat2) }} </td>
                          <td> {{ ($value->alamat3) }} </td>
                          <td> {{ ($value->alamat4) }} </td>
                          <td> {{ ($value->kota) }} </td>
                          <td> {{ ($value->propinsi) }} </td>
                          <td> {{ ($value->active) }} </td>
                          <td> {{ ($value->type_market_code) }} </td>                        
                          <td><a href="{{ 
                          route('gt_store.edit',$value->id) }}
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
 