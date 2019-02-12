<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends BaseModel
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }
}
