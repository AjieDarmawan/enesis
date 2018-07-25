@extends('master.kategory_activity.base') 

@section('content_header')
	  <h1>
        Add New Kategory Activity
        <small>Tambah Kategory Activity</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Create Kategory Activity</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('kategory_activity.store') }}">
  <div class="row">

	<div class="col-xs-12">
	  <div class="box box-danger">
	    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
	    <br>
       <div class="form-group">
        <label class="col-xs-2 control-label">Group id</label>
          <div class="col-xs-6">
            <select class="form-control select2" style="width: 75%;" name="group_id" id="group_id" type="text">
                <option value = ""> </option>
                @foreach($lgroupid as $value)
                  <option value="{{$value->id}}">
                    {{$value->group_name}}
                  </option>
                @endforeach
            </select>
            </div>
          </div> 
         <div class="form-group">
            <label class="col-xs-2 control-label">Kategory name</label>
            <div class="col-xs-3">
              <input type="text"  id="kategory_name" name="kategory_name"   placeholder="Kategory_name" class="form-control" required/> 
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
		  <!-- Box Footer -->
      <div class="box-footer">
        <a href="{{ route('home') }}" class="btn btn-info btn-sm">Home</a>
      		<a href="{{ route('kategory_activity.index') }}" class="btn btn-danger btn-sm">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
      </div> 
     </div>
	</div>
  </div> 
</form>
@stop

 