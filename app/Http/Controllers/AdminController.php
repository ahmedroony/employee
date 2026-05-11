<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Domains\Admin\Actions\AdminService;
class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }
    public function index(){
        $page =  $this->adminService->index();
        return view('admin.Dashboard',$page);
    }
}
