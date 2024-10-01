<?php

namespace App\Models;

use App\Enums\Role;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
