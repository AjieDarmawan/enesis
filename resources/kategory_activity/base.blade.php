
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

    $('#active').is(":checked");
    
    $('#grpactivity').DataTable()
    $('#grpactivity').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>

@endpush
