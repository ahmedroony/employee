<?php

namespace App\Http\Domains\Admin\Actions;
use App\Http\Domains\Admin\Repositories\UserRepository;
class AdminService
{
    //property for all class
    protected $UserRepository;
    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }
    public function index() {
        return $this->UserRepository->getAllUsers();
    }
}
