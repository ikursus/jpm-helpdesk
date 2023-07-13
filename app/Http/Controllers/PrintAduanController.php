<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PrintAduanController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $aduan = Aduan::findOrFail($id);

        $pdf = Pdf::loadView('pdf.laporan', compact('aduan'));

        if ($request->has('type') && $request->type == 'download')
        {
            return $pdf->download(now(). '.pdf');
        }

        return $pdf->stream();

    }
}
