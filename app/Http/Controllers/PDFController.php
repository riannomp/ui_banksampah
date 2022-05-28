<?php

namespace App\Http\Controllers;

use App\Models\DetailSetoran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
class PDFController extends Controller
{
    public function cetakPDF($id_setoran)
    {
        $detail = DetailSetoran::where('id_setoran', $id_setoran)->get();

        $pdf = PDF::loadview('pdf', compact('detail'));
        return $pdf->download('Detail_Setoran.pdf');
    }
}
