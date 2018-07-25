@extends('master.settlement.base')

@section('content_header')
    <h1>
        Create Settlement
        <ol class="breadcrumb">
        </ol>
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('settlement.store') }}">
  <div class="row">
  <div class="col-xs-12">
    <div class="box box-danger">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
      <br>
       <div class="form-group">
          <label class="col-xs-2 control-label">Budget Detail id:</label>
          <div class="col-xs-3">
            <input type="text"  id="budget_detail_id" name="budget_detail_id"   placeholder="budget_detail_id" class="form-control" />
          </div>
        </div>
       <div class="form-group">
          <label class="col-xs-2 control-label">E Prop No:</label>
          <div class="col-xs-3">
            <input type="text"  id="eprop_id" name="eprop_id"   placeholder="eprop_id" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Budget Amount Rp:</label>
          <div class="col-xs-3">
            <input type="text"  id="budget_amount" name="budget_amount"   placeholder="budget_amount" class="form-control" />
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
            <div class="col-xs-6">
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
        <br>

      <!-- Box Footer -->
      <div class="box-footer">
            <a href="{{ route('settlement.index') }}" class="btn btn-danger btn-sm">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
      </div>


      <!-- End Of Box Footer -->
      </div>
     </div>
  </div>
  </div>
</form>
@stop
