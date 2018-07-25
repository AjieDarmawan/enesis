@extends('layouts.base') 

@section('content_header')      
    <h1>Upload Confirm Monthly Order (CMO) Excel File (.xlxs)</h1>
@stop

@section('content')

  <div class="row">
   <div class="col-xs-12">
     <div class="box box-danger">
      @if(Session::has('user_info'))
          @php $customer_info = Session('customer_info'); @endphp
      @endif   
      <div class="box-header">
        <form role="form" action="{{ URL::to('importExcel') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}  
          <div class="box-body">
            <div class="form-group">
                <label for="distributor" class="col-xs-1 control-label">Distributor</label>
                <div class="col-xs-4">
                   <select name="disti" class="form-control"> 
                      @foreach($customer_info as $cust) 
                        <option value="{{ $cust->cust_ship_id }}" > {{ $cust->customer_ship_name }} </option> 
                      @endforeach
                  </select>
                </div>
            </div> 
            </div> 
            <div class="box-body">
              <div class="form-group">  
                <input type="file" name="import_file" />  
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
