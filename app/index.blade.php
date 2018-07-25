@extends('master.persons.base')

@section('content_header')
       <h1>

        <small>Settlement List</small>
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
              <h3 class="box-title">Settlement List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>No Proposal</th>
                    <th>Title</th>
                    <th>Excekutor</th>
                    <th>Distributor/Account/EO</th>
                    <th>Activity</th>
                    <th>Region</th>
                    <th>Brand</th>
                    <th>Varian      </th>
                    <th>Status      </th>
                    <th>Remaning Amount      </th>
                    <th>Action    </th>
                  </tr>
                </thead>
                <tbody>


                    <?php
                      // echo "<pre>";
                      // print_r($Settle);
                      // echo "</pre>";
                     $i = 0 ?>
                    @foreach($Settle as $value)
                    <?php $i++ ?>
                    <tr>
                      <td> {{ $i }} </td>
                      <td> {{ ($value->eprop_no) }} </td>
                      <td> {{ ($value->eprop_no) }} </td>
                      <td> {{ ($value->header_id) }} </td>
                      <td> {{ ($value->description) }} </td>
                      <td> {{ $value->activity_name }} </td>
                      <td> {{ $value->region }} </td>
                      <td> {{ $value->activity_name }} </td>
                      <td> {{ $value->brand_name }} </td>
                      <td> {{ $value->execute_status }} </td>
                      <td> {{ $value->budget_amount }} </td>
                      <td><a href="{{ route('settlement.edit',$value->budget_detail_id) }}" class="btn btn-success btn-sm">Settlement</a></td>
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
