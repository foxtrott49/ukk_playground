<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;

class Laporan extends BaseController
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
       

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('laporan/filter');
        echo view('layout/footer');

        
    }

    public function print()
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data['data']=$model->filter_income('playground',$awal,$akhir);
        echo view('laporan/kertas_laporan',$data);

        
    }

    public function pdf()
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data['data']=$model->filter_income('playground',$awal,$akhir);

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('laporan/kertas_laporan',$data));
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment'=>false));
        exit();    

        
    }

    public function excel()
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model = new M_model();
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $data = $model->filter_income('playground', $awal, $akhir);

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Tanggal')
            ->setCellValue('B1', 'Nama Permainan')
            ->setCellValue('C1', 'Nama Anak')
            ->setCellValue('D1', 'Nama Orang Tua')
            ->setCellValue('E1', 'Harga');

        $styleArrayHeader = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['rgb' => 'C0C0C0'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A1:D1')->applyFromArray($styleArrayHeader);

        $baris = 2;
        $totalIncome = 0;

        foreach ($data as $item) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $baris, ucwords(strtolower($item->tanggal_laporan)))
                ->setCellValue('B' . $baris, ucwords(strtolower($item->nama_permainan)))
                ->setCellValue('C' . $baris, ucwords(strtolower($item->nama_anak)))
                ->setCellValue('D' . $baris, ucwords(strtolower($item->nama_ortu)))
                ->setCellValue('E' . $baris, ucwords(strtolower('Rp ' . $item->total_harga . ',00')));

            $styleArrayData = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ];

            $spreadsheet->getActiveSheet()->getStyle('A' . $baris . ':D' . $baris)->applyFromArray($styleArrayData);

            $totalIncome += $item->total_harga; 
            $baris++;
        }

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('D' . $baris, 'Total Pemasukan:')
            ->setCellValue('E' . $baris, 'Rp ' . $totalIncome . '.000,00');

        $styleArrayTotal = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['rgb' => 'FFFF00'], 
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('C' . $baris . ':E' . $baris)->applyFromArray($styleArrayTotal);

        foreach (range('A', 'D') as $col) {
            $spreadsheet->getActiveSheet()->getbarisDimension($col)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan Pemasukan Playground';

        header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');

        
    }

    public function pengeluaran()
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $data['foto']=$model->getRow('user',$where);
        $on='pengeluaran.maker_pengeluaran= pegawai.id_pegawai_user';
        $data['data']=$model->fusionOderBy('pengeluaran', 'pegawai', $on, 'id_pengeluaran');

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('laporan/pengeluaran');
        echo view('layout/footer');

        
    }

    public function tambah_pengeluaran()
    {
        $tujuan_pengeluaran=$this->request->getPost('tujuan_pengeluaran');
        $jumlah_pengeluaran=$this->request->getPost('jumlah_pengeluaran');
        $maker_pengeluaran=session()->get('id');

        $pengeluaran=array(
            'tujuan_pengeluaran'=>$tujuan_pengeluaran,
            'jumlah_pengeluaran'=>$jumlah_pengeluaran,
            'maker_pengeluaran'=>$maker_pengeluaran,
        );

        $model=new M_model();
        $model->simpan('pengeluaran', $pengeluaran);
        return redirect()->to('/laporan/pengeluaran');
    }  

    public function hapus_pengeluaran($id)
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();
        $where2=array('id_pengeluaran'=>$id);
       
        $model->hapus('pengeluaran',$where2);
        return redirect()->to('/laporan/pengeluaran');

        
    }


    public function print_pengeluaran()
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data['data']=$model->filter_outcome('pengeluaran',$awal,$akhir);
        echo view('laporan/laporan_pengeluaran',$data);

        
    }

    public function pdf_pengeluaran()
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data['data']=$model->filter_outcome('pengeluaran',$awal,$akhir);

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('laporan/laporan_pengeluaran',$data));
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment'=>false));
        exit();    

        
    }

    public function excel_pengeluaran()
    {
    if (!$this->checkAuth()) {
        return redirect()->to(base_url('/home/dashboard'));
    }

        $model = new M_model();
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $data = $model->filter_outcome('pengeluaran', $awal, $akhir);

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Tanggal')
            ->setCellValue('B1', 'Tujuan Pengeluaran')
            ->setCellValue('C1', 'Maker')
            ->setCellValue('D1', 'Jumlah Pengeluaran');

        $styleArrayHeader = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['rgb' => 'C0C0C0'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A1:D1')->applyFromArray($styleArrayHeader);

        $baris = 2;
        $totalIncome = 0;

        foreach ($data as $item) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $baris, ucwords(strtolower($item->tanggal_pengeluaran)))
                ->setCellValue('B' . $baris, ucwords(strtolower($item->tujuan_pengeluaran)))
                ->setCellValue('C' . $baris, ucwords(strtolower($item->nama_pegawai)))
                ->setCellValue('D' . $baris, ucwords(strtolower('Rp ' . $item->jumlah_pengeluaran . ',00')));

            $styleArrayData = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ];

            $spreadsheet->getActiveSheet()->getStyle('A' . $baris . ':D' . $baris)->applyFromArray($styleArrayData);

            $totalPengeluaran += $item->jumlah_pengeluaran; 
            $baris++;
        }

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $baris, 'Total Pengeluaran:')
            ->setCellValue('D' . $baris, 'Rp ' . $totalPengeluaran . '.000,00');

        $styleArrayTotal = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['rgb' => 'FFFFFF'], 
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('C' . $baris . ':D' . $baris)->applyFromArray($styleArrayTotal);

        foreach (range('A', 'D') as $col) {
            $spreadsheet->getActiveSheet()->getbarisDimension($col)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan Pengeluaran Playground';

        header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');

        
    }
}