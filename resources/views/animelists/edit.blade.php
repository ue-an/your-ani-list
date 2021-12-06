@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    <i class="fas fa-trash mr-2"></i>
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-success">
                    <i class="fas fa-trash mr-2"></i>
                    {{ session()->get('error') }}
                </div>
            @endif

            @if(session()->has('message'))
          <div class="alert alert-success">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session()->get('message') }}
            <a class="float-right" href="/technical-working-group">Back to Anime List</a>
          </div>
          @endif
                <div class="card">
                    <div class="card-header">
                        Add Anime
                    </div>
                    <div class="card-body">
                        <form action="{{ route('animes.update', $anime) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" required value="{{ $anime->title }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control" name="description" required value="{{ $anime->description }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Genre</label>
                                <select name="genre" class="form-select">
                                    <option value="{{ $anime->genre }}" selected>{{  $anime->genre  }}</option>
                                    <option value="romance/Comedy">Romance/Comedy</option>
                                    <option value="action">Action</option>
                                    <option value="fantasy">Fantasy</option>
                                    <option value="slice of Life">Slice of Life</option>
                                    <option value="isekai">Isekai</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Year</label>
                                <input type="number" class="form-control" name="year" required value="{{ $anime->year }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection