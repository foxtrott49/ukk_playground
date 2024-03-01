<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;

class Profile extends BaseController
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
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
        
        $id=session()->get('id');
        $where2=array('id_user'=>$id);
        $where3=array('id_pegawai_user'=>$id);
        $model=new M_model();
        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);
        $data['use']=$model->getRow('user',$where2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        echo view('layout/header');
        echo view('layout/menu');
        echo view('profile', $data);
        echo view('layout/footer');
    }

    public function ganti_pw()   
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }

        $pass=$this->request->getPost('pw');
        $id=session()->get('id');
        $model= new M_model();

        $data=array( 
            'password'=>md5($pass)
        );

        $where=array('id_user'=>$id);
        $model->edit('user', $data, $where);
        return redirect()->to('/profile');
    }
}
