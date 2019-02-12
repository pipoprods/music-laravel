<?php

namespace App\Services;

use MPD;
use App\Models\Artist;
use App\Models\Album;

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

    public function albums(string $artist, int $count = null, int $offset = null)
    {
        $this->mpc || $this->connect();

        $albums = $this->mpc->parse_list($this->mpc->cmd('list', array('album', 'artist', $artist)));
        $albums = array_map(
                function($a) { return new Album($a); },
                (isset($count) && isset($offset)) ? array_slice($albums, $offset * $count, $count) : $albums
            );
        for($i=0; $i<count($albums); $i++)
        {
            $year = $this->mpc->parse_list($this->mpc->cmd('list', array('date', 'artist', $artist, 'album', $albums[$i]->name)));
            $albums[$i]->year = count($year) ? $year[0] : '';
        }

        return $albums;
    }

    private function connect()
    {
        $this->mpc = new MPD(env('MPD_HOST', 'localhost'), env('MPD_PORT', 6600));
    }
}

?>
