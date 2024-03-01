<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Data_Pegawai extends BaseController
{

    protected function checkAuth()
    {
        $id_user = session()->get('id');
        $level = session()->get('level');
        if ($id_user != null && $level == 1) {
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

        $model=new M_model();
        $on='pegawai.id_pegawai_user=user.id_user';
        $data['data']=$model->fusionOderBy('pegawai', 'user', $on, 'tanggal_pegawai');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('user/pegawai');
        echo view('layout/footer'); 

        
    }

    public function tambah()
    {
        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
        $nama_pegawai=$this->request->getPost('nama_pegawai');
        $no_telp=$this->request->getPost('no_telp');
        $username=$this->request->getPost('username');
        $level=$this->request->getPost('level');
        $maker_pegawai=session()->get('id');

        $user=array(
            'username'=>$username,
            'password'=>md5('halo#12345'),
            'level'=>$level,
        );

        $model=new M_model();
        $model->simpan('user', $user);
        $where=array('username'=>$username);
        $id=$model->getRowArray('user', $where);
        $iduser = $id['id_user'];

        $pegawai = array(
            'nama_pegawai' => $nama_pegawai,
            'no_telp' => $no_telp,
            'id_pegawai_user' => $iduser,
            'maker_pegawai' => $maker_pegawai,
        );

        $model->simpan('pegawai', $pegawai);
        return redirect()->to('/Data_Pegawai');
    }  

    public function edit($id)
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();
        $where2=array('pegawai.id_pegawai_user'=>$id);

        $on='pegawai.id_pegawai_user=user.id_user';
        $data['data']=$model->fusionRow('pegawai', 'user',$on, $where2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('user/edit_pegawai');
        echo view('layout/footer');

        
    }

    public function aksi_edit()
    {

        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
        $id= $this->request->getPost('id');    
        $username= $this->request->getPost('username');
        $level= $this->request->getPost('level');
        $nama_pegawai= $this->request->getPost('nama_pegawai');
        $no_telp= $this->request->getPost('no_telp');

        $where=array('id_user'=>$id);    
        $where2=array('id_pegawai_user'=>$id);
       
            $user=array(
                'username'=>$username,
                'level'=>$level,
            );
        

        $model=new M_model();
        $model->edit('user', $user,$where);

        $pegawai=array(
            'nama_pegawai'=>$nama_pegawai,
            'no_telp'=>$no_telp,
        );

        $model->edit('pegawai', $pegawai, $where2);
        return redirect()->to('/Data_Pegawai');
    }

    public function hapus($id)
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();
        $where2=array('id_user'=>$id);
        $where=array('id_pegawai_user'=>$id);

        $model->hapus('pegawai',$where);
        $model->hapus('user',$where2);
        return redirect()->to('/Data_Pegawai');

        
    }

    public function reset_password($id)
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();
        $where=array('id_user'=>$id);
        $data=array(
            'password'=>md5('halo#12345')
        );
        $model->edit('user',$data,$where);

        return redirect()->to('/Data_Pegawai');

        
    }
}
