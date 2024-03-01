<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{

    protected function checkAuth()
    {
        $id_user = session()->get('id');
        $level = session()->get('level');
        if ($id_user != null) {
            return true;
        } else {
            return false;
        }
    }
    public function index()
    {
        if ($this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
            $model = new M_model();
            return view('login');
        
    }

    public function aksi_login()
    {
        if ($this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
        $n=$this->request->getPost('username'); 
        $p=$this->request->getPost('password');

        $model= new M_model();
        $data=array(
            'username'=>$n, 
            'password'=>md5($p)
        );
        $cek=$model->getRowArray('user', $data);
        if ($cek>0) {
            $where=array('id_pegawai_user'=>$cek['id_user']);
            $pegawai=$model->getRowArray('pegawai', $where);

                if ($pegawai) { 
                session()->set('id', $cek['id_user']);
                session()->set('username', $cek['username']);
                session()->set('nama_pegawai', $pegawai['nama_pegawai']);
                session()->set('level', $cek['level']);

                return redirect()->to('/Home/dashboard');
                }
            } else {         
        }
        return redirect()->to('/');
    }

    public function logout()
    {
       
            $model = new M_model();
            $id = session()->get('id');

            session()->destroy();
            return redirect()->to('/');
        
    }

    public function dashboard()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home'));
        }

        $model=new M_model();
        $on='playground.id_permainan_playground=permainan.id_permainan';
        $data['data']=$model->dashboard1('playground', 'permainan', $on, 'jam_mulai');

        $data['data2']=$model->dashboard2('playground', 'permainan', $on, 'jam_selesai');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        $data2['foto']=$model->getRow('user',$where);

        echo view ('layout/header');
        echo view ('layout/menu');
        echo view ('dashboard', $data);
        echo view ('layout/footer');

        
    }

    public function edit_status($id_playground)
    {

        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
        if (!$this->request->getPost('edit_status_btn') !== null) {
            $model = new M_model();

            $data = [
                'status' => '2'
            ];

            $where = ['id_playground' => $id_playground];
            $model->edit('playground', $data, $where);

            return redirect()->to('/home/dashboard');
        }
    }
}
