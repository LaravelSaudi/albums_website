@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="card">
                <div class="card-header">Create Albums</div>
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
                    <form method="POST" action="{{ route('albums.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"  placeholder="Family Albums">
                        </div>
                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea class="form-control" name="details"  rows="10" id="details">{{ old('details') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
    </div>
@endsection
