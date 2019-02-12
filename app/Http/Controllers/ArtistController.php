<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\MPDService;

class ArtistController extends Controller
{
    public function count(MPDService $mpc)
    {
        return count($mpc->artists());
    }
}
