<?php

namespace App\Domain\Interfaces\Repositories\Backoffice;

interface IBookRepository
{
    public function fetch();
    
    public function findOrFail($id);
}
