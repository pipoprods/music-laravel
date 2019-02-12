<?php

namespace App\Services;

use MPD;

class MPDService
{
    private $mpc;

    public function artists()
    {
        $this->mpc || $this->connect();
        return ($this->mpc->list_artists());
    }

    private function connect()
    {
        $this->mpc = new MPD(env('MPD_HOST', 'localhost'), env('MPD_PORT', 6600));
    }
}

?>
