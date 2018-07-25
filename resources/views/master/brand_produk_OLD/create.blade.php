@extends('master.brand_produk.base') 

@section('content_header')
	  <h1>
        Add New Brand Produk
        <small>Tambah Brand Produk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Create Brand Produk</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('brand_produk.store') }}">
  <div class="row">

	<div class="col-xs-12">
	  <div class="box box-danger">
	    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
	    <br>

  <div class="form-group">
      <label class="col-xs-2 control-label">company ID</label>
        <div class="col-xs-6">
          <select class="form-control select2" style="width: 75%;" name="company_id" id="company_id" type="text" data-placeholder='-- Pilih Company ID --'>
              <option></option>
              @foreach($lcompany as $value)
                <option value="{{$value->id}}">
                  {{$value->company_name}}
                </option>
              @endforeach
          </select>
        </div>
    </div>  

        <div class="form-group">
          <label class="col-xs-2 control-label">Brand Code</label>
          <div class="col-xs-3">
            <input type="text"  id="brand_code" name="brand_code"   placeholder="Brand Code" class="form-control" required/> 
          </div>   
        </div>   
        <div class="form-group">
          <label class="col-xs-2 control-label">Brand Name</label>
          <div class="col-xs-3">
            <input type="text"  id="brand_name" name="brand_name"   placeholder="Brand Name" class="form-control" required/> 
          </div>   
        </div>

    <div class="form-group">
      <label class="col-xs-2 control-label">Product type</label>
        <div class="col-xs-6">
          <select class="form-control select2" style="width: 75%;" name="product_type" id="product_type" type="text" data-placeholder='-- Pilih product type --'>
              <option></option>
              @foreach($ltypeproduct as $value)
                <option value="{{$value->value_name}}">
                  {{$value->value_name}}
                </option>
              @endforeach
          </select>
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
      		<a href="{{ route('brand_produk.index') }}" class="btn btn-danger btn-sm">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
	</div>
  </div> 
</form>
@stop

 