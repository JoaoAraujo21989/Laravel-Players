<?php

namespace App\Http\Controllers;

use App\Player;
use App\Country;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportPlayer;
use App\Exports\ExportPlayer;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$players = Player::all();
        $players = Player::paginate(15);

        return view('pages.players.index', ['players' => $players]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $players = Player::with(['country']);
        $countries = Country::all();
        return view('pages.players.create', ['players' => $players, 'countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'description' => 'required',
            'retired' => 'required',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);


        $player = new Player();
        $player->name = $request->name;
        $player->address = $request->address;
        $player->country_id = $request->country_id;
        $player->description = $request->description;
        $player->retired = $request->retired;
        $player->save();

        //If we have an image file, we store it, and move it in the database
        if ($request->file('image')) {
            // Get Image File
            $imagePath = $request->file('image');
            // Define Image Name
            $imageName = $player->id . '_' . time() . '_' . $imagePath->getClientOriginalName();
            // Save Image on Storage
            $path = $request->file('image')->storeAs('images/players/' . $player->id, $imageName, 'public');
            //Save Image Path
            $player->image = $path;
        }
        $player->save();

        return redirect('players')->with('status', 'Item created successfully!');
    }


    public function importView(Request $request)
    {
        return view('importFile');
    }

    public function import(Request $request)
    {
        Excel::import(new ImportPlayer,
            request()->file('file'));
        return redirect()->back();
    }

    public function exportPlayers(Request $request)
    {
        return Excel::download(new ExportPlayer, 'players.xlsx');
    }

    /*
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        $players = Player::with(['country']);

        $countries = Country::all();
        return view('pages.players.show', ['player' => $player, 'countries' => $countries]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Player $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $players = Player::with(['country']);
        $countries = Country::all();
        return view('pages.players.edit', ['player' => $player, 'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Player $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $player->update($request->all());
        return redirect('players')->with('status', 'Item edited successfully!');


        $player = Player::find($player->id);
        $player->name = $request->name;
        $player->address = $request->address;
        $player->country_id = $request->country_id;
        $player->description = $request->description;
        $player->retired = $request->retired;
        $player->save();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Player $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        Storage::deleteDirectory('public/images/players/' . $player->id);
        //Storage::delete('public/' . $player->image);

        $player->delete();
        return redirect('players')->with('status', 'Item deleted successfully!');;
    }
}
