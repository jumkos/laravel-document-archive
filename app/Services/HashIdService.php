<?php

namespace App\Services;

use Hashids\Hashids;

class HashIdService
{

    public function __construct(
        public $hashIds = new Hashids('App Arsip Dokumen', 10),
    ) {}

    public function encode($id)
    {
        return $this->hashIds->encode($id);
    }

    public function decode($hashId)
    {
        if(is_int($hashId))
            return -1;
        return $this->hashIds->decode($hashId)[0];
    }
}
