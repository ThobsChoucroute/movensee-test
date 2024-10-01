<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Players\StorePlayerRequest;
use App\Http\Requests\Players\UpdatePlayerRequest;
use App\Models\Player;

class PlayerController extends Controller
{
    public function index()
    {
        return response()->json([
            "message" => "",
            "data" => Player::all(),
        ], 200);
    }

    public function index_paginate(int $itemsPerPage)
    {
        return response()->json([
            "message" => "",
            "data" => Player::orderBy("lastname")->paginate(15),
        ], 200);
    }

    public function store(StorePlayerRequest $request)
    {
        $player = Player::create([
            "lastname" => $request->lastname,
            "firstname" => $request->firstname,
            "birth_date" => $request->birth_date,
            "arrived_at" => $request->arrived_at,
            "strong_foot" => $request->strong_foot,
            "role" => $request->role,
        ]);

        return response()->json([
            "message" => __("Player successfully added !"),
            "data" => $player,
        ], 201);
    }

    public function show(Player $player)
    {
        return response()->json([
            "message" => "",
            "data" => $player,
        ], 200);
    }

    public function update(UpdatePlayerRequest $request, Player $player)
    {
        $player = $player->update([
            "lastname" => $request->lastname,
            "firstname" => $request->firstname,
            "birth_date" => $request->birth_date,
            "arrived_at" => $request->arrived_at,
            "strong_foot" => $request->strong_foot,
            "role" => $request->role,
        ]);

        return response()->json([
            "message" => __("Player successfully updated !"),
            "data" => $player,
        ], 200);
    }

    public function destroy(Player $player)
    {
        $player->delete();

        return response()->json([
            "message" => __("Player successfully deleted !"),
            "data" => [],
        ], 200);
    }
}
