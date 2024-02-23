<?php

namespace App\Controllers;

class Dashboard extends BaseController {
    public function index(): string {
        $data = [
            'current_page' => 'dashboard'
        ];
        return view('dashboard', $data);
    }
}
