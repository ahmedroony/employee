<?php
namespace App\Http\Domains\Shifts\Repositories;
interface ShiftRepositoryInterface{
    public function getAllShifts();
    public function findId($id);
    public function storeShifts(array $data);
    public function updateShift($id, array $data);
    public function deleteShift($id);
}
