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
                        <form action="{{ route('animelists.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                {{-- <label for="">Title</label>
                                <input type="text" class="form-control" name="title"> --}}
                                {{-- <div class="dropdown">
                                 <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" id="dropdown-toggle">
                                  Choose Anime Title
                                 </button>
                                 <ul class="dropdown-menu">
                                  @if (isset($animesDropDown))
                                  @foreach ($animeDropDown as $id => $animeddid)
                                      <li><a href="{{ $id }}">{{ $animeddid }}</a></li>
                                  @endforeach
                                  @endif
                                 </ul>
                                </div> --}}
                                <label for="">Title</label>
                                <select name="anime_id" class="form-select">
                                 @foreach ($titles as $title)
                                    <option value="{{$title->id}}">{{$title->title}}</option>
                                @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-select">
                                    <option value="watching">Watching</option>
                                    <option value="completed">Completed</option>
                                    <option value="plan to Watch">Plan to Watch</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                             <button type="submit" class="btn btn-primary">Add to List</button>
                         </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/loading.js "></script>
@endsection