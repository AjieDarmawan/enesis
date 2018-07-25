
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
    $('#budget_dstr').DataTable()
    $('#example').DataTable({
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
                $("#region_id").select2();
                $("#subregion_id").select2();
                $("#area_id").select2();
                $("#asdh_id").select2();                  
            }
        );
        //Select All Checkbox
        $("#allregion").click(function(){
            if($("#allregion").is(':checked') ){
                $("#region_id").find('option').prop("selected",true);
                $("#region_id").trigger("change");
            }else{
                $("#region_id").val('').trigger("change"); 
                $("#subregion_id").select2('destroy');
                $("#subregion_id").html("<option></option>");
                $("#subregion_id").select2(); 
             }
        });

        $("#allsubregion").click(function(){
            if($("#allsubregion").is(':checked') ){
                $("#subregion_id").find('option').prop("selected",true);
                $("#subregion_id").trigger("change");
            }else{
                $("#subregion_id").val('').trigger("change"); 
                $("#area_id").select2('destroy');
                $("#area_id").html("<option></option>");
                $("#area_id").select2(); 
             }
        });
 // ----------ganti option area dan tambahan ASDH
       

        $("#allarea").click(function(){
            if($("#allarea").is(':checked') ){
                $("#area_id").find('option').prop("selected",true);
                $("#area_id").trigger("change");
            }else{
                $("#area_id").val('').trigger("change"); 
                $("#asdh_id").select2('destroy');
                $("#asdh_id").html("<option></option>");
                $("#asdh_id").select2(); 
               
            }
        });

       $("#allasdh").click(function(){
           if($("#allasdh").is(':checked') ){
                $("#asdh_id").find('option').prop("selected",true);
                $("#asdh_id").trigger("change");
            }else{
                $("#asdh_id").val('').trigger("change");               

             }
        });

// ----------end ganti option area dan tambahan ASDH
       

        //-------------- *****/
        //****/
        $("#region_id").on('change', function() {
          var data =$("#region_id").val();
          console.log(data);

          $('#subregion_id').empty();
          $('#area_id').empty();
          $('#asdh_id').empty();
          $.each($("#region_id").val(), function( index, value ) {
            
            $.get('/budget_dstr/getSubregion/' + value, function(data){
                //success data
                console.log(data);
                console.log('/budget_dstr/getSubregion/' + value);
              $.each(data, function(index,subregObj){
                console.log(value);
                   $("#subregion_id").append('<option value="'+subregObj.id+'">'+subregObj.subregion+'</option>');
              })
            })
          })
        });

        $("#subregion_id").on('change', function() {
          var data =$("#subregion_id").val();
          console.log(data);
 
          $('#area_id').empty();
          $('#asdh_id').empty();
          $.each($("#subregion_id").val(), function( index, value ) {
            
            $.get('/budget_dstr/getArea/' + value, function(data){
                //success data
                console.log(data);
                console.log('/budget_dstr/getArea/' + data);
              $.each(data, function(index,areaObj){
                console.log(value);
                   $('#area_id').append('<option value="'+areaObj.id+'">'+areaObj.area+'</option>');
              })
            })
          })
        });

//--------------- + ASDH
       $("#area_id").on('change', function() {
          var data =$("#area_id").val();
          console.log(data);
 
          $('#asdh_id').empty();
          $.each($("#area_id").val(), function( index, value ) {            
            $.get('/budget_dstr/getAsdh/' + value, function(data){
                //success data
                console.log(data);
                console.log('/budget_dstr/getAsdh/' + data);
              $.each(data, function(index,asdhObj){
                console.log(value);
                   $('#asdh_id').append('<option value="'+asdhObj.person_id+'">'+asdhObj.name+'</option>');
              })
            })
          })
        });
//--------------- + ASDH     
</script>

@endpush
