<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::orderBy("lastname")->paginate(15)->through(function ($player) {
            $arrivedAt = new Carbon($player->arrived_at);
            return [
                "id" => $player->id,
                "lastname" => $player->lastname,
                "firstname" => $player->firstname,
                "strong_foot" => Str::ucFirst($player->strong_foot),
                "role" => Str::ucFirst($player->role->value),
                "arrived_at" => $arrivedAt->format("d/m/Y"),
            ];
        });

        return Inertia::render("Players/Index", [
            "players" => $players,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        return Inertia::render("Players/Show", [
            "player" => $player,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
