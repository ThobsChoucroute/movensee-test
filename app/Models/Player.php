<?php

namespace App\Models;

use App\Enums\Role;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        "lastname",
        "firstname",
        "birth_date",
        "arrived_at",
        "strong_foot",
        "role",
    ];

    protected $casts = [
        "role" => Role::class,
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public static function table()
    {
        $players = self::orderBy("lastname");
        $filterByTeam = request()->filterByTeam;
        $filterByRole = request()->filterByRole;

        if ($filterByTeam) {
            $players = $players->whereHas("teams", function (Builder $query) use ($filterByTeam) {
                $query->where("teams.id", $filterByTeam);
            });
        }

        if ($filterByRole) {
            $players = $players->where("role", $filterByRole);
        }

        return $players
            ->paginate(15)
            ->withQueryString()
            ->through(function ($player) {
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
    }
}
