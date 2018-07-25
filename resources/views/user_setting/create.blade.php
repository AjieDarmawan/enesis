@extends('user_setting.base') 

@section('content_header')
	  <h1>
        Add New Users
        <small>Tambah User Akses</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User & Settings</a></li>
        <li class="active">Create Users</li>
      </ol>  
@stop

@section('content')
<form class="form-horizontal form-group-sm" method="POST" action="{{ route('store.access') }}"> 
  {{ csrf_field() }}
  <div class="row">

	<div class="col-xs-12">
	  <div class="box box-danger">
	    
	    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> </div>
	    <br>
        <div class="form-group">
              <label class="col-xs-2 control-label">Personnel</label>
              <div class="col-xs-6">
              <select class="form-control select2" style="width: 75%;" name="person_id" id="person_id" type="text" data-placeholder='-- Piih Personnel Name --'>
                  <option></option>
                  @foreach($lpersons as $value)
                    <option value="{{$value->person_id}}">
                      {{$value->name}}
                    </option>
                  @endforeach
              </select>
              </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Name</label>
          <div class="col-xs-3">
            <input type="text"  id="name" name="name"   placeholder="Nama" class="form-control" required/> 
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Email</label>
          <div class="col-xs-3">
            <input type="text"  id="email" name="email"   placeholder="Email" class="form-control" required/> 
          </div>   
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Username</label>
          <div class="col-xs-3">
            <input type="text"  id="username" name="username"   placeholder="User Name" class="form-control" required/> 
          </div>   
        </div>           
        
        <div class="form-group">
              <label class="col-xs-2 control-label">User Role</label>
              <div class="col-xs-3">
              <select class="form-control select2" style="width: 75%;" name="role_id" id="role_id" type="text" data-placeholder='-- Piih User Role --'>
                  <option></option>
                  @foreach($lrole as $value)
                    <option value="{{$value->id}}">
                      {{$value->display_name}}
                    </option>
                  @endforeach
              </select>
              </div>
        </div>
        <div class="form-group">
          <label class="col-xs-2 control-label">Password</label>
          <div class="col-xs-3">
            <input type="password"  id="password" name="password"   placeholder="Password" class="form-control" required/> 
          </div>   
        </div>
        <div class="form-group">
            <label for="password-confirm" class="col-xs-2 control-label">Confirm Password</label>
            <div class="col-xs-3">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
        
        
	  	<br>
	  </div>
	  <!-- Box Footer -->
      <div class="box-footer">
      		<a href="{{ route('list_users') }}" class="btn btn-warning btn-sm">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>    
      </div>
      <!-- End Of Box Footer --> 
	</div>
  </div> 
</form>
@stop

 