
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
    $('.select2').select2()
    $('#tblusers').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true
      'info'        : true,
      'autoWidth'   : false
    });
  });

  $("#person_id").on('change', function() {
      var data =$("#person_id").val();
      console.log(data);      
      $.get('/user_setting/getEmail/' + data, function(mail){ 
              $('#email').prop('value', mail);          
      })
      $.get('/user_setting/getName/' + data, function(name){ 
              console.log(name);  
              $('#name').prop('value', name);          
      })
  });


</script> 

    
@endpush
