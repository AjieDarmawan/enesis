@extends('master.gt_store.base') 

@section('content_header')
	  <h1>
        Add New Gt Store
        <small>Tambah Gt Store</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Create Gt Store</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('gt_store.store') }}">
  <div class="row">

	<div class="col-xs-12">
	  <div class="box box-danger">
	    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
	    <br>      
        <div class="form-group">
          <label class="col-xs-2 control-label">Cost Ship Id</label>
          <div class="col-xs-3">
            <input type="int"  id="cust_ship_id" name="cust_ship_id"   placeholder="Cost Ship Id" class="form-control" required/> 
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Customer Number</label>
          <div class="col-xs-3">
            <input type="text"  id="customer_number" name="customer_number"   placeholder="Customer Number" class="form-control" required/> 
          </div>   
        </div>   
        <div class="form-group">
          <label class="col-xs-2 control-label">Store Name</label>
          <div class="col-xs-3">
            <input type="text"  id="store_name" name="store_name"   placeholder="Store Name" class="form-control" required/> 
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Alamat</label>
          <div class="col-xs-3">
            <input type="text"  id="alamat" name="alamat"   placeholder="Alamat" class="form-control" required/> 
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Alamat 2</label>
          <div class="col-xs-3">
            <input type="text"  id="alamat2" name="alamat2"   placeholder="Alamat 2" class="form-control" required/> 
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Alamat 3</label>
          <div class="col-xs-3">
            <input type="text"  id="alamat3" name="alamat3"   placeholder="Alamat 3" class="form-control" required/> 
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Alamat 4</label>
          <div class="col-xs-3">
            <input type="text"  id="alamat4" name="alamat4"   placeholder="Alamat 4" class="form-control" required/> 
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Kota</label>
          <div class="col-xs-3">
            <input type="text"  id="kota" name="kota"   placeholder="Kota" class="form-control" required/> 
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Propinsi</label>
          <div class="col-xs-3">
            <input type="text"  id="propinsi" name="propinsi"   placeholder="Propinsi" class="form-control" required/> 
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Active Satus</label>
          <div class="checkbox">
            <div class="col-xs-3">
              <input checked="checked" type="checkbox"  id="active" name="active" value="Y" />
            </div>   
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Type Market Code</label>
            <div class="col-xs-6">
              <select class="form-control select2" multiple="multiple" style="width: 75%;" id="type_market_code"  name="type_market_code" type="text">
                  <option value = "">  -- Pilih Type Market Code -- </option>
                  @foreach($ltypmarket as $value)
                    <option value = "{{$value->id}}" > {{$value->description}} </option>
                  @endforeach
              </select>
            </div>
        </div>

	  	<br>
	  </div>
	  <!-- Box Footer -->
      <div class="box-footer">
      		<a href="{{ route('gt_store.index') }}" class="btn btn-danger btn-sm">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
	</div>
  </div> 
</form>
@stop

 