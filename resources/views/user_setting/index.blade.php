@extends('layouts.base') 

@section('content_header')
	  <h1>
        List of Users
        <small>Daftar Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setting</a></li>
        <li class="active">Users</li>
      </ol>  
@stop

@section('content')
<div class="row">
   <div class="col-xs-12">
     <div class="box box-danger">
     	<div class="box-header">
		     <div class="col-sm-4">
		       <a class="btn btn-primary"  href="{{ route('user_setting.create') }}">Add Users</a>
			 </div>
		 </div>
     	<div class="col-xs-10">
             <div class="box-body">
            	<table id="tblusers" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>User Name</th> 
                      <th>Personnel Name</th>
                      <th>Email</th>
                      <th>Role</th> 
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0 ?>
                      @foreach($Users as $key => $value)
                      <? dd($Users) ?>
                      <?php $i++ ?>
                      <tr>
                      	<td> {{ $i }}   </td>
                        <td> {{ ($value->username) }} </td>
                        <td> {{ $value->name }} </td>
                        <td> {{ $value->email }} </td>
                        <td> {{ $value->role }} </td>
                        <td> <a href="{{ route('user_setting.edit',$value->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>  
              </div>  
            </div> 
     <!--end box danger -->
     </div>
   </div>
</div>
@stop