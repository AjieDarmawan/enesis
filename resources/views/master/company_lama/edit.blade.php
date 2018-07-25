@extends('master.company.base') 

@section('content_header')
    <h1>
        Edit Company
        <small>Edit Company</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Edit Company</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('company.update',['id' => $EditGrp->id]) }}">
  <div class="row">

  <div class="col-xs-12">
    <div class="box box-danger">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
      <br>
        <div class="form-group">
          <label class="col-xs-2 control-label">Company Code</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $EditGrp->company_code }}" id="company_code" name="company_code" class="form-control" required/> 
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Company Name</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $EditGrp->company_name }}" id="company_name" name="company_name" class="form-control" required/> 
          </div>
        </div>

         <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
            <label>
              <!--<input type="checkbox" name="status" id="status"> Status Aktif 
              <input checked="checked" type="checkbox" name="active" id="active" value="Y" required>Active 
              -->
              <input checked="checked" type="checkbox" name="active" id="active"  value='Y' >Active 
            </label>
            </div>
          </div>
        </div>
        
      <br>
    </div>
    <!-- Box Footer -->
      <div class="box-footer">
          <a href="{{ route('home') }}" class="btn btn-info btn-sm">Home</a>
          <a href="{{ route('company.index') }}" class="btn btn-danger btn-sm">Cancel</a>
          <button type="submit" class="btn btn-info pull-right">Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
  </div>
  </div> 
</form>
@stop

 