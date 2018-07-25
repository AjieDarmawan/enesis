@extends('master.budget_dstr.base') 

@section('content_header')
	  <h1>
        Add New Budget Desentral
        <small>Tambah Budget </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Budget</a></li>
        <li class="active">Create</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('budget_dstr.store') }}">
  <div class="row">

	<div class="col-xs-12">
	  <div class="box box-danger">
	    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
	    <br>      
        <div class="form-group">
          <label class="col-xs-2 control-label">Region</label>
            <div class="col-xs-8">
              <select class="form-control select2" multiple="multiple" style="width: 75%;" name="region_id[]" id="region_id" data-placeholder='-- Pilih Region --' type="text">
                  <option></option>
                  @foreach($lregion as $value)
                    <option value="{{$value->id}}">
                      {{$value->region}}
                    </option>
                  @endforeach
              </select> 
              <input type="checkbox" id="allregion" >Select All Region
              </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Sub Region</label>
            <div class="col-xs-8">
              <select class="form-control select2" multiple="multiple" data-placeholder='-- Pilih Sub Region --' style="width: 75%;" name="subregion_id[]" id="subregion_id" type="text">
              </select> 
              <input type="checkbox" id="allsubregion" >Select All Subregion
            </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Coverage Area</label>
            <div class="col-xs-8">
              <select class="form-control select2" multiple="multiple" data-placeholder='-- Coverage Area --' style="width: 75%;" name="area_id[]" id="area_id" type="text">
              </select>
              <input type="checkbox" id="allarea" >Select All Coverage Area
              </div>
        </div>
          <div class="form-group">
          <label class="col-xs-2 control-label">ASDH</label>
            <div class="col-xs-8">
              <select class="form-control select2" multiple="multiple" data-placeholder='-- Asdh --' style="width: 75%;" name="asdh_id[]" id="asdh_id" type="text">
              </select>
              <input type="checkbox" id="allasdh" >Select All ASDH
              </div>
        </div>
         <div class="form-group">
          <label class="col-xs-2 control-label">Budget</label>
          <div class="col-xs-3">
            <input type="text"  id="budget_amount" name="budget_amount"   placeholder="Budget Amount" class="form-control" required/> 
          </div>   
        </div>     

	  	<br>
	  </div>
	  <!-- Box Footer -->
      <div class="box-footer">
      		<a href="{{ url('budget_dstr') }}" class="btn btn-warning btn-sm">Cancel</a>
            <button type="submit" class="btn btn-info pull-right"  href="{{ url('budget_dstr') }}">Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
	</div>
  </div> 
</form>
@stop

 