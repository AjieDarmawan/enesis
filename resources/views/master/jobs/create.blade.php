@extends('master.jobs.base') 

@section('content_header')
    <h1>
        Add New Jobs
        <small>Tambah Jobs</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Create Jobs</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('jobs.store') }}">
  <div class="row">

  <div class="col-xs-12">
    <div class="box box-danger">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
      <br>
        <div class="form-group">
          <label class="col-xs-2 control-label">Job code</label>
          <div class="col-xs-3">
            <input type="text"  id="job_code" name="job_code"   placeholder="job_code" class="form-control" required/> 
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Job Description</label>
          <div class="col-xs-3">
            <input type="text"  id="job_description" name="job_description"   placeholder="job_description" class="form-control" required/> 
          </div>   
        </div>
       <div class="form-group">
        <label class="col-xs-2 control-label">Job Brand</label>
          <div class="col-xs-6">
            <select class="form-control select2" style="width: 75%;" name="job_brand" id="job_brand" type="text">
                <option value = ""> </option>
                @foreach($lbrand as $value)
                  <option value="{{$value->brand_code}}">
                    {{$value->brand_name}}
                  </option>
                @endforeach
            </select>
            </div>
          </div> 
        <div class="form-group">
        <label class="col-xs-2 control-label">Job Type</label>
          <div class="col-xs-6">
            <select class="form-control select2" style="width: 75%;" name="job_type" id="job_type" type="text">
                <option value = ""> </option>
                @foreach($ljobtype as $value)
                  <option value="{{$value->value_name}}">
                    {{$value->value_name}}
                  </option>
                @endforeach
            </select>
            </div>
          </div> 
       <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
              <label>
                <input checked="checked" type="checkbox" name="active" id="active" value="Y" required>Active
              </label>
              </div>
            </div>
          </div>
      <br>
    </div>
    <!-- Box Footer -->
      <div class="box-footer">
          <a href="{{ route('jobs.index') }}" class="btn btn-danger btn-sm">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
  </div>
  </div> 
</form>
@stop

 