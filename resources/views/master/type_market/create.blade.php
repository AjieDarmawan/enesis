@extends('master.type_market.base') 

@section('content_header')
	  <h1>
        Add New Type Market
        <small>Tambah Type Market</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Create Type Market</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('type_market.store') }}">
  <div class="row">

	<div class="col-xs-12">
	  <div class="box box-danger">
	    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
	    <br>     

        <div class="form-group">
          <label class="col-xs-2 control-label">Type Market Code</label>
          <div class="col-xs-3">
            <input type="text"  id="type_market_code" name="type_market_code"   placeholder="Type Market Code" class="form-control" required/> 
          </div>   
        </div>   
        <div class="form-group">
          <label class="col-xs-2 control-label">Description</label>
          <div class="col-xs-3">
            <input type="text"  id="description" name="description"   placeholder="Description" class="form-control" required/> 
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

	  	<br>
	  </div>
	  <!-- Box Footer -->
      <div class="box-footer">
      		<a href="{{ route('type_market.index') }}" class="btn btn-danger btn-sm">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
	</div>
  </div> 
</form>
@stop

 