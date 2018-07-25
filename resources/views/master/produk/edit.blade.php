@extends('master.produk.base') 

@section('content_header')
	  <h1>
        Edit Variant Product
        <small>Edit Variant Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Edit Variant Product</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('produk.store',['id' => $Edit->id]) }}">
  <div class="row">

	<div class="col-xs-12">
	  <div class="box box-danger">
	    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
	    <br>

      <div class="form-group">
          <label class="col-xs-2 control-label">variant Code</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $Edit->inventory_item_id}}" id="inventory_item_id" name="inventory_item_id"   class="form-control" required/> 
          </div>   
      </div>   

    <div class="form-group">
      <label class="col-xs-2 control-label">Brand ID</label>
        <div class="col-xs-6">
          <select class="form-control select2" style="width: 75%;" name="brand_id" id="brand_id" type="text" data-placeholder='-- Pilih Brand ID --'>
              <option></option>
              @foreach($lbrand as $value)
                <option value="{{$value->id}}">
                  {{$value->brand_code}}
                </option>
              @endforeach
          </select>
        </div>
    </div>   

       <div class="form-group">
          <label class="col-xs-2 control-label">variant Name</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $Edit->produk_name }}" id="produk_name" name="produk_name"   class="form-control" required/> 
          </div>   
        </div>

        <div class="form-group">
          <label class="col-xs-2 control-label">Active Satus</label>
          <div class="checkbox">
            <div class="col-xs-3">
              <input checked="checked" type="checkbox" value="{{ $Edit->active }}" id="active" name="active" /> 
            </div>   
          </div>   
        </div>        
	  	<br>
	  </div>
	  <!-- Box Footer -->
      <div class="box-footer">
      		<a href="{{ route('produk.index') }}" class="btn btn-danger btn-sm">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
	</div>
  </div> 
</form>
@stop

 