<?php

namespace App\Services;

use MPD;
use App\Models\Artist;

class MPDService
{
    private $mpc;

    public function artists(int $count = null, int $offset = null)
    {
        $this->mpc || $this->connect();
        $artists = $this->mpc->list_artists();
        return array_map(
                function($a) { return new Artist($a); },
                (isset($count) && isset($offset)) ? array_slice($artists, $offset * $count, $count) : $artists
            );
    }

    private function connect()
    {
        $this->mpc = new MPD(env('MPD_HOST', 'localhost'), env('MPD_PORT', 6600));
    }
}

?>
