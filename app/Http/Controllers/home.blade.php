
@extends('layouts.layout_template')

@section('content_header')
	  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">dashboard</li>
      </ol>
      <br>  
@endsection

@section('content') 
     @include('dashboard.sales_graph')
@endsection
