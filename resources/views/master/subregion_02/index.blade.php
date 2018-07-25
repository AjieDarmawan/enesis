@extends('master.subregion.base') 

@section('content_header')
       <h1>
        List of Sub Region
        <small>Daftar Sub Region</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sub Region</a></li>
        <li class="active">index</li>
      </ol>
@stop

@section('content')
<div class="row">
   <div class="col-xs-12">
     <div class="box box-danger">
      <div class="box-header">
         <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('subregion.create') }}">Add Sub Region</a>
       </div>
     </div>
      <div class="col-xs-10">
             <div class="box-body">
              <table id="SubReg" name = "SubReg" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Id Region</th>
                      <th>Sub Region</th>
                      <th>Active</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0 ?>
                      @if (isset($SubReg))
                        @foreach($SubReg as $value)
                        <?php $i++ ?>
                        <tr>
                          <td> {{ $i }} </td>
                          <td> {{ ($value->id_region) }} </td>
                          <td> {{ ($value->subregion) }} </td>
                          <td> {{ ($value->active) }} </td>
                          <td><a href="{{ 
                          route('subregion.edit',$value->id) }}
                          " class="btn btn-success btn-sm">Edit</a></td>
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
 