<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends BaseModel
{
    public $year;

    public function __construct(string $name)
    {
        parent::__construct($name);
    }
}
