@extends('master.settlement.base') 

@section('content_header')
    <h1>
        Create Settlement
       </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('settlement.update',['budget_detail_id' => $Settle->budget_detail_id]) }}">
  <div class="row">

  <div class="col-xs-12">
    <div class="box box-danger">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
      <br>
         
        <div class="form-group">
          <label class="col-xs-2 control-label">E Prop No</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $Settle->eprop_no}}" id="eprop_no" name="eprop_no" class="form-control" readonly="" /> 
          </div>
        </div>
       <div class="form-group">
          <label class="col-xs-2 control-label">Budget Amount Rp:</label>
          <div class="col-xs-3">
            <input type="text" value="{{ $Settle->budget_amount }}" id="budget_amount" name="budget_amount" class="form-control" readonly="" /> 
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Actual Amount Rp:</label>
          <div class="col-xs-3">
            <input type="text"  id="actual_amount" name="actual_amount"   placeholder="actual_amount" class="form-control" /> 
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Payment type</label>
            <div class="col-xs-4">
              <select class="form-control select2" style="width: 75%;" name="status" id="status" type="text" data-placeholder='-- Pilih Payment type --'>
                  <option></option>
                  @foreach($ltypeproduct as $value)
                    <option value="{{$value->value_name}}">
                      {{$value->value_name}}
                    </option>
                  @endforeach
              </select>
            </div>
        </div>
       <div class="form-group">
          <div class="col-xs-3">
            <input type="hidden" value="{{ $Settle->budget_detail_id }}" id="budget_detail_id" name="budget_detail_id" class="form-control" 
             /> 
          </div>
        </div>
          <div class="form-group">
           <div class="col-xs-3">
            <input type="hidden" value="{{ $Settle->header_id}}" id="header_id" name="header_id" class="form-control" /> 
          </div>
        </div>
       <br>
    </div> 
    <!-- Box Footer -->
      <div class="box-footer">
          <a href="{{ route('settlement.index') }}" class="btn btn-danger btn-sm">Cancel</a>
          <button type="submit" class="btn btn-info pull-right">Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
  </div>
  </div> 
</form>
@stop

 