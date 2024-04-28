<?php

namespace App\Domain\Interfaces\Repositories\Backoffice;

interface ITouristRepository
{
    public function fetch($id);
    
    public function findOrFail($id);
}
