
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
    $('#budget_lok').DataTable()
    $('#budget_dtl').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });

      $('#allocation').keyup(function() {
          
          var $this = $( this );
          var input = $this.val();

          var lokasiAmount = $(this).val();
          var totalAmount = $('#total_budget').val();
          var ending_budget = parseInt(lokasiAmount) + parseInt(totalAmount);

          console.log(ending_budget);

          $('#ending_budget').val(ending_budget);

       });

</script>

@endpush