<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\Player;
use App\Models\Team;
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
        $players = Player::table();
        $teams = Team::all();
        $roles = collect(Role::cases())->map(function ($value) {
            return [
                "label" => Str::ucFirst($value->value),
                "value" => $value,
            ];
        });

        return Inertia::render("Players/Index", [
            "players" => fn() => $players,
            "teams" => fn() => $teams,
            "roles" => fn() => $roles,
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
