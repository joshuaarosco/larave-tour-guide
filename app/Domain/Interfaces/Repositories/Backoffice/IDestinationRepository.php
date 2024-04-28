<?php

namespace App\Domain\Interfaces\Repositories\Backoffice;

interface IDestinationRepository
{
    public function fetch();
    
    public function findOrFail($id);
}
