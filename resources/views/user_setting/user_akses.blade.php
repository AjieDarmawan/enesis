@extends('layouts.base') 

@section('content_header')
	  <h1>
        Add/Edit Users Akses
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User & Settings</a></li>
        <li class="active">Add/Edit Users Setting</li>
      </ol>  
@stop

@section('content') 
@if(Session::has('userview'))
  @foreach(Session::get('userview') as $value)
    @php $username = $value->name; @endphp
    @php $email = $value->email; @endphp
    @php $role = $value->role; @endphp
    @php $id = $value->id; @endphp
  @endforeach
@endif
  
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('store.access') }}">
  <div class="row">
  	<div class="col-xs-12">
  	  <div class="box box-danger">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  	    <input type="hidden" name="user_id" id="user_id" value= "{{ $id }}" >
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

    <!-- Add Edit User Akses -->
    <div class="col-xs-12">
    <div class="box box-danger">
      <div class="form-group">
        <label class="col-xs-2 control-label">Customer</label>
        <div class="col-xs-2">
          <select class="form-control select2" name="cust_ship_id" id="cust_ship_id" style="width: 100%;">
            <option disabled selected> -- select an option -- </option>
            @foreach($custview as $value)
              <option value="{{$value->cust_ship_id}}"> {{$value->customer_ship_name}} </option>
            @endforeach
          </select>
        </div> 
        <div class="col-xs-2">
          <button type="submit" class="btn btn-info pull-right">Add Customer Akses</button>
        </div> 
      </div>  
    </div>
    </div>
  </div> 
</form>
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
            <th>Action</th>
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
                <td> 
                  <form action="{{ action('Users@destroy') }}" method="post">
                        {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="access_id" type="hidden" value="{{ $value->access_id}}">
                    <input name="id" type="hidden" value="{{ $value->id}}">
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                </td>
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
  	
@stop

 