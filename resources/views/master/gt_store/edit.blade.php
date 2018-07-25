@extends('master.gt_store.base') 

@section('content_header')
    <h1>
        Edit Gt Store
        <small>Edit Gt Store</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Edit Gt Store</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('gt_store.store',['id' => $EditStore->id]) }}">
  <div class="row">

  <div class="col-xs-12">
    <div class="box box-danger">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
      <br>
        <div class="form-group">
          <label class="col-xs-2 control-label">Cust Ship Id</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $EditStore->cust_ship_id }}" id="cust_ship_id" name="cust_ship_id" class="form-control" required/> 
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Customer Number</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $EditStore->customer_number }}" id="customer_number" name="customer_number" class="form-control" required/> 
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Store Name</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $EditStore->store_name }}" id="store_name" name="store_name" class="form-control" required/> 
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Alamat</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $EditStore->alamat }}" id="alamat" name="alamat" class="form-control" required/> 
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Alamat 2</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $EditStore->alamat2 }}" id="alamat2" name="alamat2" class="form-control" required/> 
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Alamat 3</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $EditStore->alamat3 }}" id="alamat3" name="alamat3" class="form-control" required/> 
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Alamat 4</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $EditStore->alamat4 }}" id="alamat4" name="alamat4" class="form-control" required/> 
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Kota</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $EditStore->kota }}" id="kota" name="kota" class="form-control" required/> 
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Propinsi</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $EditStore->propinsi }}" id="propinsi" name="propinsi" class="form-control" required/> 
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Active Satus</label>
          <div class="checkbox">
            <div class="col-xs-3">
              <input checked="checked" type="checkbox" value="{{ $EditStore->active }}" id="active" name="active" /> 
            </div>   
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Type Market Code</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $EditStore->type_market_code }}" id="type_market_code" name="type_market_code" class="form-control" required/> 
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
