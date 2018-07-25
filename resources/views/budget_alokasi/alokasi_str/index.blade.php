@extends('budget.alokasi_str.base') 

@section('content_header') 
	  <h1>
        MASTER BUDGET
        <small>Daftar Budget</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Budget</a></li>
        <li class="active">Master Budget</li>
      </ol>  
@stop

@section('content')
<div id="example2_wrapper" class="fluid-container">
  <div class="row">
     <div class="col-xs-12">
       <div class="box box-danger">
       	<div class="col-xs-12">
               <div class="box-body">
              	<table class="table table-bordered table-striped" id="budget_dtl" name="budget_dtl">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Budget Year</th>
                        <th>Company</th>
                        <th>Brand</th>                        
                        <th>Kategory Activity</th>
                        <th>Region</th>
                        <th>MT Account</th>
                        <th>Budget Amount</th>
                        <th>Total Budget</th>
                        <th>Action      </th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0 ?>
                        @foreach($BudgetDtlv as $value)
                        <?php $i++ ?>
                        <tr>
                          <td> {{ $i }} </td>
                          <td> {{ ($value->budget_year) }} </td>
                          <td> {{ ($value->company_name) }} </td>                          
                          <td> {{ ($value->brand_code) }} </td>
                          <td> {{ $value->cat_acttvity_id }} </td>
                          <td> {{ $value->region}} </td>
                          <td> {{ $value->account_name }} </td>
                          <td> {{ $value->budget_amount }} </td>
                          <td> {{ $value->total_budget }} </td>
                          <td><a href="{{ 
                          route('alokasi_str.edit',$value->id) }}
                          " class="btn btn-success btn-sm">Alocate To</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div> 
       <!--end box danger -->
       </div>
     </div>
  </div>
</div>
@stop
  