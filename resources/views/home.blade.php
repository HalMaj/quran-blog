@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                
                Dashboard 
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <h3>All Posts</h3>
                    <table class="table table-striped">
                        <head>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Created by</th>
                                <th>Accept / Reject</th>
                            </tr>
                        </head>
                        
                        <body>
                        @if (count($qurans) > 0)
                            @foreach($qurans as $quran)
                                <tr>
                                    <td>{{ $quran->title }}</td>


                                    @if ($quran->active == 0)
                                        <td>  deactive </td>
                                    @else
                                        <td>  active </td>
                                    @endif


                                    <td> {{ $quran->user->name }} </td>


                                    <td>
                                    @if($quran->active==0)
                                        <a href="{{route('admin.post.accept',['id'=>$quran->id])}}">accept</a>
                                    @endif
                                    </td>


                                </tr>
                            @endforeach


                            @else
		                    <tr> <td>
			                    <strong>ops</strong> No Posts
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endif
                        </body>


                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
