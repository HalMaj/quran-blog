@extends('layouts.app')

@section('content')
	
	<h1> All Posts </h1>
	<hr><hr>

	@if (count($qurans) > 0)  
	   @foreach($qurans as $quran)
	   	<div class="panel">
			<div class="panel-heading">
				<h3>
					<a href="/blog/public/quran/{{$quran->slug}}">
					{{$quran->title}}
					</a>
				</h3>
			</div>
			      
		 	<div class="panel-body">
		  		<h5> {!! str_limit(strip_tags($quran->body), 30) !!} </h5>
		 	</div>

		 	<div class="panel-footer">
		 		<span class="btn btn-outline-success btn-lg btn-sm">
		 			<i class='fas fa-calendar'></i> {{ $quran->created_at }}
		 		</span>
		 		
				 &nbsp
		 		
				 <span class="btn btn-outline-success btn-lg btn-sm">
		 			<i class='fas fa-user'></i> {{ $quran->user->name }}
		 		</span>
		 	</div>
	  	</div> 
	  	<hr /> 
	   @endforeach

	   
	  	 {{ $qurans->links() }}
		   
	
	@else
		<div class="alert alert-info">
			<strong>ops</strong> No Posts
		</div>

	@endif

	<hr /> 
	<br />
@endsection