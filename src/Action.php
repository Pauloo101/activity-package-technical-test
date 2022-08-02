<?php

declare(strict_types=1);

namespace Activity;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    // TODO: Write logic for actions model

    protected $guarded = [];

    public function getDescription():string
    {
        return $this->description;
    }
}
