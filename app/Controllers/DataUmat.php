<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\DataUmat as ModelDataUmat;

class DataUmat extends BaseController {

    protected $DataUmat;

    function __construct() {
        $this->DataUmat = new ModelDataUmat();
    }

    public function index() {
        $data = [
            'current_page' => 'data_umat',
            'data_umat' => $this->DataUmat->asObject()->findAll()
        ];
        return view('data-umat/index', $data);
    }

    public function tambah() {

        $dataumatbaru = $this->request->getPost();

        if ($dataumatbaru) {
            $save = $this->DataUmat->insert($dataumatbaru);
            if (!$save) {
                return redirect()->back()->withInput()->with('errors', $this->DataUmat->errors());
            } else {
                return redirect()->route('DataUmat::index')->with('message', 'User berhasil ditambahkan!');
            }
        }

        $data = [
            'current_page' => 'data_umat'
        ];
        return view('data-umat/tambah', $data);
    }

    public function data_saya() {

        $dataumat = $this->request->getPost();

        if ($dataumat) {
            if (isset($dataumat['action']) && $dataumat['action'] == 'cek_nik') {
                $this->DataUmat->klaim_data_saya($dataumat['nik']);
            }
        }

        $data = [
            'current_page' => 'data_saya',
            'user' => auth()->user(),
            'data_umat' => $this->DataUmat->data_saya()
        ];

        if ($this->DataUmat->data_saya() == null) {
            return view('data-umat/cek-data', $data);
        }

        return view('data-umat/edit', $data);
    }

    public function edit($id) {

        $dataumatupdate = $this->request->getPost();

        if ($dataumatupdate) {
            $save = $this->DataUmat->update($id, $dataumatupdate);
            if (!$save) {
                return redirect()->back()->withInput()->with('errors', $this->DataUmat->errors());
            } else {
                return redirect()->back()->withInput()->with('message', 'User berhasil diupdate!');
            }
        }

        $data = [
            'current_page' => 'data_umat',
            'data_umat' => $this->DataUmat->asObject()->find($id)
        ];
        return view('data-umat/edit', $data);
    }

    public function delete($id) {
        $this->DataUmat->delete($id, true);
        return redirect()->route('DataUmat::index')->with('message', 'Umat berhasil dihapus!');
    }
}
