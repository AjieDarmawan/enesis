@extends('master.budget_dstr.base') 

@section('content_header') 
       <h1>
        List Of Budget Desentralisasi ASDH </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">asdh</a></li>
        <li class="active">Master Budget Dstr ASDH</li>
      </ol>  
@stop

@section('content')
<div class="row">
   <div class="col-xs-12">
     <div class="box box-danger">
      <div class="box-header">
         <div class="col-sm-4">
           <a class="btn btn-primary" href="{{ route('budget_dstr.create') }}">Add budget Dsentral</a>
       </div>
     </div>
      <div class="col-xs-10">
             <div class="box-body">
              <table id="budget_dstr" name = "budget_dstr" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>No.</th>
                    <th>Budget ID</th>  
                    <th>Area</th>                   
                    <th>Asdh</th>    
                    <th>Month</th>  
                    <th>Year</th>                       
                    <th>Budget-amount</th>    
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0 ?>
                      @if (isset($budget_dstr))
                        @foreach($budget_dstr as $value)
                        <?php $i++ ?>
                        <tr>
                          <td> {{ $i }} </td>
                          <td> {{ ($value->budget_dst_id) }} </td>                      
                          <td> {{ ($value->area) }} </td>
                          <td> {{ ($value->name) }} </td>
                          <td> {{ ($value->month) }} </td>
                          <td> {{ ($value->year) }} </td>
                          <td> {{ ($value->budget_amount) }} </td> 
                         </tr>
                        @endforeach
                      @endif
                  </tbody>
                </table>  
              </div>  
            </div> 
     <!--end box danger -->
     </div>
   </div>
</div>
@stop
 