@extends('master.persons.base')

@section('content_header')
       <h1>

        <small>Done Form</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Person</a></li>
        <li class="active">index</li>
      </ol>
@stop

@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Done Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>No Proposal</th>
                    <th>No Reco</th>
                    <th>Title</th>
                    <th>Area</th>
                    <th>Activity</th>

                    <th>Brand</th>
                    <th>Varian</th>
                    <th>Status</th>
                    <th>Period Proposal </th>
                    <th>Target </th>
                    <th>Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0 ?>
                  <?php
                    // echo "<pre>";
                    // print_r($budget);
                    // echo "</pre>";
                   ?>
                   <?php $i = 0 ?>
                   <?php
                     // echo "<pre>";
                     // print_r($Settle);
                     // echo "</pre>";
                    ?>
                   @foreach($budget as $value)
                   <?php $i++ ?>
                   <tr>
                     <td> {{ $i }} </td>
                     <td> {{ ($value->eprop_no) }} </td>
                     <td>{{ ($value->reco_no) }} </td>
                      <td> {{ ($value->description) }}  </td>
                     <td> {{ ($value->area) }} </td>
                     <td> {{ $value->activity_name }} </td>
                     <td> {{ $value->brand_name }} </td>
                     <td> {{ ($value->produk_name) }} </td>
                     <td> </td>
                     <td>{{$value->start_date}} S/d {{$value->end_date}}</td>
                     <td>   </td>
                     <td><a href="{{ route('done_form.edit',$value->budget_detail_id) }}" class="btn btn-success btn-sm">Input Actual</a></td>
                     </tr>
                   @endforeach

                    </tbody>

              </table>
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
