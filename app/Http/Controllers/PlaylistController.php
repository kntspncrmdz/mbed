<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $playlists = Playlist::all();
    return view('layouts.playlists.index', compact('playlists'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
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
      'title' => 'required'
    ]);

    Playlist::create([
      'title' => $request->input('title')
    ]);

    return redirect()->route('playlists.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Playlist  $playlist
   * @return \Illuminate\Http\Response
   */
  public function show(Playlist $playlist)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Playlist  $playlist
   * @return \Illuminate\Http\Response
   */
  public function edit(Playlist $playlist)
  {
    $items = Item::all();
    // dd($playlist);

    return view('layouts.items.index')->with('playlist', $playlist)->with('items', $items);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Playlist  $playlist
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Playlist $playlist)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Playlist  $playlist
   * @return \Illuminate\Http\Response
   */
  public function destroy(Playlist $playlist)
  {
    $playlist->delete();

    return redirect()->back();
  }
}
