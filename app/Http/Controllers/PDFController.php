<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Barryvdh\DomPDF\PDF as DomPDF;

class PDFController extends Controller
{

    public function cetak_pdf(){
          $category = Category::all();
        
        $pdf = app('dompdf.wrapper'); // Versi Baru
        $pdf->loadView('dashboard.category.category_pdf', ['category' => $category]);

        // Menggunakan Response untuk mengirimkan objek PDF sebagai file download
        return response(
            $pdf->output(),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="laporan-category-pdf.pdf"',
            ]
        );
    }
}
