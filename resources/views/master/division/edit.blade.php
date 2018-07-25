@extends('master.division.base') 

@section('content_header')
    <h1>
        Edit division
        <small>Edit  division</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Edit  division</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('division.update',['id' => $EditDiv->id]) }}">
  <div class="row">

  <div class="col-xs-12">
    <div class="box box-danger">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
      <br>
        <div class="form-group">
          <label class="col-xs-2 control-label">division code</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $EditDiv->division_code }}" id="division_code" name="division_code" class="form-control" required/> 
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">division name</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $EditDiv->division_name }}" id="division_name" name="division_name" class="form-control" required/> 
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
            <a href="{{ route('division.index') }}" class="btn btn-danger btn-sm">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
  </div>
  </div> 
</form>
@stop

 