<?php

namespace App\Http\Controllers;

use App\Models\AniList;
use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AniListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animes = Anime::all();
        return view('animelists.index', compact('animes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $titles = Anime::orderBy('title', 'desc')->get();
        return view('animelists.create', compact('titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anilist = new AniList();
        $anilist->anime_id = $request->anime_id;
        $anilist->user_id = Auth::user()->id;
        $anilist->status = $request->status;

        $anilist->save();

        redirect('/animelists')->with('success', 'successfully added to list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AniList  $aniList
     * @return \Illuminate\Http\Response
     */
    public function show(AniList $aniList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AniList  $aniList
     * @return \Illuminate\Http\Response
     */
    public function edit(Anime $anime)
    {
        $anime = Anime::find($anime->id);
        return view('animelists.edit', compact('anime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AniList  $aniList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AniList $aniList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AniList  $aniList
     * @return \Illuminate\Http\Response
     */
    public function destroy(AniList $aniList)
    {
        //
    }

    public function watching(){
        //
        $anilists = DB::table('ani_lists')->public('title');
        return view('animelists.watching', compact('anilists'));
    }

    public function completed(){
        //
        $animes = AniList::all();
        return view('animelists.completed');
    }

    public function planwatch(){
        //
        return view('animelists.planwatch');
    }
}
