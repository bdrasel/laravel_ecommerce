@extends('layouts.admin')

@section('title','Admin Dashboard')


@push('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
@endpush


@section('content')



@component('layouts.partials.breadcumb')
     {{-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li> --}}
     <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endcomponent

  <div class="contentbar">                          
	<div class="row">
	    <div class="col-lg-12 col-xl-6">
	        <!-- Start row -->
	        <div class="row">
	      		
	      		<div class="col-12">
	      			 {!! $chart->container() !!}   
	      		</div>
	        </div>
	        <!-- End row -->                        
	    </div>
	  
	</div>
	
</div>
@endsection

@push('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	 {!! $chart->script() !!}
@endpush