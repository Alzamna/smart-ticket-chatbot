<?php namespace App\Controllers;

use App\Models\AdminModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('admin/auth/login'); 
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (!$username || !$password) {
            return redirect()->to('/b0/login');
        }

        $adminModel = new AdminModel();
        $admin = $adminModel->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            session()->set([
                'admin_id' => $admin['id_admin'],
                'username' => $admin['username'],
                'role'     => $admin['role'],
                'logged_in'=> true
            ]);
            $adminModel->update($admin['id_admin'], ['last_login' => date('Y-m-d H:i:s')]);
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/b0/login');
    }
}
