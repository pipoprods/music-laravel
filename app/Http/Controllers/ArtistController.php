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

    public function index(Request $request, MPDService $mpc)
    {
        return $this->formatOutput($mpc->artists($request->input('count'), $request->input('offset')));
    }

    public function albums(Request $request, MPDService $mpc, $id)
    {
        return $this->formatOutput($mpc->albums(rawurldecode($id), $request->input('count'), $request->input('offset')));
    }

    private function formatOutput($data)
    {
        return array_map(
                function ($item) { return get_object_vars($item); },
                $data
            );
    }
}
