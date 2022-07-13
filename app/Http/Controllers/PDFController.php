<?php

namespace App\Http\Controllers;

use App\Models\DetailSetoran;
use App\Models\Setoran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    // public function cetakPDF($id_setoran)
    // {
    //     $detail = DetailSetoran::where('id_setoran', $id_setoran)->get();

    //     $pdf = PDF::loadview('pdf', compact('detail'));
    //     return $pdf->download('Detail_Setoran.pdf');
    // }
    // public function generatePDF()
    // {
    //     // $data = [
    //     //     'title' => 'Welcome to ItSolutionStuff.com',
    //     //     'date' => date('m/d/Y')
    //     // ];

    //     $pdf = PDF::loadView('pdf');

    //     return $pdf->download('itsolutionstuff.pdf');
    // }

    public function cetakpdf()
    {

        // $setoran    = DB::table('setorans')->get();

        // $pdf = app()->make(PDF::class);
        // $pdf->loadView('pdf', $setoran);
        // $pdf->save('setoran.pdf');
        // return $pdf;

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];

        $pdf=app()->make(PDF::class);
        $pdf->loadView('pdf1', $data);
        $pdf->save('certificate_template.pdf');
        return $pdf;
        // $setoran = Setoran::all(); // you're not passing an $id to print_pdf() like you are the show() method
        // $pdf = PDF::loadView('pdf', ['setoran' => $setoran]);
        // return $pdf->download('card.pdf');
        // $setoran = Setoran::all();
        // $pdf = PDF::loadview('pdf', compact('setoran'))->save(public_path('nama.pdf'));
        // return $pdf->stream('setoran.pdf');
    }
}
