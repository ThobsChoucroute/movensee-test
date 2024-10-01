<?php

use App\Enums\Role;

// index
it("can list all players", function (int $numberOfPlayers) {
    $players = factoryPlayers($numberOfPlayers);

    $this->get(route("api.players.index"))
        ->assertOk()
        ->assertJson([
            "message" => "",
            "data" => $players->toArray(),
        ]);
})->with([
    50,
    32,
    11,
]);

// index_paginate
it("can list all paginated players", function (int $itemsPerPage) {
    $players = factoryPlayers(50);

    $this->get(route("api.players.index", $itemsPerPage))
        ->assertOk()
        ->assertJson([
            "message" => "",
            "data" => $players->toArray(),
        ]);
})->with([
    15,
    23,
    57,
]);

// show
it("can show one player", function () {
    $player = factoryPlayers();

    $this->get(route("api.players.show", $player->id))
        ->assertOk()
        ->assertJson([
            "message" => "",
            "data" => $player->toArray(),
        ]);
});

it("[show] can show an error message if id doesn't exist", function () {
    $this->get(route("api.players.show", 12344583746))
        ->assertInternalServerError()
        ->assertJson([
            "message" => __("Something went wrong..."),
            "data" => [],
        ]);
});

// store
it("can create a player", function (string $strong_foot, Role $role) {
    $data = [
        "lastname" => fake()->lastname(),
        "firstname" => fake()->firstname(),
        "birth_date" => fake()->date(),
        "arrived_at" => fake()->date(),
        "strong_foot" => $strong_foot,
        "role" => $role->value,
    ];

    $this->post(route("api.players.store"), $data)
        ->assertCreated()
        ->assertJson([
            "message" => __("Player successfully added !"),
            "data" => $data,
        ]);
})->with([
    ["right", Role::ATTAQUANTE],
    ["both", Role::GARDIENNE],
    ["left", Role::BENEVOLE],
]);

it("can't create a player with a missing attribute", function (string $strong_foot, Role $role) {
    $data = [
        "lastname" => fake()->lastname(),
        "firstname" => fake()->firstname(),
        "birth_date" => fake()->date(),
        "strong_foot" => $strong_foot,
        "role" => $role->value,
    ];

    $this->post(route("api.players.store"), $data)
        ->assertUnprocessable()
        ->assertJson([
            "message" => __("Something went wrong..."),
            "data" => [
                "arrived_at" => [
                    "The arrived at field is required.",
                ],
            ],
        ]);
})->with([
    ["right", Role::ATTAQUANTE],
    ["both", Role::GARDIENNE],
    ["left", Role::BENEVOLE],
]);

it("can't create a player without a non-existing role", function (string $strong_foot, string $role) {
    $data = [
        "lastname" => fake()->lastname(),
        "firstname" => fake()->firstname(),
        "birth_date" => fake()->date(),
        "arrived_at" => fake()->date(),
        "strong_foot" => $strong_foot,
        "role" => "dlskjdsqdkjhjsqkdljksh",
    ];

    $this->post(route("api.players.store"), $data)
        ->assertUnprocessable()
        ->assertJson([
            "message" => __("Something went wrong..."),
            "data" => [
                "role" => [
                    "The selected role is invalid.",
                ],
            ],
        ]);
})->with([
    ["right", "pilote"],
    ["both", "catapulte"],
    ["left", "saucisson sec au comté"],
]);

// update
it("can update a player", function () {
    $player = factoryPlayers(options: [
        "lastname" => fake()->lastname(),
        "firstname" => fake()->firstname(),
        "birth_date" => fake()->date(),
        "arrived_at" => fake()->date(),
        "strong_foot" => "right",
        "role" => Role::GARDIENNE->value,
    ]);

    $data = [
        "lastname" => "Ballopié",
        "firstname" => "Jacqueline",
        "birth_date" => "1998-01-02",
        "arrived_at" => $player->arrived_at,
        "strong_foot" => "both",
        "role" => Role::ATTAQUANTE->value,
    ];

    $this->put(route("api.players.update", $player->id), $data)
        ->assertOk()
        ->assertJson([
            "message" => __("Player successfully updated !"),
            "data" => $data,
        ]);
});

it("can't update a player with a missing attribute ", function () {
    $player = factoryPlayers(options: [
        "lastname" => fake()->lastname(),
        "firstname" => fake()->firstname(),
        "birth_date" => fake()->date(),
        "arrived_at" => fake()->date(),
        "strong_foot" => "right",
        "role" => Role::GARDIENNE->value,
    ]);

    $data = [
        "lastname" => "Ballopié",
        "firstname" => "Jacqueline",
        "birth_date" => "1998-01-02",
        "strong_foot" => "both",
        "role" => Role::ATTAQUANTE->value,
    ];

    $this->put(route("api.players.update", $player->id), $data)
        ->assertUnprocessable()
        ->assertJson([
            "message" => __("Something went wrong..."),
            "data" => [
                "arrived_at" => [
                    "The arrived at field is required.",
                ],
            ],
        ]);
});

it("can't update a player with a non-existing role", function () {
    $player = factoryPlayers(options: [
        "lastname" => fake()->lastname(),
        "firstname" => fake()->firstname(),
        "birth_date" => fake()->date(),
        "arrived_at" => fake()->date(),
        "strong_foot" => "right",
        "role" => Role::GARDIENNE->value,
    ]);

    $data = [
        "lastname" => "Ballopié",
        "firstname" => "Jacqueline",
        "birth_date" => "1998-01-02",
        "strong_foot" => "both",
        "role" => "ahhhhhhhhhhhhhhhhhhhhhhhhhh",
    ];

    $this->put(route("api.players.update", $player->id), $data)
        ->assertUnprocessable()
        ->assertJson([
            "message" => __("Something went wrong..."),
            "data" => [
                "role" => [
                    "The selected role is invalid.",
                ],
            ],
        ]);
});

it("[update] can show an error message if id doesn't exist", function () {
    $this->get(route("api.players.update", 12344583746))
        ->assertInternalServerError()
        ->assertJson([
            "message" => __("Something went wrong..."),
            "data" => [],
        ]);
});

// delete
it("can delete a player", function () {
    $player = factoryPlayers();

    $this->delete(route("api.players.destroy", $player->id))
        ->assertOk()
        ->assertJson([
            "message" => __("Player successfully deleted !"),
            "data" => [],
        ]);
});

it("can't delete a non-existing player", function () {
    $this->delete(route("api.players.destroy", 12344583746))
        ->assertInternalServerError()
        ->assertJson([
            "message" => __("Something went wrong..."),
            "data" => [],
        ]);
});
