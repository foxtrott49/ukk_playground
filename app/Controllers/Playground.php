<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Playground extends BaseController
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
    public function permainan()
    {
        if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();
        $on='permainan.maker_permainan=user.id_user';
        $data['data']=$model->fusionOderBy('permainan', 'user', $on, 'tanggal_permainan');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('playground/permainan/permainan');
        echo view('layout/footer'); 

        
    }

    public function tambah_permainan()
    {

        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
        $model=new M_model();
        $nama_permainan=$this->request->getPost('nama_permainan');
        $harga_permainan=$this->request->getPost('harga_permainan');
        $maker_permainan=session()->get('id');
        $data=array(

            'nama_permainan '=>$nama_permainan,
            'harga_permainan'=>$harga_permainan,
            'maker_permainan'=>$maker_permainan
        );
        
        $model->simpan('permainan',$data);
        return redirect()->to('/Playground/permainan');
    }

    public function edit_permainan($id)
    {
        if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();
        $where2=array('permainan.id_permainan '=>$id);

        $on='permainan.maker_permainan=user.id_user';
        $data['data']=$model->fusionRow('permainan', 'user',$on, $where2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('playground/permainan/edit_permainan');
        echo view('layout/footer');

        
    }

    public function aksi_edit_permainan()
    {

        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
        $model=new M_model();
        $id=$this->request->getPost('id');
        $nama_permainan=$this->request->getPost('nama_permainan');
        $harga_permainan=$this->request->getPost('harga_permainan');
        $maker_permainan=session()->get('id');

        $data=array(
            'nama_permainan'=>$nama_permainan,
            'harga_permainan'=>$harga_permainan,
            'maker_permainan'=>$maker_permainan
        );

        $where=array('id_permainan'=>$id);
        $model->edit('permainan',$data,$where);
        return redirect()->to('/Playground/permainan');
    }

    public function hapus_permainan($id)
    {
        if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();
        $where=array('id_permainan '=>$id);
        $model->hapus('permainan',$where);
        return redirect()->to('/Playground/permainan');

        
    }

    public function pembelian_tiket()
    {
        if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();
        $where2=array('username'=>session()->get('username'));

        $on='playground.id_permainan_playground=permainan.id_permainan';
        $on2='playground.maker_playground=user.id_user';
        $data['data']=$model->super('playground', 'permainan' , 'user', $on, $on2 , 'tanggal_playground', $where2);
        $data['pajak'] = $model->pajak('pajak');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        $data['p']=$model->tampil('permainan'); 

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('playground/pembelian_tiket/pembelian_tiket');
        echo view('layout/footer'); 

        
    }

    public function tambah_pembelian_tiket()
    {

        if (!$this->checkAuth()) {
            return redirect()->to(base_url('/home/dashboard'));
        }
        $model = new M_model();
        $id_permainan = $this->request->getPost('id_permainan');
        $nama_anak = $this->request->getPost('nama_anak');
        $nama_ortu = $this->request->getPost('nama_ortu');
        $durasi = $this->request->getPost('durasi');

        $jam_selesai = date('H:i:s', strtotime("+$durasi hour"));

        $total_harga = $this->request->getPost('total_harga');
        $maker_playground = session()->get('id');

        $data = array(
            'id_permainan_playground' => $id_permainan,
            'nama_anak' => $nama_anak,
            'nama_ortu' => $nama_ortu,
            'durasi' => $durasi,
            'jam_selesai' => $jam_selesai,
            'total_harga' => $total_harga,
            'status' => '1',
            'maker_playground' => $maker_playground
        );

        $model->simpan('playground', $data);
        return redirect()->to('/Playground/pembelian_tiket');
    }

    public function hapus_pembelian_tiket($id)
    {
        if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model(); 
        $where=array('id_playground '=>$id);
        $model->hapus('playground',$where);
        return redirect()->to('/Playground/pembelian_tiket');

        
    }

    public function print_pembelian_tiket($id)
    {
        if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();
        $where=array('id_playground '=>$id);
        $on='playground.id_permainan_playground=permainan.id_permainan';
        $data['data'] = $model->fusionRow('playground', 'permainan', $on,$where);
        $data['pajak'] = $model->pajak('pajak');
        echo view('/Playground/pembelian_tiket/nota',$data);
        // print_r($data['data']);
        
    }

    public function pajak_pembelian_tiket()
    {
        if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();
        $data['data'] = $model->pajak('pajak');
        echo view('layout/header');
        echo view('layout/menu');
        echo view('/Playground/pembelian_tiket/pajak',$data);
        echo view('layout/footer');
        // print_r($data['data']);
        
    }

    public function perubahan_pajak_pembelian_tiket()
    {
        if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();
        $pajak =  $this->request->getPost('pajakBaru');
        $cek = $model->pajak('pajak');
        if (empty($cek)){
            $data = array(
                'persen_pajak' => $pajak,
               
            );
    
            $model->simpan('pajak', $data);
        }else{
            $data = array(
                'persen_pajak' => $pajak,
               
            );
    
            $where=array('id_pajak'=> $cek->id_pajak);
        $model->edit('pajak', $data, $where);
        }
        
        return redirect()->to('/Playground/pajak_pembelian_tiket');
        // print_r($pajak);
        
    }
}
