@extends('master.budget_dstr.base') 

@section('content_header')
	  <h1>
        Edit Budget Desentralisasi
        <small>Perubahan Budget Desentralisasi </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Budget</a></li>
        <li class="active">Create</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ url('/budget_dstr/update/'.$persons->person_id) }}"> 
  <input type="hidden" name="_method" value="PUT">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <div class="row">  
	<div class="col-xs-12">
	  <div class="box box-danger">
	    <!-- <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div> -->
	    <br>          
        <div class="form-group">
          <label class="col-xs-2 control-label">Region</label>
            <div class="col-xs-8">
              <select class="form-control select2" multiple="multiple" style="width: 75%;" name="region_id[]" id="region_id" type="text">
                  <option value = "">  -- Pilih Region -- </option>
                  @foreach($lregion as $value)
                    <option value="{{$value->reg_id}}" {{ ( $value->selected == "Y" ) ? ' selected' : '' }}>
                      {{$value->region_name}}
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
                  @foreach($lsubregion as $value)
                    <option value="{{$value->subreg_id}}" {{ ( $value->selected == "Y" ) ? ' selected' : '' }}>
                      {{$value->subregion_name}}
                    </option>
                  @endforeach
              </select> 
              <input type="checkbox" id="allsubregion" >Select All Subregion </input>
              </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Coverage Area</label>
            <div class="col-xs-8">
              <select class="form-control select2" multiple="multiple" data-placeholder='-- Coverage Area --' style="width: 75%;" name="area_id[]" id="area_id" type="text">
                  @foreach($larea as $value)
                    <option value="{{$value->id_area}}" {{ ( $value->selected == "Y" ) ? ' selected' : '' }}>
                      {{$value->area_name}}
                    </option>
                  @endforeach
              </select>
              <input type="checkbox" id="allarea" >Select All Coverage Area </input>
              </div>
        </div>
          <div class="form-group">
          <label class="col-xs-2 control-label">Asdh</label>
            <div class="col-xs-8">
              <select class="form-control select2" multiple="multiple" data-placeholder='-- Asdh --' style="width: 75%;" name="asdh_id[]" id="asdh_id" type="text">
                  @foreach($lasdh as $value)
                    <option value="{{$value->id_area}}" {{ ( $value->selected == "Y" ) ? ' selected' : '' }}>
                      {{$value->area_name}}
                    </option>
                  @endforeach
              </select>
              <input type="checkbox" id="allarea" >Select All Coverage Area </input>
              </div>
        </div>
         <div class="form-group">
          <label class="col-xs-2 control-label">Budget ID</label>
          <div class="col-xs-6"> 
              <input type="text"  id="budget_dst_id" name="budget_dst_id"  value= "{{ $persons->budget_dst_id}}"  class="form-control" required /> 
          </div>   
        </div>
          <div class="form-group">
          <label class="col-xs-2 control-label">Amount</label>
          <div class="col-xs-6"> 
              <input type="text"  id="budget_amount" name="budget_amount"  value= "{{ $persons->budget_amount}}"  class="form-control" required /> 
          </div>   
        </div>
	  	<br>
	  </div>
	  <!-- Box Footer -->
      <div class="box-footer">
      		<a href="{{ url('budget_dstr') }}" class="btn btn-warning btn-sm">Cancel</a>
            <button type="submit" class="btn btn-info pull-right"  href="{{ route('budget_dstr.update',['person'=>$persons->id])}}"  }}">Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
	</div>
  </div> 
</form>
@stop

 