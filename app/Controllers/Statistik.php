<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DataUmat as ModelDataUmat;

class Statistik extends BaseController {

    protected $DataUmat;

    function __construct() {
        $this->DataUmat = new ModelDataUmat();
    }

    public function index() {
        $data = [
            'current_page' => 'statistik',
            'data_statistik' => $this->DataUmat->getStatistikDataUmat()
        ];
        return view('statistik/index', $data);
    }
}
