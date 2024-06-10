<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF as DomPDF;

class PDFController extends Controller
{

    public function cetak_pdf_category(){
          $category = Category::all();
        
            $pdf = app('dompdf.wrapper'); // Versi Baru
            $pdf->loadView('category_pdf', ['category' => $category]);

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


    public function cetak_pdf_product(){
          $product = Product::all();
        
        $pdf = app('dompdf.wrapper'); // Versi Baru
        $pdf->loadView('product_pdf', ['product' => $product]);

        // Menggunakan Response untuk mengirimkan objek PDF sebagai file download
        return response(
            $pdf->output(),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="laporan-product-pdf.pdf"',
            ]
        );
    }
}
