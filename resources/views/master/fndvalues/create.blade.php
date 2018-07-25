@extends('layouts.base') 

@section('content_header')
	  <h1>
        Add New FND Value
        <small>Tambah FND Value</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">master</a></li>
        <li class="active">Create FND Values</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('fndvalues.store') }}">
  <div class="row">

    <div class="form-group">
          <label class="col-xs-2 control-label">Group Value</label>
            <div class="col-xs-6">
              <select class="form-control select2" style="width: 75%;" name="group_id" id="group_id" type="text" data-placeholder='-- Pilih group Value --'>
                  <option></option>
                  @foreach($lgrpvalues as $value)
                    <option value="{{$value->id}}">
                      {{$value->grpvalues}}
                    </option>
                  @endforeach
              </select>
              </div>
        </div>
     
<!--
	<div class="col-xs-12">
	  <div class="box box-danger">
	    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
	    <br>
        <div class="form-group">
          <label class="col-xs-2 control-label">Values code</label>
          <div class="col-xs-3">
            <input type="text"  id="group_values" name="group_id"   placeholder="value code" class="form-control" required/> 
          </div>   
        </div>
-->
        <div class="form-group">
          <label class="col-xs-2 control-label">values name</label>
          <div class="col-xs-3">
            <input type="text"  id="value_name" name="value_name"   placeholder="value name" class="form-control" required/> 
          </div>   
        </div>

        <div class="form-group">
          <label class="col-xs-2 control-label">value attribute 1</label>
          <div class="col-xs-3">
            <input type="text"  id="value_attribute1" name="value_attribute1"   placeholder="value name 1" class="form-control" required/> 
          </div>   
        </div>  

         <div class="form-group">
          <label class="col-xs-2 control-label">value attribute 2</label>
          <div class="col-xs-3">
            <input type="text"  id="value_attribute2" name="value_attribute2"   placeholder="value name 2" class="form-control" required/> 
          </div>   
        </div>    

         <div class="form-group">
          <label class="col-xs-2 control-label">value attribute 3</label>
          <div class="col-xs-3">
            <input type="text"  id="value_attribute3" name="value_attribute3"   placeholder="value name 3" class="form-control" required/> 
          </div>   
        </div>    

	  	<br>
	  </div>

    <!-- Box Footer -->   

      <div class="box-footer">
      		<a href="{{ route('fndvalues.index') }}" class="btn btn-warning btn-sm">Cancel</a>
            <button type="submit" class="btn btn-info pull-right" >Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
	</div>
  </div> 
</form>
@stop

 