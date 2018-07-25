@extends('budget_alokasi.alokasi_str.base') 

@section('content_header')

    <h1>
        Budget Allocation
        <small>Budget Allocation For Sentralisasi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Budget</a></li>
        <li class="active">Budget Allocation</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('alokasi_str.store',['budget_det_id' => $BudgetStr->id]) }}">
  <div class="row">
  <div class="col-xs-12">
    <div class="box box-danger">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <input type="hidden" name="from_budget_id" value="{{ $from_alocate_id }}">
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>

      <br>       
        <div class="form-group">
          <label class="col-xs-2 control-label">Budget Year</label>
          <div class="col-xs-3" id="budget_year" name="budget_year" >
             {!! Form::selectYear('year', 2018, 2025) !!}
          </div>
          <label class="col-xs-2 control-label">company ID</label>
            <div class="col-xs-3">
              <select class="form-contraaol select2" style="width: 75%;" name="company_id" id="company_id" type="text">
                  <option value="{{$BudgetStr->company_id}}" selected="selected"> {{$BudgetStr->company_name}}
                  </option>
                  @foreach($lcompany as $value)
                    <option value="{{$value->id}}">
                      {{$value->company_name}}
                    </option>
                  @endforeach
              </select>
            </div>
        </div>
        <div class="col-xs-12">
        <div class="box box-danger">
          <table id="budget_dtl" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No.</th>
              <th>Brand</th>                        
              <th>Kategory Activity</th>
              <th>Region</th>
              <th>MT Account</th>
              <th>Current Budget</th>
              <th>Budget Type</th>
            </tr>
            </thead>
            <tbody>
              <?php $i = 0 ?>   
              @foreach ($BStrDetail as $value) 
              <?php $i++ ?> 
                <tr>
                  <td> {{ $i }} </td>                         
                  <td> {{ $value->brand_code }} </td>
                  <td> {{ $value->kategory_name }} </td>
                  <td> {{ $value->region}} </td>
                  <td> {{ $value->account_name }} </td>
                  <td> {{ $value->total_budget }} </td>
                  <td> {{ $value->budget_type }} </td>
                </tr>
              @endforeach  
            </tbody>
          </table>
        </div>
        </div>

        <h2>
          <small>Dialokasikan ke :</small>
        </h2>
        <div class="col-xs-12">
        <div class="box box-danger">
          <table id="budget_lok" class="table table-bordered table-striped">
            <thead>
            <tr>           
              <th>No.</th>
              <th>Brand</th>                        
              <th>Kategory Activity</th>
              <th>Region</th>
              <th>MT Account</th>
              <th>Current Budget</th>
              <th>Budget Type</th>
              <th>To Be Allocate</th>
            </tr>
            </thead>
            <tbody>
              <?php $i = 0 ?>   
              @foreach ($Bstrdtl as $value) 
              <?php $i++ ?> 
                <tr>
                  <td> {{ $i }} </td>
                  <td> {{ $value->brand_code }} </td>
                  <td> {{ $value->kategory_name }} </td>
                  <td> {{ $value->region}} </td>
                  <td> {{ $value->account_name }} </td>
                  <td> {{ $value->total_budget }} </td>
                  <td> {{ $value->budget_type }} </td>
                  <td><a href="{{ 
                  route('alokasi_str.show',$value->id, {{ $from_alocate_id }}) }}
                  " class="btn btn-success btn-sm"></a></td>
                </tr>
              @endforeach  
            </tbody>
          </table>
        </div>
        </div>

      <br>
    </div>

  </div>
  </div> 
</form>
@stop
