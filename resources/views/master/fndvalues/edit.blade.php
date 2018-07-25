@extends('layouts.base') 

@section('content_header')
	  <h1>
        Add New Fnd Group
        <small>edit Fnd Group</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">master</a></li>
        <li class="active">edit Fnd Group</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('fndvalues.update',['id' => $Editgrp->id]) }}">
  <div class="row">

	<div class="col-xs-12">
	  <div class="box box-danger">
	    <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
	    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
	    <br>
        <div class="form-group">
          <label class="col-xs-2 control-label">group code</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $Editgrp->group_id}}" 
                id="group_id" name="group_id"   placeholder="fnd value code" class="form-control" required disabled="disabled"/> 
          </div>   
        </div>  

        <div class="form-group">
          <label class="col-xs-2 control-label">group name</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $Editgrp->value_name}}" 
                id="value_name" name="value_name"   placeholder="Value name" class="form-control" required/> 
          </div>   
        </div>
  
        <div class="form-group">
          <label class="col-xs-2 control-label">group name singkat</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $Editgrp->value_attribute1}}" 
                id="value_attribute1" name="value_attribute1"   placeholder="group name1" class="form-control" required/> 
          </div>   
        </div>

             <div class="form-group">
          <label class="col-xs-2 control-label">group name singkat 1</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $Editgrp->value_attribute2}}" 
                id="value_attribute2" name="value_attribute2"   placeholder="group name2" class="form-control" required/> 
          </div>   
        </div>

             <div class="form-group">
          <label class="col-xs-2 control-label">group name singkat</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $Editgrp->value_attribute3}}" 
                id="value_attribute3" name="value_attribute3"   placeholder="group name3" class="form-control" required/> 
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

 