<?php

namespace App\Http\Controllers;

use App\Models\AniList;
use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Builder;
use App\Models\User;

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
        $request->validate([
            'title'=>'unique:ani_lists'
        ]);

        $anilist = new AniList();
        $anilist->anime_id = $request->anime_id;
        $anilist->user_id = Auth::user()->id;
        $anilist->status = $request->status;

        $anilist->save();

        return redirect('/animelists')->with('success', 'successfully added to list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AniList  $aniList
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request )
    {
        // $aniInfos = AniList::find($id);
        // $aniInfos = AniList::with('anime', 'user')->where('user_id', Auth::user()->id)->get(['anime_id']);
        // return view('animelists.show', compact('aniInfos'));
        $anime = AniList::with('anime', 'user')->where('user_id', Auth::user()->id)->where('anime_id', $request->id)->get();


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AniList  $aniList
     * @return \Illuminate\Http\Response
     */
    public function edit(Anime $anime)
    {
        // $anime = Anime::find($anime->id);
        // $anime = AniList::with('anime', 'user')->where('user_id', Auth::user()->id)->where('anime_id', $anime->id)->get();
        // return view('animelists.edit', compact('anime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AniList  $aniList
     * @return \Illuminate\Http\Response
     */
    public function update(AniList $aniList)
    {
        // $anilists = AniList::all();
        // $aniList->delete();
        // return redirect()->back()->with('success', 'anime successfully deleted');
    }

    public function all(){
        $alllists = AniList::all();
        return view('animelists.all', compact('alllists'));
    }

    public function remove(AniList $aniList){
        $aniList->id->delete();
        return redirect()->back()->with('success', 'anime successfully deleted');
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
        $aniList->delete();
        return redirect()->back()->with('success', 'anime successfully deleted');
    }

    public function watching(){
        $anilists = AniList::with('anime', 'user')->where('user_id', Auth::user()->id)->where('status', 'watching')->get();
        return view('animelists.watching', compact('anilists'));
        // return response()->json($anilists);
    }

    public function completed(){
        // $animes = AniList::all();
        $anilists = AniList::with('anime', 'user')->where('user_id', Auth::user()->id)->where('status', 'completed')->get();
        return view('animelists.completed', compact('anilists'));
    }

    public function planwatch(){
        $anilists = AniList::with('anime', 'user')->where('user_id', Auth::user()->id)->where('status', 'plan to watch')->get();
        return view('animelists.planwatch', compact('anilists'));
    }
}
