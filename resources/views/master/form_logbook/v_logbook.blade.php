@extends('master.persons.base')

@section('content_header')
       <h1>

        <small>Form Done</small>
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
                        @if(session('message'))
                                  <div class='alert alert-success'>
                                          {{session('message')}}
                                  </div>
                          @endif
              <h3 class="box-title">Form Logbook</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              

        <div class="row">
          <form class="" method="POST" action="{{route('logbook.cari')}}">
              {{ csrf_field() }}
           

              <?php
                  // echo "<pre>";
                  // print_r($logbook);
                  // echo "</pre>";
              ?>
           
           <div class="col-md-6">
             <div class="form-group">
               <label>Periode</label>
                   <input type="text"  id="eprop_date" name="Periode"  class="form-control">
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Company</label>
                    <select class="form-control" name="company_name">
                      <option value="">--Pilih Company--</option>
                      @foreach($company_name as $c)
                        <option value="{{$c->company_name}}">{{$c->company_name}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
           </div>
           <!-- /.col -->
           <div class="col-md-6">
             <div class="form-group">
               <label>Devision</label>
                <select class="form-control" name="division">
                      <option value="">--Pilih Division--</option>
                      @foreach($division as $c)
                        <option value="{{$c->division}}">{{$c->division}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Region</label>
                   <select class="form-control" name="region">
                      <option value="">--Pilih region--</option>
                      @foreach($region as $c)
                        <option value="{{$c->region}}">{{$c->region}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
           </div>
           <!-- /.col -->

           <div class="col-md-6">
             <div class="form-group">
               <label>Market Type</label>
                  
                   <select class="form-control" name="type_market_code">
                      <option value="">--Market Type-</option>
                      @foreach($type_market_code as $c)
                        <option value="{{$c->type_market_code}}">{{$c->type_market_code}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Distributor</label>
                  <select class="form-control" name="account">
                      <option value="">--Pilih Distributor--</option>
                      @foreach($company as $c)
                        <option value="{{$c->account}}">{{$c->account}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
           </div>


           <div class="col-md-6">
             <div class="form-group">
               <label>Account</label>
                   <select class="form-control" name="account">
                      <option value="">--Pilih Account--</option>
                      @foreach($company as $c)
                        <option value="{{$c->account}}">{{$c->account}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Branch</label>
               <select class="form-control" name="branch">
                      <option value="">--Pilih branch--</option>
                      @foreach($branch as $c)
                        <option value="{{$c->branch}}">{{$c->branch}}</option>
                      @endforeach

                  </select>
             </div>
             <!-- /.form-group -->
           </div>

           <div class="col-md-6">
             <div class="form-group">
               <label>Brand</label>
                   <select class="form-control" name="brand">
                      <option value="">--Pilih brand--</option>
                      @foreach($brand as $c)
                        <option value="{{$c->brand}}">{{$c->brand}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Varian</label>
                   <select class="form-control" name="varian">
                      <option value="">--Pilih varian--</option>
                      @foreach($varian as $c)
                        <option value="{{$c->varian}}">{{$c->varian}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
           </div>
           <input type="hidden" name="budget_detail_id" readonly class="form-control">

           <div class="col-md-6">
             <div class="form-group">
               <label>Aktivity</label>
                
                 <select class="form-control" name="activity_name">
                      <option value="">--Pilih Activity--</option>
                      @foreach($activity_name as $c)
                        <option value="{{$c->activity_name}}">{{$c->activity_name}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Status</label>
                  <select class="form-control" name="execute_status">
                      <option value="">--Pilih execute_status--</option>
                      @foreach($execute_status as $c)
                        <option value="{{$c->execute_status}}">{{$c->execute_status}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
           </div>

          <div class="col-md-6">
           <div class="form-group">
               <button type="submit" class="btn btn-primary">Export to Excel </button>
            </div>
          </div>
         </div>
         <!-- /.row -->
        
           

              <?php
                // echo "<pre>";
                // print_r($implementation);
                // echo "</pre>";
              ?>
           <!--    <table id="example" width="100%" class="table table-bordered table-striped"> -->


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        </form
      </div>
      <!-- /.row -->
    </section>

  
 <script src="{{ asset('vendor/admin-lte/bower_components/jquery/dist/jquery.min.js')}}"></script> 
<script>


  



  $(function () {
   



    //Date range picker
    $('#eprop_date').daterangepicker({
          locale: {
            format: 'DD/MM/YYYY'
          }
    })
    //  $('#budgetbreak').DataTable({
    //   'paging'      : true,
    //   'lengthChange': false,
    //   'searching'   : false,
    //   'ordering'    : true,
    //   'info'        : true,
    //   'serverSide'  : true,
    //   'autoWidth'   : false
    // });

    
            //  var config = {

            //     '.chosen-select'           : {},

            //     '.chosen-select-deselect'  : {allow_single_deselect:true},

            //     '.chosen-select-no-single' : {disable_search_threshold:10},

            //     '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},

            //     '.chosen-select-width'     : {width:"95%"}

            //     }

            //      for (var selector in config) {

            //     $(selector).chosen(config[selector]);

            // }


  });

</script>

@stop
