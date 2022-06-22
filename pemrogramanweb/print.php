<?php
 require('fpdf/fpdf.php');
 $pdf = new FPDF('L','mm','A4');
 $pdf->SetLeftMargin(20);
 $pdf->AddPage();
 $pdf->SetFont('Arial','B',18);
 $pdf->Cell(0,10,'LAPORAN SEMUA DATA MAHASISWA',0,10,'C');
 $pdf->Cell(10,7,'',0,1,'C');
 $pdf->SetFont('Arial','B',14);
 $pdf->Cell(10,7,'No.',1,0,'C');
 $pdf->Cell(30,7,'NIM',1,0,'C');
 $pdf->Cell(50,7,'Nama Lengkap',1,0,'C');
 $pdf->Cell(50,7,'Alamat',1,0,'C');
 $pdf->Cell(80,7,'Email',1,0,'C');
 $pdf->Cell(40,7,'Telepon',1,1,'C');
 $pdf->SetFont('Arial','',12);
 
 include 'connection.php';
 $no = 1;
 $result = mysqli_query($con, "SELECT * FROM mahasiswa");
 while ($data = mysqli_fetch_array($result)){
 $pdf->Cell(10,7,$no++ ,1,0,'C');
 $pdf->Cell(30,7,$data['nim'],1,0,'C');
 $pdf->Cell(50,7,$data['nama'],1,0,'C');
 $pdf->Cell(50,7,$data['alamat'],1,0,'C');
 $pdf->Cell(80,7,$data['email'],1,0,'C');
 $pdf->Cell(40,7,$data['telepon'],1,1,'C');
 }
 $pdf->Output();
?>