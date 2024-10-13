<?php


namespace App\Http\Controllers;


class DashboardController extends Controller
{
    /**
     * Muestra el dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('dashboard');
    }

}
