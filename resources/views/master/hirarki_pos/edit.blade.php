@extends('master.hirarki_pos.base') 

@section('content_header')
    <h1>
        Edit Hirarki Pos Limit
        <small>Edit Hirarki Pos Limit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Edit Hirarki Pos Limit</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('hirarki_pos.update',['id' => $EditKat->id]) }}">
  <div class="row">

  <div class="col-xs-12">
    <div class="box box-danger">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
      <br>
       <div class="form-group">
        <label class="col-xs-2 control-label">Position id</label>
          <div class="col-xs-6">
            <select class="form-control select2" style="width: 75%;" name="position_id" id="position_id" type="text">
                <option value = ""> </option>
                @foreach($lposition as $value)
                  <option value="{{$value->id}}">
                    {{$value->position_name}}
                  </option>
                @endforeach
            </select>
            </div>
          </div> 
          <div class="form-group">
        <label class="col-xs-2 control-label">Division id</label>
          <div class="col-xs-6">
            <select class="form-control select2" style="width: 75%;" name="division_id" id="division_id" type="text">
                <option value = ""> </option>
                @foreach($ldivision as $value)
                  <option value="{{$value->id}}">
                    {{$value->division_name}}
                  </option>
                @endforeach
            </select>
            </div>
          </div> 
        <div class="form-group">
        <label class="col-xs-2 control-label">Group Limit Id</label>
          <div class="col-xs-6">
            <select class="form-control select2" style="width: 75%;" name="group_limit_id" id="group_limit_id" type="text">
                <option value = ""> </option>
                @foreach($lgrouplimit as $value)
                  <option value="{{$value->id}}">
                    {{$value->description}}
                  </option>
                @endforeach
            </select>
            </div>
          </div> 
          <div class="form-group">
            <label class="col-xs-2 control-label">Description</label>
            <div class="col-xs-3">
              <input type="text"  id="description" name="description"   placeholder="description" class="form-control" required/> 
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
                <a href="{{ route('hirarki_pos.index') }}" class="btn btn-danger btn-sm">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
  </div>
  </div> 
</form>
@stop

 