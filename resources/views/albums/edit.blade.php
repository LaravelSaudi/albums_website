@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Albums</div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('albums.update', [ $album->id]) }}">
                            {{ method_field('PATCH') }}
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control"
                                       value="{{ old('title', $album->title) }}" placeholder="Family Albums">
                            </div>
                            <div class="form-group">
                                <label for="details">Details</label>
                                <textarea class="form-control" name="details" rows="10"
                                          id="details">{{ old('details', $album->details) }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('photo.store', [$album->id]) }}"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="files">Upload photos</label>
                                <input type="file" id="files" name="files[]" class="form-control" multiple/>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload File</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        @if($album->photo->count() > 0)
            <div class="card-columns">
                @foreach($album->photo as $photo)
                    <div class="card">
                        <img class="card-img-top" src="{{ asset($photo->path) }}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">
                                <small class="text-muted">{{ $photo->created_at->diffForHumans() }}</small>
                            </p>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <form method="post" action="{{ route('photo.destroy', [ $photo->id]) }}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-block center-block">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
@endsection
