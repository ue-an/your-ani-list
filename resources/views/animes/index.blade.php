@extends('layouts.app')

@section('content')
@if (Auth::user() != null)
    @if (Auth::user()->role == "superadmin")
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Anime List
                    <a href="/animes/create" class="btn btn-primary btn-sm float-end">Add Anime</a>
                </div>
                <div class="card-body">
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

                    <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="animeList">
                        <thead>
                            <tr>
                                {{-- <th scope="col">#</th> --}}
                                <th scope="col" style="width: 90px">Title</th>
                                <th scope="col">Description/ Story Plot</th>
                                <th scope="col" style="width: 90px">Genre</th>
                                <th scope="col">Year</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($animes as $anime)
                                <tr>
                                    {{-- <th scope="row"> {{$anime->id}} </th> --}}
                                    <th scope="row"> {{$anime->title}} </th>
                                    <th scope="row"> {{$anime->description}} </th>
                                    <th scope="row"> {{ ucfirst($anime->genre)}} </th>
                                    <th scope="row"> {{$anime->year}} </th>
                                    <td>
                                        <a href="/animes/{{$anime->id}}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                        <form method="POST" action="/animes/{{ $anime->id }}">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger delete-user">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <br>
        <br>
        <br>
    </div>

    
    <script>
        $(document).ready(function() {
            $('#animeList').DataTable({
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10', '25', '50', 'All']
                ],
                dom: "<'row'<'col-md-6'B><'col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [{
                        extend: 'print',
                        text: '<i class="fas fa-print fa-1x"></i> Print',
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i> PDF',
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Excel',
                    },
                    'pageLength'
                ],
                responsive: true,
            });
        });
    </script>
</div>
    @elseif (Auth::user()->role == "admin")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
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
    
                        <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="animeList">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">#</th> --}}
                                    <th scope="col" style="width: 90px">Title</th>
                                    <th scope="col">Description/ Story Plot</th>
                                    <th scope="col" style="width: 90px">Genre</th>
                                    <th scope="col">Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($animes as $anime)
                                    <tr>
                                        <th scope="row"> {{$anime->title}} </th>
                                        <th scope="row"> {{$anime->description}} </th>
                                        <th scope="row"> {{ ucfirst($anime->genre)}} </th>
                                        <th scope="row"> {{$anime->year}} </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
    
            </div>
            <br>
            <br>
            <br>
        </div>
    
        
        <script>
            $(document).ready(function() {
                $('#animeList').DataTable({
                    lengthMenu: [
                        [10, 25, 50, -1],
                        ['10', '25', '50', 'All']
                    ],
                    dom: "<'row'<'col-md-6'B><'col-md-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [{
                            extend: 'print',
                            text: '<i class="fas fa-print fa-1x"></i> Print',
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i> PDF',
                        },
                        {
                            extend: 'excel',
                            text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Excel',
                        },
                        'pageLength'
                    ],
                    responsive: true,
                });
            });
        </script>
    </div>
        @endif
@endif

@endsection
