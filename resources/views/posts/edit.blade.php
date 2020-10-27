@extends('layouts.app')

@section('content')

<h1> Edit {{ $quran->text }} </h1>
<hr><hr>

{!! Form::open(['action'=>['QuranController@update', $quran->id], 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

     {{ Form::hidden('_method', 'PUT') }} 
   
    <div class="form-group"> 
    	{{ Form::label('Titel') }}
   		{{ Form::text('title', $quran->title, ['placeholder'=>'Enter Post Title', 'class'=>'form-control']) }}
    </div>

    <div class="form-group"> 
    	{{ Form::label('Body') }}
   		{{ Form::textarea('body', $quran->body, ['placeholder'=>'Enter Post Body', 'class'=>'form-control ckeditor']) }}
    </div>
     
    <div class="form-group"> 

        {{ Form::label('Photo') }} 
        {{ Form::text('photo', $quran->photo, ['placeholder'=>'upload photo', 'class'=>'form-control']) }} 
        
    </div> 

     <div class="form-group text-right"> 
    	{{ Form::submit('Edit Post', ['class'=> 'btn btn-primary']) }}

        <a type="button" class="btn btn-secondary" href="/blog/public/quran/{{$quran->slug}}" > Cancel </a>
    </div>
   
{!! Form::close() !!}

@endsection