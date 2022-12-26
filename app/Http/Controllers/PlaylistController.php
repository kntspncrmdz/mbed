<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

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
    $items = $playlist->items()->get();

    return view('layouts.items.index')->with('playlist', $playlist)->with('items', $items);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Playlist  $playlist
   * @return \Illuminate\Http\Response
   */
  public function edit(Playlist $playlist)
  {
    //
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
    $request->validate([
      'title' => 'required'
    ]);

    $playlist->update($request->all());

    return redirect()->back();
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

    return redirect()->route('playlists.index');
  }

  public function storeItem(Request $request)
  {
    $request->validate([
      'item' => 'required'
    ]);

    Item::create($request->all());

    return redirect()->back();
  }

  public function destroyItem(Item $item)
  {
    $item->delete();

    return redirect()->back();
  }

  public function updateItem(Request $request, Item $item)
  {
    $request->validate([
      'item' => 'required'
    ]);

    $item->update($request->all());

    return redirect()->back();
  }
}
