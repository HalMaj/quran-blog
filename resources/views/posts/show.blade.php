@extends('layouts.app')

@section('content')
	
	@if(!Auth::guest() && (Auth::user()->id == $quran->user_id) )
	
		
	<table class="table table-striped">
        <head>
            <tr>
				<div class="clearfix">
     				<th>	
					 	<a type="button" class="btn btn-secondary btn-lg btn-sm" href="/blog/public/quran/"> Back </a>
			   		</th>	
					
					<th>	
						<a href="/blog/public/quran/{{ $quran->id }}/edit" class="btn btn-success btn-lg btn-sm">
						<i class='fas fa-edit'></i> 
							Edit Post
						</a>
					</th>
			 		
					 <th>  
					  	{!! Form::open(['action' => ['QuranController@destroy', $quran->id], 'method' => 'POST']) !!}
      					{{ Form::hidden('_method', 'DELETE') }} 
      					{{ Form::bsSubmit('Delete Post', ['class' => 'btn btn-danger btn-lg btn-sm']) }} 
      					{!! Form::close() !!}
					</th>
			    </div>
			</tr>
        </head>
	</table>
	
	@else
		<a type="button" class="btn btn-secondary btn-lg btn-sm" href="/blog/public/quran/"> Back </a>

	@endif

	<br /><br />

	<h1> {{ $quran->title }} </h1>
    <hr><hr>
	
	<div>
		<h3> {!! $quran->body !!} </h3>
	</div>
	
	<br>
	
	<div class="card-body">
			<img src="{{asset('storage').'/'.$quran->photo}}" class="img">
                </div>
	<br>

	<span class="btn btn-outline-primary btn-lg disabled btn-sm">
		 <i class='fas fa-calendar'></i> {{ $quran->created_at }}
	</span>

	<hr /> 
	<br />

@endsection