@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron text-center">
            <h1>< Laravel Saudi /></h1>
            <p class="lead">Workshop : building album photos using form scratch with Laravel 5.7 .</p>
            <p><a class="btn btn-lg btn-success" href="{{ route('albums.create') }}" role="button">Create Album</a></p>
        </div>
        @if($albums->count() > 0)
            <div class="card-columns">
                @foreach($albums as $album)
                    <div class="card">
                        <img class="card-img-top" src="@if($album->photo->count() > 0) {{ asset($album->photo->random(1)->first()->path) }} @else{{ asset('svg/404.svg') }} @endif" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $album->title }}</h5>
                            <p class="card-text">{{ str_limit($album->details,83,'...')  }}</p>
                            <p class="card-text">
                                <small class="text-muted">{{ $album->created_at->diffForHumans() }}</small>
                            </p>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <a href="{{ route('albums.edit', [ $album->id]) }}"
                                       class="btn btn-primary btn-block center-block" role="button">Edit</a>
                                    <br/>
                                    <form method="post" action="{{ route('albums.destroy', [ $album->id]) }}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-block center-block">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center">
                    {{ $albums->appends(Request::except('page'))->links() }}
                </div>
            </div>
        @endif
    </div>
@endsection
