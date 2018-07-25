@extends('master.batal_eprop.base') 

@section('content_header')
       <h1>
        Batal/Cancel Proposal
       </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
@stop

@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <br>
          <!-- /.box -->
          <div class="box box-danger">
            <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="batal" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Batal Detail Id</th>
                    <th>E Prop Number</th>
                    <th>Header id</th>
                    <th>Description</th>
                    <th>Activity Name</th>                        
                    <th>Area id</th>
                    <th>Area Name</th>    
                    <th>Person Name</th>    
                    <th>Cancelled</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 0 ?>
                    @foreach($Batal as $value)
                    <?php $i++ ?>
                    <tr>
                      <td> {{ $i }} </td>
                      <td> {{ ($value->budget_detail_id) }} </td>
                      <td> {{ ($value->eprop_no) }} </td>
                      <td> {{ ($value->header_id) }} </td>
                      <td> {{ ($value->description) }} </td>
                      <td> {{ $value->activity_name }} </td>
                      <td> {{ $value->area_id }} </td>
                      <td> {{ $value->area }} </td>
                      <td> {{ $value->person_name }} </td>
                      <td><a href="{{ route('batal_eprop.edit',$value->budget_detail_id) }}" class="btn btn-success btn-sm">Cancelled</a></td>
                      </tr>
                    @endforeach
                    </tbody>
                 </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
 <!---Preview Settlement
  <div class="box box-danger">
            <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="batal" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <td>Batal Detail Id</td>
                    <th>E Prop Number</th>
                    <th>Area id</th>                  
                    <th>Area Name</th>
                    <th>Status</th>
                    <th>Alasan Batal</th>                    
                   </tr>
                </thead>
                <tbody>
                    <?php $i = 0 ?>
                    @foreach($Batal1 as $value)
                    <?php $i++ ?>
                    <tr>
                      <td> {{ $i }} </td>
                      <td> {{ ($value->budget_detail_id) }} </td>
                      <td> {{ ($value->eprop_no) }} </td>  
                      <td> {{ ($value->area_id) }} </td>                 
                      <td> {{ ($value->area) }} </td>
                      <td> {{ ($value->status) }} </td>
                      <td> {{ ($value->reason) }} </td>
                    </tr>
                    @endforeach
                    </tbody>
                 </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>         
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>
@stop
  