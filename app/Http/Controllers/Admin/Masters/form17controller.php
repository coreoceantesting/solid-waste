<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class form17controller extends Controller
{
    public function index()
    {
        // return view('admin.masters.form17');
        $html = view('admin.masters.form17')->render();
        $mpdf = new Mpdf(
            [
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L'
            ]
        );
        $mpdf->WriteHTML($html);
        $mpdf->Output('form17.pdf', 'I');

    }
}
