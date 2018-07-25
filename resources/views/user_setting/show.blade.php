@extends('layouts.base') 

@section('content_header')
	  <h1>
        Detail User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User & Settings</a></li>
        <li class="active">Detail Users Setting</li>
      </ol>  
@stop

@section('content') 
@foreach($userview as $value)
  @php $username = $value->name; @endphp
  @php $email = $value->email; @endphp
  @php $role = $value->email; @endphp
  @php $id = $value->id; @endphp
@endforeach
@if(Session::has('useraccess'))
    $user_access = Session::get('useraccess')
@else
    @php $user_access="" @endphp
@endif
<form class="form-horizontal form-group-sm" }}">
  <div class="row">
  	<div class="col-xs-12">
  	  <div class="box box-danger">
  	    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  	    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
  	    <br>
          <div class="form-group">
            <label class="col-xs-2 control-label">Nama User</label>
            <div class="col-xs-3">
              <input type="text"  id="name" name="name"   value= "{{ $username }}"" class="form-control" disabled="disabled" /> 
            </div>   
          </div>
          <div class="form-group">
            <label class="col-xs-2 control-label">Email</label>
            <div class="col-xs-3">
              <input type="text"  id="email" name="email"   value= "{{ $email }}" class="form-control" disabled="disabled"/> 
            </div>   
          </div>
          <div class="form-group">
            <label class="col-xs-2 control-label">Role</label>
            <div class="col-xs-3">
              <input type="text"  id="displayname" name="displayname"  value="{{ $role }}"  class="form-control" disabled="disabled"/> 
            </div>   
          </div>
  	  	<br>
  	  </div>
    </div>
      <!-- Tampilkan Akses user -->
      <div class="col-xs-12">
      <div class="box box-warning">  
      <table id="tbldetails" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No.</th>
            <th>Customer Number</th>
            <th>Nama Customer</th>
            <th>Cabang</th> 
         </tr>
         </thead>
         <tbody>
          <?php $i = 0 ?>
          @if(Session::has('user_access'))
          @php $user_access = Session::get('user_access') @endphp 
            @foreach($user_access as $value)
            <?php $i++ ?>
              <tr>
                <td> {{ $i }} </td>
                <td> {{ ($value->customer_number) }} </td>
                <td> {{ $value->customer_name }} </td>
                <td> {{ $value->customer_ship_name }} </td> 
              </tr>
            @endforeach
            @endif
          </tbody>
      </table>
      </div>
     </div>
  	  <!-- Box Footer -->
        <div class="box-footer">
        		<a href="{{ url('/user_setting') }}" class="btn btn-warning btn-sm">Back</a> 
        </div>
        <!-- End Of Box Footer --> 
  	</div>
  </div> 
</form>
@stop

 