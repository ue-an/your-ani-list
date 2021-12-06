@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Add Anime
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ session()->get('message') }}
                            <a class="float-right" href="/animes">Back to Anime List</a>
                        </div>
          @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ route('animes.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control" name="description">
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Genre</label>
                                <select name="genre" class="form-select">
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
                                <input type="number" class="form-control" name="year">
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add to Database</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/loading.js "></script>
@endsection