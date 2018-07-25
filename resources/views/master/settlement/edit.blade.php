@extends('master.persons.base')

@section('content_header')
       <h1>

        <small>Settlement</small>
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
              <h3 class="box-title">Input Settlement</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php


                  $a = count($no);
                //    for ($i = 1; $i <= $a-1; $i++) {
                //      echo $noUrutAkhir = $history[$i]->id+1;
                // } 
                  
                // echo "<pre>";
                //  print_r($history);
                // //print_r($fnd);
                // echo "</pre>";
                  // echo "<pre>";
                  // print_r(end($history));
                  // echo "<pre>";
                // foreach($history as $h){
                //    echo end($h) ;
                // }


                $AWAL = $Settle->division_code;
                // karna array dimulai dari 0 maka kita tambah di awal data kosong
                // bisa juga mulai dari "1"=>"I"
                $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");

                if($a){
                   for ($i = 1; $i <= $a-1; $i++) {
                      $noUrutAkhir = $no[$i]->id+1;
                    }
                }else{
                       $noUrutAkhir = 1;
                } 



               


               
                $no = 1;

                    // echo "No urut surat di database : 0" ;
                    // echo "<br>";
                  //  echo "Pake Format : " . sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
                    $no_urut = date('Y'). '/' . $bulanRomawi[date('n')] .'/' .$AWAL.'/' . sprintf("%03s", $noUrutAkhir);


                    // echo $no_urut;
                    // die;

                 ?>


        <div class="row">
            <form class="" method="POST" action="{{ route('settlement.update',$Settle->budget_detail_id) }}">
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
               <label>No Memo Settlement</label>
                 <input type="text" name="memo" value="{{$no_urut}}" readonly class="form-control">
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
               <label>Excekutor</label>
                 <input type="text" name="" value="{{$Settle->executor_name}} " disabled class="form-control">
             </div>
             <!-- /.form-group -->
           </div>

           <hr>


           <div class="col-md-6">
             <div class="form-group">
               <label>Receving Date</label>
                 
                  <div class="input-group from">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="Receving" class="form-control pull-right" id="birthDate">
                </div>
             </div>
             <!-- /.form-group -->
             <div class="form-group">
              <!--  <label>Claim Letter Date</label>
                 <input type="date" name="Claim" required class="form-control"> -->
                  <div class="input-group from">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="Claim" class="form-control pull-right" id="hiredDate">
                </div>
             </div>
             <!-- /.form-group -->
           </div>


           <div class="col-md-6">
             <div class="form-group">
               <label>Claim Letter No</label>
                  <input type="text" name="claim_letter" required  class="form-control">
             </div>
             <!-- /.form-group -->
             <div class="form-group">
               <label>Claim Amount</label>
                 <input type="text" name="claim_amount" required class="form-control">
             </div>
             <!-- /.form-group -->
           </div>


           <div class="col-md-6">
             <div class="form-group">
               <label>Payment Type</label>
                    <select name="Payment" class="form-control">
                        @foreach($fnd as $c)
                          <option value="{{$c->value_name}}">{{$c->value_name}}</option>
                        @endforeach
                    </select>
             </div>
           </div>

           <div class="col-md-6">
             <div class="form-group">

                  <button type="submit" class="btn btn-primary ">Simpan</button>
                    <a href="{{route('settlement.index')}}" class="btn btn-danger ">Batal</a>
             </div>
             <!-- /.form-group -->

             <!-- /.form-group -->
           </div>
         </div>
         <!-- /.row -->





               <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>No Proposal</th>
                     <th>No Memo</th>
                    <th>Title</th>
                    <th>Region</th>
                    <th>Area</th>
                    <th>Activity</th>
                    <th>Brand</th>
                    <th>Varian</th>
                    <th>Claim Letter No </th>
                    <th>Status </th>
                    <th>claim amount</th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>

                @php $no = 1; @endphp
        @foreach($history as $datas)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $Settle->eprop_no }}</td>
                <td>{{ $datas->settlement_num }}</td>
                <td>{{ $Settle->description }}</td>
                <td>{{ $Settle->region }}</td>
                <td>{{ $Settle->area }}</td>
                <td>{{ $Settle->activity_name }}</td>
                <td>{{ $Settle->brand_name }}</td>
                <td>{{ $Settle->produk_name }}</td>
                <td>{{ $datas->claim_letter_no }}</td>
                <td>{{ $datas->payment_type }}</td>
                <td><?php echo number_format($datas->claim_amount,0,',','.') ?></td>

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
        </form
      </div>
      <!-- /.row -->
    </section>
@stop
