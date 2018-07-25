@extends('budget_alokasi.alokasi_str.base') 

@section('content_header')

    <h1>
        Budget To Be Allocation
        <small>Budget To Be Allocation</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Budget</a></li>
        <li class="active">Budget Allocation</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('alokasi_str.store',['tobudget_det_id' => $BudgetStrAl->id]) }}">
  <div class="row">
  <div class="col-xs-12">
    <div class="box box-danger">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <input type="hidden" name="from_budget_id" value="{{ $from_alocate_id }}">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
      <br>
        <div class="form-group">
          <label class="col-xs-2 control-label">Date</label>
          <div class="col-xs-3">
            <input type="date" id="allocation_date" name="allocation_date"   placeholder="Allocation Date" class="form-control" required/>                           
          </div>
          <label class="col-xs-2 control-label">company ID</label>
            <div class="col-xs-3">
              <select class="form-contraaol select2" style="width: 75%;" name="company_id" id="company_id" type="text">
                  <option value="{{$BudgetStrAl->company_id}}" selected="selected"> {{$BudgetStrAl->company_name}}
                  </option>
                  @foreach($lcompany as $value)
                    <option value="{{$value->id}}">
                      {{$value->company_name}}
                    </option>
                  @endforeach
              </select>
            </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Budget Year</label>
            <div class="col-xs-3" id="budget_year" name="budget_year" >
               {!! Form::selectYear('year', 2018, 2025) !!}
            </div>
        </div>
        <div class="col-xs-12">
        <div class="box box-danger">

          <div class="form-group">
            <label class="col-xs-2 control-label">Brand</label>
            <div class="col-xs-3">
              <input type="text"  id="brand_code" name="brand_code" value="{{ $BudgetStrAl->brand_code }}" class="form-control" required disabled="disabled" /> 
            </div>
            <label class="col-xs-2 control-label">type Budget</label>
            <div class="col-xs-3">
              <input type="text"  id="to_allocation_type" name="to_allocation_type" value="{{ $BudgetStrAl->budget_type }}" class="form-control" required disabled="disabled" /> 
            </div>            
          </div>

          <div class="form-group">
            <label class="col-xs-2 control-label">Kategory Activity</label>
            <div class="col-xs-3">
              <input type="text"  id="kategory_name" name="kategory_name" value="{{ $BudgetStrAl->kategory_name }}" class="form-control" required disabled="disabled" /> 
            </div>
            <label class="col-xs-2 control-label">MT Account</label>
            <div class="col-xs-3">
              <input type="text"  id="account_name" name="account_name"   value="{{ $BudgetStrAl->account_name }}" class="form-control" required disabled="disabled"/> 
            </div>   
          </div>

          <div class="form-group">
            <label class="col-xs-2 control-label">Region</label>
            <div class="col-xs-3">
              <input type="text"  id="to_region" name="to_region"   value="{{ $BudgetStrAl->region }}" class="form-control" required disabled="disabled"/> 
            </div>
          </div>

          <div class="form-group">
            <label class="col-xs-2 control-label">To Be Allocated</label>
            <div class="col-xs-3"> 
                <input type="number"  id="allocation" name="allocation" placeholder="Input Jumlah yang akan di alokasi" class="form-control" required /> 
            </div>
            <label class="col-xs-2 control-label">To Budget Id</label>
            <div class="col-xs-3">
              <input type="text"  id="tobudget_det_id" name="tobudget_det_id" value="{{ $BudgetStrAl->budget_det_id }}" class="form-control" required disabled="disabled" /> 
            </div>            
          </div>
          <div class="form-group">
            <label class="col-xs-2 control-label">End Budget</label>
            <div class="col-xs-3">
              <input type="number"  id="total_budget" name="total_budget"   value="{{ $BudgetStrAl->total_budget }}" class="form-control" required disabled="disabled"/>
            </div>

            <label class="col-xs-2 control-label">After Allocation</label>
            <div class="col-xs-3"> 
                <input type="number"  id="ending_budget" name="ending_budget" class="form-control" required disabled="disabled"/> 
            </div>   
          </div>
        </div>
        </div>        
      <br>
    </div>
  
    <!-- Box Footer -->
      <div class="box-footer">
          <a href="{{ route('alokasi_str.index') }}" class="btn btn-danger btn-sm">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
  </div>
  </div> 
</form>
@stop
