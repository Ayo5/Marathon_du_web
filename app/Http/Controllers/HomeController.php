<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function show(int $id): View {
        $histoire = Histoire::find($id);
        return view('home.show', ['histoire' => $histoire]);
    }
}
