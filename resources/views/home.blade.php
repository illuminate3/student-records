@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8">
          @yield('stdsubject.content')
        </div>
	      <div class="col-xs-6 col-md-4 ">
          @include('layouts.partials.sidebar')
        </div>
	    </div>
	</div>
@endsection
