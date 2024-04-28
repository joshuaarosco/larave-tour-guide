<?php

namespace App\Domain\Interfaces\Repositories\Backoffice;

interface IMessageRepository
{
    public function fetch();
    
    public function findOrFail($id);
}
