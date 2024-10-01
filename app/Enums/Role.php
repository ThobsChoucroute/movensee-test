<?php

namespace App\Enums;

enum Role: string {
    case ATTAQUANTE = "attaquante";
    case MILIEU = "milieu";
    case DEFENSEURE = "defenseure";
    case GARDIENNE = "gardienne";
    case ARBITRE = "arbitre";
    case BENEVOLE = "benevole";
}
