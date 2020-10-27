@extends('layouts.app')

@section('content')

<h1>Add New Post</h1>
<hr><hr>
 
{!! Form::open(['action'=>'QuranController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
   
    <div class="form-group"> 
    	{{ Form::label('Titel') }}
   		{{ Form::text('title', '', ['placeholder'=>'Enter Post Title', 'class'=>'form-control']) }}
    </div>

    <div class="form-group"> 
    	{{ Form::label('Body') }}
   		{{ Form::textarea('body', '', ['placeholder'=>'Enter Post Body', 'class'=>'form-control ckeditor']) }}
    </div>
     
    <div class="form-group"> 
    	{{ Form::label('Photo') }}  
   		<input class="form-control" type="file" name="photo"/>
    </div> 

     <div class="form-group text-right"> 
    	{{ Form::submit('Add Post', ['class'=> 'btn btn-primary']) }}
    
        <a type="button" class="btn btn-secondary" href="/blog/public/quran" > Cancel </a>
    </div>
   
{!! Form::close() !!}

@endsection