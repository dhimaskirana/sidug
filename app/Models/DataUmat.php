<?php

namespace App\Models;

use CodeIgniter\Model;

class DataUmat extends Model {
	protected $table            = 'data_umat';
	protected $primaryKey       = 'id';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = [
		'user_id',
		'nama_lengkap',
		'nik',
		'nokk',
		'tempat_lahir',
		'tanggal_lahir',
		'jenis_kelamin',
		'golongan_darah',
		'alamat',
		'no_hp',
	];

	protected bool $allowEmptyInserts = false;

	// Dates
	protected $useTimestamps = true;
	protected $dateFormat    = 'datetime';
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';

	// Validation
	protected $validationRules      = [
		'nama_lengkap' => 'required',
		'nik' => 'required|integer',
		'nokk' => 'required|integer',
		'tempat_lahir' => 'required',
		'tanggal_lahir' => 'required',
		'jenis_kelamin' => 'required',
		'golongan_darah' => 'required',
		'alamat' => 'required',
		'no_hp' => 'required|integer',
	];
	protected $validationMessages   = [
		'nama_lengkap' => ['required' => 'Wajib dilengkapi.'],
		'nik' => ['required' => 'Wajib dilengkapi.', 'integer' => 'Format NIK harus angka.'],
		'nokk' => ['required' => 'Wajib dilengkapi.', 'integer' => 'Format No KK harus angka.'],
		'tempat_lahir' => ['required' => 'Wajib dilengkapi.'],
		'tanggal_lahir' => ['required' => 'Wajib dilengkapi.'],
		'jenis_kelamin' => ['required' => 'Wajib dilengkapi.'],
		'golongan_darah' => ['required' => 'Wajib dilengkapi.'],
		'alamat' => ['required' => 'Wajib dilengkapi.'],
		'no_hp' => ['required' => 'Wajib dilengkapi.', 'integer' => 'Format nomor HP harus angka.'],
	];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks = true;
	protected $beforeInsert   = [];
	protected $afterInsert    = [];
	protected $beforeUpdate   = [];
	protected $afterUpdate    = [];
	protected $beforeFind     = [];
	protected $afterFind      = [];
	protected $beforeDelete   = [];
	protected $afterDelete    = [];

	function data_saya() {
		return $this->asObject()->where('user_id', user_id())->first();
	}

	function klaim_data_saya($nik) {
		if (empty($this->where('nik', $nik)->get()->getResult())) {
			$this->insert(array_merge(['user_id' => user_id(), 'nik' => $nik]));
			return redirect()->back()->with('message', 'Data umat berhasil di buat!');
		} else {
			$this->where('nik', $nik)->set(['user_id' => user_id()])->update();
			return redirect()->back()->with('message', 'Data umat berhasil di klaim!');
		}
	}

	function simpan_data($data, $id) {
		$data = [
			'nama_lengkap' => $data->getPost('nama_lengkap'),
			'nik' => $data->getPost('nik'),
			'nokk' => $data->getPost('nokk'),
			'tempat_lahir' => $data->getPost('tempat_lahir'),
			'tanggal_lahir' => $data->getPost('tanggal_lahir'),
			'jenis_kelamin' => $data->getPost('jenis_kelamin'),
			'golongan_darah' => $data->getPost('golongan_darah'),
			'alamat' => $data->getPost('alamat'),
			'no_hp' => $data->getPost('no_hp'),
		];

		if ($id == null) {
			$this->insert($data);
			return redirect()->route('DataUmat::index')->with('message', 'User berhasil ditambahkan!');
		}

		$this->where('id', $id)->set($data)->update();
		return redirect()->back()->with('message', 'User berhasil diupdate!');
	}

	function getStatistikDataUmat() {
		$db = \Config\Database::connect();
		$data_umur = $db->table('data_umat')->select('id, tanggal_lahir')->get()->getResultObject();
		foreach ($data_umur as $umat) {
			$umur = (date('Y') - date('Y', strtotime($umat->tanggal_lahir)));
			if (in_array($umur, range(0, 5))) {
				$data_umur_umat_sementara[$umat->id] = 'balita';
			}
			if (in_array($umur, range(6, 11))) {
				$data_umur_umat_sementara[$umat->id] = 'anak';
			}
			if (in_array($umur, range(12, 25))) {
				$data_umur_umat_sementara[$umat->id] = 'remaja';
			}
			if (in_array($umur, range(26, 45))) {
				$data_umur_umat_sementara[$umat->id] = 'dewasa';
			}
			if (in_array($umur, range(46, 65))) {
				$data_umur_umat_sementara[$umat->id] = 'lansia';
			}
		}
		foreach (array_count_values($data_umur_umat_sementara) as $key => $value) {
			$data_umur_umat[] = [
				'x' => $key,
				'y' => $value
			];
		}
		return [
			'jumlah_umat' => $this->get()->getNumRows(),
			'jumlah_laki_laki' => $this->where('jenis_kelamin', 'LAKI-LAKI')->get()->getNumRows(),
			'jumlah_perempuan' => $this->where('jenis_kelamin', 'PEREMPUAN')->get()->getNumRows(),
			'golongan_darah' => [
				[
					'x' => 'A',
					'y' => $this->where('golongan_darah', 'A')->get()->getNumRows()
				],
				[
					'x' => 'B',
					'y' => $this->where('golongan_darah', 'B')->get()->getNumRows()
				],
				[
					'x' => 'AB',
					'y' => $this->where('golongan_darah', 'AB')->get()->getNumRows()
				],
				[
					'x' => 'O',
					'y' => $this->where('golongan_darah', 'O')->get()->getNumRows()
				],
			],
			'umur_umat' => $data_umur_umat
		];
	}
}
