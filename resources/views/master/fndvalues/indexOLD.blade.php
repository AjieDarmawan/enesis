@extends('master.fndvalues.base') 

@section('content_header') 
       <h1>
        List Of FND Values
        <small>Daftar FND values</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">FND values</a></li>
        <li class="active">Master FND values</li>
      </ol>  
@stop

@section('content')
<div class="row">
   <div class="col-xs-12">
     <div class="box box-danger">
   
      <div class="box-header">
         <div class="col-sm-4">
           <!--
           <a class="btn btn-primary" href="{{ route('fndvalues.create') }}">Add fnd Values</a>
            -->       
       </div>
       </div>
  
      <div class="col-xs-10">
             <div class="box-body">
              <table id="GrpVal" name="GrpVal" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>group_value</th>
                      <th>Value Name</th>
                      <th>Attribute 1</th>
                      <th>Attribute 2</th>
                      <th>Attribute 3</th>                      
                      <th>start-active-dt</th>
                      <th>end  -active-dt</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0 ?> 
                      @foreach($GrpVal as $value)
                      <?php $i++ ?>
                      <tr>
                        <td> {{ $i }} </td>
                        <td> {{ ($value->id) }} </td>  
                         <td> {{ ($value->group_value) }} </td>  
                        <td> {{ ($value->value_name) }} </td>  
                        <td> {{ ($value->value_attribute1) }} </td> 
                        <td> {{ ($value->value_attribute2) }} </td> 
                        <td> {{ ($value->value_attribute3) }} </td> 
                        <td> {{ ($value->start_active_date) }} </td> 
                        <td> {{ ($value->end_active_date) }} </td>       
                        <!--
                        <td><a href="{{ route('fndvalues.edit',$value->id) }}" class="btn btn-success btn-sm">Edit</a></td>
                        -->                      
                      </tr>
                      @endforeach                  
                  </tbody>
                </table>  
              </div>  
            </div> 
     <!--end box danger -->
     </div>
   </div>
</div>
@stop
 