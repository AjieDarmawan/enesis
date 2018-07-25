@extends('layouts.layout_template')

@section('content_header')
     @yield('content_header')
@endsection

@section('content')
    @yield('content')
@endsection

@push('scripts')

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    
    $('#activity').DataTable()
    $('#activity').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>

<script type="text/javascript">
 
        $(document).ready(

            function () {
                 $("#division_code").select2();
                  }
        );
       
        $("#alldivisi").click(function(){
            if($("#alldivisi").is(':checked') ){
                $("#division_code").find('option').prop("selected",true);
                $("#division_code").trigger("change");
            }else{
                $("#division_code").val('').trigger("change"); 
                 }
        });

          
</script>

@endpush
