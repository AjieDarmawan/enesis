@extends('master.group_hirarki_limit.base') 

@section('content_header')
    <h1>
        Edit Group Hirarki Limit
        <small>Edit Group Hirarki Limit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Edit Group Hirarki Limit</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('group_hirarki_limit.update',['id' => $EditGrp->id]) }}">
  <div class="row">

  <div class="col-xs-12">
    <div class="box box-danger">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
      <br>
        <div class="form-group">
          <label class="col-xs-2 control-label">Group Name</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $EditGrp->description }}" id="description" name="description" class="form-control" required/> 
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
         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
              <label>
                <input checked="checked" type="checkbox" name="active" id="active"> Active
              </label>
              </div>
            </div>
          </div>
      <br>
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

 