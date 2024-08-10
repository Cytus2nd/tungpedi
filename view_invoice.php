<?php
require('./vendor/setasign/fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 30);
        $this->SetTextColor(0, 128, 0); // Warna hijau
        $this->Cell(100, 20, 'TUNGPEDI', 0, 0, 'L'); // Teks hijau besar di sebelah kiri

        // Menulis Teks INVOICE kecil berwarna hitam di sebelah kanan TUNGPEDI
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(0, 0, 0); // Warna hitam
        $this->Cell(0, 10, 'INVOICE', 0, 1, 'R'); // Teks INVOICE di sebelah kanan, baris yang sama dengan TUNGPEDI

        // Menulis nomor invoice di bawah teks INVOICE
        $this->SetFont('Arial', '', 10);
        $this->SetX(200); // Set posisi X untuk nomor invoice agar berada di bawah INVOICE
        $this->Cell(0, 10, 'INV/20240316/MPL/3795043248', 0, 1, 'R'); // Nomor invoice di sebelah kanan

        // Reset warna teks kembali ke hitam untuk bagian selanjutnya
        $this->SetTextColor(0, 0, 0);
        $this->Ln(10);
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

// Seller Information
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(90, 6, 'DITERBITKAN ATAS NAMA', 0, 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 6, 'UNTUK', 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 6, 'Penjual', 0, 0);
$pdf->Cell(60, 6, ':  Akademi Crypto', 0, 0);
$pdf->Cell(35, 6, 'Pembeli', 0, 0);
$pdf->Cell(0, 6, ':  Hendru Kesuma', 0, 1);

$pdf->Cell(30, 6, 'Pre-order', 0, 0);
$pdf->Cell(60, 6, ':  50 Hari', 0, 0);
$pdf->Cell(35, 7, 'Tanggal Pembelian', 0, 0);
$pdf->Cell(0, 6, ':  15 Maret 2024', 0, 1);

$pdf->Cell(30, 6, '', 0, 0); // Empty cell for alignment
$pdf->Cell(60, 6, '', 0, 0); // Empty cell for alignment
$pdf->Cell(35, 7, 'Alamat Pengiriman', 0, 0);
$pdf->MultiCell(0, 6, ":  Hendru Kesuma (6282785675399)\n   Jln. Handjoyo Putro KM 8\n   Tanjung Pinang, 29125\n   Kepulauan Riau", 0, 1);
$pdf->Ln(8);

// Pricing Info
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(100, 15, 'INFO PRODUK', 'TB', 0);
$pdf->Cell(20, 15, 'JUMLAH', 'TB', 0, 'C');
$pdf->Cell(35, 15, 'HARGA SATUAN', 'TB', 0, 'C');
$pdf->Cell(35, 15, 'TOTAL HARGA', 'TB', 0, 'R');
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(100, 8, "Buku Akademi Crypto | Crypto Trading Guide | Belajar Trading\nBerat : 150gr", 0);
$pdf->SetXY($pdf->GetX() + 100, $pdf->GetY() - 12); // Adjust Y position after MultiCell
$pdf->Cell(20, 8, '1', 0, 0, 'C'); // 'C' untuk Center alignment
$pdf->Cell(35, 8, 'Rp70.000', 0, 0, 'C');
$pdf->Cell(35, 8, 'Rp70.000', 0, 0, 'R');
$pdf->Ln(18);

// Total
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetX(115);
$pdf->Cell(50, 6, 'TOTAL HARGA (1 BARANG) ', 0, 0);
$pdf->Cell(35, 6, 'Rp70.000', 0, 1, 'R');
$pdf->Ln(2);
$pdf->SetFont('Arial', '', 10);
$pdf->SetX(115);
$pdf->Cell(50, 6, 'Total Ongkos Kirim', 0, 0);
$pdf->Cell(35, 6, 'Rp7.000', 0, 1, 'R');
$pdf->Ln(2);
$pdf->SetX(115);
$pdf->Cell(50, 6, 'Biaya Asuransi Pengiriman', 0, 0);
$pdf->Cell(35, 6, 'Rp700', 0, 1, 'R');
$pdf->Ln(2);
$pdf->SetX(115);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'TOTAL BELANJA', 0, 0);
$pdf->Cell(35, 6, 'Rp77.700', 0, 1, 'R');
$pdf->Ln(2);
$pdf->SetX(115);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 6, 'Biaya Layanan', 0, 0);
$pdf->Cell(35, 6, 'Rp1.000', 0, 1, 'R');
$pdf->Ln(2);
$pdf->SetX(115);
$pdf->Cell(50, 6, 'Biaya Jasa Aplikasi', 0, 0);
$pdf->Cell(35, 6, 'Rp1.000', 0, 1, 'R');
$pdf->Ln(2);
$pdf->SetX(115);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'TOTAL TAGIHAN', 0, 0);
$pdf->Cell(35, 6, 'Rp79.700', 0, 1, 'R');
$pdf->Ln(10);

// informasi kirim
$pdf->SetFont('Arial', '', 10);
// Kolom Kiri
$pdf->Cell(105, 8, 'Kurir:', 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(95, 8, 'Metode Pembayaran:', 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(105, 8, 'SiCepat HALU - HALU', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(95, 8, 'BCA Virtual Account', 0, 1, 'L');

$pdf->Cell(105, 8, 'Asuransi Pengiriman Tungpedi', 0, 0, 'L');
$pdf->Cell(95, 8, '', 0, 1, 'L');

$pdf->Cell(105, 8, '', 0, 0, 'L'); // Kosong untuk merapikan baris
$pdf->Cell(95, 8, '', 0, 1, 'L');
$pdf->Ln(3);

// Footer note
$pdf->SetFont('Arial', 'I', 9);
$pdf->Cell(105, 6, 'Invoice ini sah dan diproses oleh komputer', 0, 1);
$pdf->Cell(105, 6, 'Silakan hubungi Tokopedia Care apabila kamu membutuhkan bantuan.', 0, 1);
$pdf->Cell(105, 6, '', 0, 0, 'L');
$pdf->Cell(85, 6, 'Terakhir diupdate: 05 April 2024 12:58 WIB', 0, 1, 'R');

$pdf->Output('I', 'Invoice_tungpedia.pdf');
