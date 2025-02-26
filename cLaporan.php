<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mLaporan');
        $this->load->model('mKelolaData');
    }


    public function index()
    {
        $data = array(
            'asset' => $this->mLaporan->asset(),
            'pengaduan' => $this->mLaporan->pengaduan(),
            'kategori' => $this->mKelolaData->select_kategori()
        );
        $this->load->view('TimTI/Layout/head');
        $this->load->view('TimTI/Layout/aside');
        $this->load->view('TimTI/vLaporan', $data);
        $this->load->view('TimTI/Layout/footer');
    }
    public function cetak_laporan()
    {
        require('asset/fpdf/fpdf.php');

        // intance object dan memberikan pengaturan halaman PDF
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();


        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(200, 10, 'Lampiran', 0, 1, 'L');

        $pdf->SetFont('Times', 'B', 12);

        $pdf->Cell(200, 10, 'Laporan Pengaduan', 0, 1, 'L');
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(200, 10, 'Nomor : ', 0, 1, 'L');
        $pdf->Cell(200, 10, 'Tanggal :' . date('d/m/Y'), 0, 1, 'L');

        $pdf->SetFont('Times', 'B', 13);
        $pdf->Cell(200, 10, 'LAPORAN HASIL PERBAIKAN BARANG', 0, 1, 'C');




        $pdf->Cell(10, 15, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(10, 7, 'NO', 1, 0, 'C');
        $pdf->Cell(35, 7, 'Jenis Barang', 1, 0, 'C');
        $pdf->Cell(40, 7, 'Kode Barang', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Merk/Type', 1, 0, 'C');

        $pdf->SetFont('Times', '', 9);
        $no = 1;
        $tot = 0;
        $kategori = $this->input->post('kategori');
        $asset = $this->mLaporan->asset_kategori($kategori);
        foreach ($asset as $key => $value) {
            $pdf->Cell(10, 7, $no++, 1, 0, 'C');
            $pdf->Cell(35, 7, $value->nama_barang, 1, 0, 'C');
            $pdf->Cell(40, 7, $value->no_asset, 1, 0, 'C');
            $pdf->Cell(30, 7, $value->merk, 1, 0, 'C');
        }


        $pdf->SetFont('Times', 'B', 12);
        

        $pdf->SetFont('Times', 'I', 9);
        $pdf->Cell(40, 7, '', 0, 1, 'C');
        $pdf->Cell(40, 7, '', 0, 1, 'C');
        $pdf->Cell(150, 7, 'Tim TI', 0, 1, 'R');

        $pdf->Cell(150, 7, '1. Rio ', 0, 0, 'R');
        $pdf->Cell(30, 7, '............................', 0, 1, 'R');

        $pdf->Cell(150, 7, '2. Fadli', 0, 0, 'R');
        $pdf->Cell(30, 7, '............................', 0, 1, 'R');
        $pdf->Cell(150, 7, '3. Victor', 0, 0, 'R');
        $pdf->Cell(30, 7, '............................', 0, 1, 'R');
        $pdf->Cell(150, 7, '4. Bimo', 0, 0, 'R');
        $pdf->Cell(30, 7, '............................', 0, 1, 'R');








        $pdf->Output();
    }
}

/* End of file cLaporan.php */
