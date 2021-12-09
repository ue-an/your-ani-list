@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row justify-content-center">
     <div class="col-md-12">
         <div class="card">
             <div class="card-header">Completed
             </div>
             <div class="card-body">
                 <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="animeList">
                     <thead>
                         <tr>
                             <th scope="col">Title</th>
                             <th scope="col">Genre</th>
                             <th scope="col">Status</th>
                             <th scope="col" style="width: 20px">Actions</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($anilists as $anilist)
                             <tr>
                                 <th scope="row"> {{$anilist->anime->title}} </th>
                                 <th scope="row"> {{ ucfirst($anilist->anime->genre)}} </th>
                                 <th scope="row"> {{$anilist->status}} </th>
                                 <td>
                                        <a href="/animelists/{{$anilist->anime->id}}" class="btn btn-primary"><i class="fas fa-list"></i></a>
                                        <br><br>
                                        <form action="/animelists/{{$anilist->anime->id}}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE')}}
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success delete-user">
                                                    <i class="fas fa-check"></i>
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
@endsection