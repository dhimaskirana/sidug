<?php

namespace App\Controllers;

use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Models\UserModel;

class Pengguna extends BaseController {
    public function index(): string {
        $users = new UserModel();
        $data = [
            'current_page' => 'pengguna',
            'users' => $users->findAll()
        ];
        return view('pengguna/index', $data);
    }

    public function tambah() {
        if ($this->request->getPost()) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['username' => 'required', 'email' => 'required', 'password' => 'required', 'repeat_password' => 'required|matches[password]', 'roles' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $users = auth()->getProvider();

                $user = new User([
                    'username' => $this->request->getPost('username'),
                    'email'    => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                ]);
                $users->save($user);

                // To get the complete user object with ID, we need to get from the database
                $user = $users->findById($users->getInsertID());

                if ($this->request->getPost('roles') == 'admin') {
                    $user->addGroup('admin');
                } else {
                    // Add to default group
                    $users->addToDefaultGroup($user);
                }

                return redirect()->route('Pengguna::index')->with('message', 'User berhasil dibuat!');
            } else {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
        }

        $data = [
            'current_page' => 'pengguna'
        ];
        return view('pengguna/tambah', $data);
    }

    public function edit($id) {
        $users = auth()->getProvider();
        $user = $users->findById($id);

        if ($this->request->getPost()) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['username' => 'required', 'email' => 'required', 'roles' => 'required']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                foreach ($user->getGroups() as $role) {
                    $user->removeGroup($role);
                }
                $user->fill([
                    'username' => $this->request->getPost('username'),
                    'email'    => $this->request->getPost('email'),
                ]);

                if ($this->request->getPost('roles') == 'admin') {
                    $user->addGroup('admin');
                } else {
                    // Add to default group
                    $users->addToDefaultGroup($user);
                }

                $users->save($user);
                return redirect()->back()->with('message', 'User berhasil diupdate!');
            } else {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
        }

        $data = [
            'current_page' => 'pengguna',
            'user' => $user
        ];
        return view('pengguna/edit', $data);
    }

    public function update_password($id) {
        $users = auth()->getProvider();
        $user = $users->findById($id);

        if ($this->request->getPost()) {
            $validation =  \Config\Services::validation();
            $validation->setRules(['password' => 'required', 'repeat_password' => 'required|matches[password]']);
            $isDataValid = $validation->withRequest($this->request)->run();

            if ($isDataValid) {
                $user->fill([
                    'password' => $this->request->getPost('password')
                ]);
                $users->save($user);
                return redirect()->back()->with('message', 'Password user berhasil diupdate!');
            } else {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
        }

        $data = [
            'current_page' => 'pengguna',
            'user' => $user
        ];
        return view('pengguna/update-password', $data);
    }

    public function delete($id) {
        $users = auth()->getProvider();
        $users->delete($id, true);
        return redirect()->route('Pengguna::index')->with('message', 'User berhasil dihapus!');
    }
}
