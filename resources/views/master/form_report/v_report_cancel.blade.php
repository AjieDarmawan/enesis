@extends('master.persons.base')

@section('content_header')
       <h1>

        <small>Report Cancel Parameter</small>
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
              <h3 class="box-title">Report Cancel Parameter</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              

        <div class="row">
          <form class="" method="POST" action="{{route('canceled_executor.cari')}}">
              {{ csrf_field() }}
           

            
           
           <div class="col-md-6">
             <div class="form-group">
               <label>Periode</label>
                   <input type="text"  id="eprop_date"   class="form-control">
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Company</label>
                     <select class="form-control" name="company_name">
                      <option>--Pilih Company--</option>
                      @foreach($company as $c)
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
                 <select class="form-control" name="division_name">
                      <option>--Pilih Division--</option>
                      @foreach($division as $c)
                        <option value="{{$c->division_name}}">{{$c->division_name}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Region</label>
                   <select class="form-control" name="region">
                      <option>--Pilih region--</option>
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
               <label>Branch</label>
                   <select class="form-control" name="branch">
                      <option>--Pilih branch--</option>
                      @foreach($branch as $c)
                        <option value="{{$c->branch}}">{{$c->branch}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Excekutor</label>
                  <select class="form-control" name="executor_name">
                      <option>--Pilih Excekutor--</option>
                      @foreach($executor_name as $c)
                        <option value="{{$c->executor_name}}">{{$c->executor_name}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
           </div>


           <div class="col-md-6">
             <div class="form-group">
               <label>Aktivity</label>
                    <select class="form-control" name="activity">
                      <option>--Pilih activity--</option>
                      @foreach($activity_name as $c)
                        <option value="{{$c->activity}}">{{$c->activity}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Brand</label>
              	  <select class="form-control" name="brand">
                      <option>--Pilih Brand--</option>
                      @foreach($brand as $c)
                        <option value="{{$c->brand_name}}">{{$c->brand_name}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
           </div>

           <div class="col-md-6">
             <div class="form-group">
               <label>Distributor</label>
                   <select class="form-control" name="distributor">
                      <option>--Pilih distributor--</option>
                      @foreach($distributor as $c)
                        <option value="{{$c->distributor}}">{{$c->distributor}}</option>
                      @endforeach
                  </select>
             </div>
             <!-- /.form-group -->
            
             <!-- /.form-group -->
           </div>
           <input type="hidden" name="budget_detail_id" readonly class="form-control">

           <div class="col-md-6">
           
             <!-- /.form-group -->
             <div class="form-group">
               <label>Account</label>
                   <select class="form-control" name="account">
                      <option>--Pilih account--</option>
                      @foreach($account as $c)
                        <option value="{{$c->account}}">{{$c->account}}</option>
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
