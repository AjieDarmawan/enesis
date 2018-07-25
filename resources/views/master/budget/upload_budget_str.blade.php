@extends('budget.base') 

@section('content_header')      
    <h1>Upload Yearly Budget Excel File (.xlxs)</h1>
@stop

@section('content')

  <div class="row">
   <div class="col-xs-12">
     <div class="box box-danger">
      @if(Session::has('user_company'))
          @php $user_company = Session('user_company'); @endphp
      @endif   
	  
      <div class="box-header">
        <form role="form" action="{{ URL::to('/budget/ImportBudget') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}  
          <div class="box-body">
            <div class="form-group">
                <label for="distributor" class="col-xs-1 control-label">Company</label>
                <div class="col-xs-4">
                   <select name="company_id" id="company_id" class="form-control"> 
                      @foreach($company as $company) 
                        <option value="{{ $company->id }}" > {{ $company->company_name }} </option> 
                      @endforeach
                  </select>
                </div>
            </div>
          </div> 
            <div class="box-body">
              <div class="form-group">
                  <label for="budgetYear" class="col-xs-1 control-label">Year</label>
                  <div class="col-xs-4">
                      {{ Form::selectYear('year', $yearNow, $year5, $yearNow) }}
                  </div>
              </div>             
            </div>
            <div class="box-body">
              <div class="form-group">  
                <input type="file" name="import_file" />  
                <br> 
                <a href="{{ route('budget_str.DownloadBudgetHI') }}" class="btn btn-warning btn-sm">Download Template Budget PT. Herlina Indah</a>  
                <br>
                <br> 
                <a href="{{ route('budget_str.DownloadBudgetSEI') }}" class="btn btn-warning btn-sm">Download Template Budget PT. Sari Enesis Indah</a>  
                <br>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>                            
              </div>
            </div>
        </form> 
      </div>
     </div>
   </div>
  </div>
            
@stop
