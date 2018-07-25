@extends('master.group_hirarki_limit.base') 

@section('content_header')
    <h1>
        Add New Group Hirarki Limit
        <small>Tambah Group Hirarki Limit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Create Group Hirarki Limit</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('group_hirarki_limit.store') }}">
  <div class="row">

  <div class="col-xs-12">
    <div class="box box-danger">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
      <br>
        <div class="form-group">
          <label class="col-xs-2 control-label">Description</label>
          <div class="col-xs-3">
            <input type="text"  id="description" name="description"   placeholder="description" class="form-control" required/> 
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Amount From</label>
          <div class="col-xs-3">
            <input type="text"  id="amount_from" name="amount_from"   placeholder="amount_from" class="form-control" required/>
          </div>   
        </div>
           <div class="form-group">
          <label class="col-xs-2 control-label">Amount To</label>
          <div class="col-xs-3">
            <input type="text"  id="amount_to" name="amount_to"   placeholder="amount_to" class="form-control" required/> 
          </div>   
        </div>
          <!-- Box Footer -->
      <div class="box-footer">
          <a href="{{ route('group_hirarki_limit.index') }}" class="btn btn-danger btn-sm">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
  </div>
  </div> 
</form>
@stop

 