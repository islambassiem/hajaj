<?php

namespace App\Traits;

trait Load
{
    public $limit = 6;

    public function load()
    {
        $this->limit += 3;
    }
}
