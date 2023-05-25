<?php

namespace App\Http\Controllers\Web;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            ['auth:web', 'role:' . RoleEnum::ADMIN->value, 'role:' . RoleEnum::MANAGER->value]
        );
    }

    public function index(): View
    {
        return view('main.index');
    }
}
