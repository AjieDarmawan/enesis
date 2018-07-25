<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E PROPOSAL | REPORT</title>
  <!-- Tell the browser to be responsive to screen width -->
  
</head>

<!--<body onload="window.print();">-->
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> E Proposal.
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
   
 <div class="form-group">
    <div class="row invoice-info">
      <div class="col-xs-12">
      <small>
      <div class="col-sm-4 invoice-col" >
        <label class="textfield">DOC NO      :</label>
          @if (isset($Print))
            @foreach($Print as $value)
            <td> {{ ($value->eprop_no) }} <td>
            @endforeach
          @endif
          </div>
       </div>
       <div class="col-sm-4 invoice-col">
          DATE           :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->start_date) }} </td>
            @endforeach
          @endif
       </div>
       <div class="col-sm-4 invoice-col">
          BUDGET YEAR      :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->budget_year) }} </td>
            @endforeach
          @endif
       </div>
        <div class="col-sm-4 invoice-col">
          BRANCH     :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->budget_year) }} </td>
            @endforeach
          @endif
       </div>
       <div class="col-sm-4 invoice-col">
          BRAND     :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->brand_name) }} </td>
            @endforeach
          @endif
       </div>
       <div class="col-sm-4 invoice-col">
          CATEGORY     :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->kategory_name) }} </td>
            @endforeach
          @endif
       </div>
       <div class="col-sm-4 invoice-col">
          SKU     :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->division_name) }} </td>
            @endforeach
          @endif
       </div>
       <div class="col-sm-4 invoice-col">
          ACTIVITY     :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->activity_name) }} </td>
            @endforeach
          @endif
       </div>
       <div class="col-sm-4 invoice-col">
          REF NO     :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->division_name) }} </td>
            @endforeach
          @endif
       </div>
       <div class="col-sm-4 invoice-col">
          APPROV NO     :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->division_name) }} </td>
            @endforeach
          @endif
       </div>
   </div>
   <div class="row invoice-info">
        <div class="col-sm-4 invoice-col"  >
        <label class="textfield" >TITLE      :</label>
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->division_name) }} </td>
            @endforeach
          @endif
       </div>
        <div class="col-sm-4 invoice-col">
          PLACE     :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->division_name) }} </td>
            @endforeach
          @endif
       </div>
        <div class="col-sm-4 invoice-col">
          MARKET TYPE     :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->division_name) }} </td>
            @endforeach
          @endif
       </div>
        <div class="col-sm-4 invoice-col">
          OUTLET TYPE     :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->division_name) }} </td>
            @endforeach
          @endif
       </div>
        <div class="col-sm-4 invoice-col">
          PERIODE    :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->division_name) }} </td>
            @endforeach
          @endif
       </div>
        <div class="col-sm-4 invoice-col">
          BACKGROUND     :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->division_name) }} </td>
            @endforeach
          @endif
       </div>
        <div class="col-sm-4 invoice-col">
          OBJECTIVE     :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->division_name) }} </td>
            @endforeach
          @endif
       </div>
        <div class="col-sm-4 invoice-col">
          MECHANISM     :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->division_name) }} </td>
            @endforeach
          @endif
       </div>
        <div class="col-sm-4 invoice-col">
          ESTIMATE COST     :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->division_name) }} </td>
            @endforeach
          @endif
       </div>
        <div class="col-sm-4 invoice-col">
          KPI    :
          @if (isset($Print))
            @foreach($Print as $value)
             <td> {{ ($value->division_name) }} </td>
            @endforeach
          @endif
       </div>
    </div>
</div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
