@extends('master.region.base') 

@section('content_header')
       <h1>
        List of Region
        <small>Daftar Region</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Region</a></li>
        <li class="active">index</li>
      </ol>
@stop

@section('content')
<section class="content">
     <div class="row">
         
        <div class="col-xs-12">
          <div>
           <a class="btn btn-primary" href="{{ route('region.create') }}">Add Region</a> 
          </div>
          <br>
          <!-- /.box -->
          <div class="box box-danger">
            <div class="col-xs-12">
            <!-- /.box-header -->
                    <div class="box-body">
                      <table id="reg" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Region Nama</th>
                            <th>Active</th>
                            <th>Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 0 ?>
                      @if (isset($KatAct))
                        @foreach($KatAct as $value)
                        <?php $i++ ?>
                        <tr>
                          <td> {{ $i }} </td>
                          <td> {{ ($value->region) }} </td>
                          <td> {{ ($value->active) }} </td>
                          <td><a href="{{ 
                          route('region.edit',$value->id) }}
                          " class="btn btn-success btn-sm">Edit</a></td>
                        </tr>
                        @endforeach
                      @endif
                    </tbody>
                <tfoot>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
</section>
@stop
  