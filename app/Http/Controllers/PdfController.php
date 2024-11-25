<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Browsershot\Browsershot;

class PdfController extends Controller
{
    public function generatePdf(){
        // **DomPDF
        // $pdf = Pdf::loadView('pdf.invoice', $data);
        // $pdf = Pdf::loadView('pdf.ptw');
        // return $pdf->download('PTW-Form.pdf');

        // **Mpdf Library
        // $mpdf = new \Mpdf\Mpdf();
        // $mpdf->WriteHTML(view('pdf.ptw'));
        // $mpdf->Output();
    }
}