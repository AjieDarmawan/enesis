@extends('master.budget_dstr.base') 

@section('content_header')
	  <h1>
        Add New Budget Dsentral
        <small>Tambah Budget ASDH </small>
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
          <label class="col-xs-2 control-label">Budget-Misc code</label>
          <div class="col-xs-8">
            <input type="text"  id="budget_dst_id" name="budget_dst_id"   placeholder="budget_dst_id" class="form-control" required/> 
          </div>   
        </div>
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
              </div>
          </div>

       <div class="form-group">
          <label class="col-xs-2 control-label">SubRegion</label>
            <div class="col-xs-8">
              <select class="form-control select2" multiple="multiple" style="width: 75%;" name="subregion_id[]" id="subregion_id" data-placeholder='-- Pilih SubRegion --' type="text">
                  <option></option>
                  @foreach($lsubregion as $value)
                    <option value="{{$value->id}}">
                      {{$value->subregion}}
                    </option>
                  @endforeach
              </select>            
              </div>
            </div>
          <div class="form-group">
          <label class="col-xs-2 control-label">Area</label>
            <div class="col-xs-8">
              <select class="form-control select2" multiple="multiple" style="width: 75%;" name="area_id[]" id="area_id" data-placeholder='-- Pilih Area--' type="text">
                  <option></option>
                  @foreach($larea as $value)
                    <option value="{{$value->id}}">
                      {{$value->area}}
                    </option>
                  @endforeach
              </select> 
              </div>
          </div>

         <div class="form-group">
          <label class="col-xs-2 control-label">Asdh</label>
            <div class="col-xs-8">
              <select class="form-control select2" multiple="multiple" style="width: 75%;" name="asdh_id[]" id="asdh_id" data-placeholder='-- Pilih Asdh--' type="text">
                  <option></option>
                  @foreach($lasdh as $value)
                    <option value="{{$value->person_id}}">
                      {{$value->name}}
                    </option>
                  @endforeach
              </select>             
              </div>
        </div>

         <div class="form-group">
            <label class="col-xs-2 control-label">year</label>
            <div class="col-xs-8"> 
                      {!! Form::selectYear('year',2018,2025) !!}                   
            </div>             
          </div>
          
          <div class="form-group">
            <label class="col-xs-2 control-label">month</label>
            <div class="col-xs-8"> 
                      {!! Form::selectMonth('month') !!}                     
              </div>             
          </div>

         <div class="form-group">
          <label class="col-xs-2 control-label">Amount/month</label>
          <div class="col-xs-8">
            <input type="text"  id="budget_amount" name="budget_amount"   placeholder="Amount" class="form-control" required/> 
          </div>   
        </div> 
	  	<br>
	  </div>

	  <!-- Box Footer -->
      <div class="box-footer">
      		<a href="{{ route('budget_dstr.index') }}" class="btn btn-danger btn-sm">Cancel</a>
              <button type="submit" class="btn btn-info pull-right">Submit</button>  
         <!-- <button type="submit" class="btn btn-info pull-right"  href="{{ url('budget_dstr') }}">Submit</button>    -->
      </div>
      <!-- End Of Box Footer --> 
	</div>
  </div> 
</form>
@stop

 