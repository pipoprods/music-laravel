<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public $id;
    public $name;

    public function __construct(string $name)
    {
        $this->id = urlencode($name);
        $this->name = $name;
    }
}
