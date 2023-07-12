<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function user() {

        $pageTitle = 'Dashboard';

        // Cara 1 Membekalkan data variable kepada view
        //return view('template-dashboard')->with('tajuk', $pageTitle);

        // cara 2 Membekalkan data variable kepada view
        //return view('template-dashboard', ['tajuk' => $pageTitle]);

        // Cara 3
        return view('template-dashboard', compact('pageTitle'));

    }
}
