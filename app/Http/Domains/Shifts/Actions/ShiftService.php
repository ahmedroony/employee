<?php

namespace App\Http\Domains\Shifts\Actions;

use App\Http\Domains\Shifts\Repositories\ShiftRepositoryInterface;

class ShiftService
{
    public function __construct(private ShiftRepositoryInterface $repository) {}

    public function getAll()
    {
        return $this->repository->getAllShifts();
    }
    public function findId($id){
        return $this->repository->findId($id);
    }

    public function storeshifts(array $data)
    {
        return $this->repository->storeshifts($data);
    }

    public function update($id, array $data)
    {
        return $this->repository->updateShift($id, $data);
    }
}
