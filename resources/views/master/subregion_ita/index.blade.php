@extends('master.region.base') 

@section('content_header')
       <h1>
        List of Sub Region
        <small>Daftar Sub Region</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">SubRegion</a></li>
        <li class="active">index</li>
      </ol>
@stop

@section('content')
<section class="content">
      <div class="row">
         
        <div class="col-xs-12">
          <div>
            <a class="btn btn-warning" href="{{ route('region.create') }}">Add SubRegion</a>
          </div>
          <br>
          <!-- /.box -->
          <div class="box box-danger">
            <div class="col-xs-12">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>SubRegion</th>
                    <th>Region</th>
                    <th>Action      </th>
                  </tr>
                </thead>
                <tbody>
                        <?php $i = 0 ?>
                        @foreach($SubRegion as $value)
                        <?php $i++ ?>
                        <tr>
                          <td> {{ $i }} </td>
                          <td> {{ ($value->subregion) }} </td>
                          <td> {{ ($value->region) }} </td>
                          <td><a href="{{ route('subregion.edit',$value->id) }}" class="btn btn-success btn-sm">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Nama Region</th>
                    <th>Action  </th>
                  </tr>
                </tfoot>
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
  