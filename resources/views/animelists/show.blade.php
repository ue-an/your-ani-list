@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row justify-content-center">
     <div class="col-md-12">
         <div class="card">
             <div class="card-header">Anime Information
             </div>
             <div class="card-body">
                 <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="animeList">
                     <thead>
                         <tr>
                          <th scope="col" style="width: 90px">Title</th>
                          <th scope="col">Description/ Story Plot</th>
                          <th scope="col" style="width: 90px">Genre</th>
                          <th scope="col">Year</th>
                         </tr>
                     </thead>
                     <tbody>
                             <tr>
                              {{-- @php
                                  dd($aniInfos);
                              @endphp --}}
                                 <th scope="row"> {{$aniInfos->title}} </th>
                                 <th scope="row"> {{$aniInfos->anime->description}}</th>
                                 <th scope="row"> {{ ucfirst($aniInfos->genre)}} </th>
                                 <th scope="row"> {{$aniInfos->year}}</th>
                             </tr>
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