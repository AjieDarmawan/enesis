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


            <div class="row">
            <div class="col-xs-12">
                

            <form action="{{route('settlement.cari')}}" method="POST">
                  {{ csrf_field() }}
                <div class="col-xs-3">
                    <select name="account_name" class="form-control">
                                  <option>--Pilih Distributor--</option>
                           @foreach($distributor as $value)
                                  <option value="{{$value->account_name}}">{{$value->account_name}}</option>
                           @endforeach
                   
                   </select>
                </div>
               <div class="col-xs-3">
                    <select name="executor_name" class="form-control">
                               <option>--Pilih Excekutor--</option>
                           @foreach($executor_name as $value)
                                  <option value="{{$value->executor_name}}">{{$value->executor_name}}</option>
                           @endforeach
                    </select>
                </div>
                 <div class="col-xs-3">
                    <select name="area" class="form-control">
                               <option>--Pilih Area--</option>
                           @foreach($area as $value)
                                  <option value="{{$value->area}}">{{$value->area}}</option>
                           @endforeach
                    </select>
                 </div>

                 <div class="col-xs-3">
                      <button class="btn btn-success btn-sm">Cari</button>
                 </div>



            </form>

                


            </div>
            </div>

            <br>
            <br>



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
                    <th>Varian</th>
                    <th>Area</th>
                    <th>Status</th>
                    <th>Remaning Amount </th>
                    <th>Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0 ?>
                  <?php
                    // echo "<pre>";
                    // print_r($Settle);
                    // echo "</pre>";
                   ?>
                  @foreach($Settle as $value)
                  <?php $i++ ?>
                  <tr>
                    <td> {{ $i }} </td>
                    <td> {{ ($value->eprop_no) }} </td>
                    <td>{{ ($value->description) }} </td>
                    <td> {{ ($value->executor_name) }} </td>
                    <td> {{ ($value->account_name) }} </td>
                    <td> {{ $value->activity_name }} </td>
                    <td> {{ $value->region }} </td>
                    <td> {{ ($value->brand_name) }} </td>
                    <td>{{ ($value->produk_name) }} </td>
                    <td>{{ ($value->area) }} </td>
                    <td>{{ ($value->execute_status) }}</td>
                    <td>  {{ ($value->budget_amount) }} </td>
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
