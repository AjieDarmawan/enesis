@extends('master.persons.base')

@section('content_header')
       <h1>

        <small>Form Result</small>
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
              <h3 class="box-title">Input Form Result</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php
                // echo "<pre>";
                //  print_r($Settle);
                // //print_r($fnd);
                // echo "</pre>";


                $AWAL = $Settle->division_code;
                // karna array dimulai dari 0 maka kita tambah di awal data kosong
                // bisa juga mulai dari "1"=>"I"
                $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
                $noUrutAkhir = $Settle->budget_detail_id;
                $no = 1;

                    // echo "No urut surat di database : 0" ;
                    // echo "<br>";
                  //  echo "Pake Format : " . sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
                    $no_urut = date('Y'). '/' . $bulanRomawi[date('n')] .'/' .$AWAL.'/' . sprintf("%03s", $noUrutAkhir);


                    // echo $no_urut;
                    // die;

                 ?>


        <div class="row">
            <form class="" method="POST" action="{{ route('result.update',$Settle->budget_detail_id) }}" enctype="multipart/form-data">>
              {{ csrf_field() }}
              {{ method_field('PUT') }}


           
           <div class="col-md-6">
             <div class="form-group">
               <label>Proposal No</label>
               <input type="text" value="{{$Settle->eprop_no}}" disabled  class="form-control">
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Company</label>
                   <input type="text"  value="{{$Settle->company_nama}}" disabled  class="form-control">
             </div>
             <!-- /.form-group -->
           </div>
           <!-- /.col -->
           <div class="col-md-6">
             <div class="form-group">
               <label>Reco No</label>
                  <input type="text" name="" value="{{$Settle->reco_no}}" disabled class="form-control">
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Division</label>
                 <input type="text" name="" value="{{$Settle->division_name}}" disabled class="form-control">
             </div>
             <!-- /.form-group -->
           </div>
           <!-- /.col -->

           <div class="col-md-6">
             <div class="form-group">
               <label>Region</label>
                  <input type="text" name="" value="{{$Settle->region}}"  disabled class="form-control">
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Brand</label>
                 <input type="text" name=""  value="{{$Settle->brand_name}}" disabled class="form-control">
             </div>
             <!-- /.form-group -->
           </div>


           <div class="col-md-6">
             <div class="form-group">
               <label>Branch</label>
                  <input type="text" name="" disabled value="{{$Settle->area}}" class="form-control">
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Varian</label>
                 <input type="text" name="" value="{{$Settle->produk_name}}" disabled class="form-control">
             </div>
             <!-- /.form-group -->
           </div>

           <div class="col-md-6">
             <div class="form-group">
               <label>Distributor/Account/Eo</label>
                  <input type="text" name="" value="{{$Settle->account_name}}" disabled class="form-control">
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Target Name</label>
                 <input type="text" name="target_name" value="{{$Settle->target_name}}" readonly  class="form-control">
             </div>
             <!-- /.form-group -->
           </div>

           <input type="hidden" name="budget_detail_id" value="{{$Settle->budget_detail_id}}" readonly class="form-control">

           <div class="col-md-6">
             <div class="form-group">
               <label>Proposal Periode</label>
                  <?php
                         list($y,$m,$d)=explode('-',$Settle->start_date);
                         list($y1,$m1,$d1)=explode('-',$Settle->end_date);
                  ?>
                  <input type="text" name="" value="{{$d.'-'.$m.'-'.$y}} S/d {{$d1.'-'.$m1.'-'.$y1}}" disabled class="form-control">
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Target Value</label>
                 <input type="text" name="" value="{{$Settle->detail_target_estimasi}} " disabled class="form-control">
             </div>
             <!-- /.form-group -->
           </div>
           <div class="col-md-6">
             <div class="form-group">
               <label>Target Sales</label>
                  <input type="text" name="detail_target_sales" readonly value="{{$Settle->detail_target_sales}} "  class="form-control">
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Cost Rasio</label>
                 <input type="text" name="" value="{{$Settle->target_estimasi}} " disabled class="form-control">
             </div>
             <!-- /.form-group -->
           </div>

           <div class="col-md-6">

             <div class="form-group">
               <label>Excekutor</label>
                 <input type="text" name="" value="{{$Settle->executor_name}} " disabled class="form-control">
             </div>

             <!-- /.form-group -->
           </div>

           <input type="hidden" name="budget_detail_id" value="{{$Settle->budget_detail_id}}">

            <hr>



         </div>
         <!-- /.row -->
          ==================================================================================================
           <div class="row">
             <div class="col-md-6">

               <div class="form-group">
                 <label>Actual Achivement</label>
                   <input type="text" name="actual_ach"  required  class="form-control">
               </div>

               <!-- /.form-group -->
             </div>

             <div class="col-md-6">

               <div class="form-group">
                 <label>Actual Sales</label>
                   <input type="text" name="actual_sales"  required  class="form-control">
               </div>

               <!-- /.form-group -->
             </div>

             <div class="col-md-6">

               <div class="form-group">
                 <label>Actual/Target Achivement</label>
                   <input type="text" name="actual_target" required   class="form-control">
               </div>

               <!-- /.form-group -->
             </div>


             <div class="col-md-6">

               <div class="form-group">
                 <label>Actual Cost Ratio</label>
                   <input type="text" name="actual_cost" required   class="form-control">
               </div>

               <!-- /.form-group -->
             </div>


             <div class="col-md-6">
               <div class="form-group">
                 <label>Description</label>
                   <textarea type="text" name="result_implement_descr" required   class="form-control"></textarea>
               </div>
               <!-- /.form-group -->
             </div>


             <div class="col-md-6">
               <div class="form-group">
                 <label>Upload</label>
                  <input type="file" name="result_path" required   >
               </div>
               <!-- /.form-group -->
             </div>



             <div class="col-md-12">
               <div class="form-group">

                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                    
               </div>
               <!-- /.form-group -->

               <!-- /.form-group -->
             </div>
           </div>

              


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
@stop
