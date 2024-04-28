<?php

namespace App\Domain\Interfaces\Repositories\Backoffice;

interface ITourGuideRepository
{    
    public function findOrFail($id);
}
