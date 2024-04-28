<?php

namespace App\Domain\Interfaces\Repositories\Backoffice;

interface ITourRepository
{
    public function fetch();
    
    public function findOrFail($id);
}
