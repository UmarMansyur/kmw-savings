<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Member;
use App\Models\Saving;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index() {
        $employe = Employe::all()->count();
        $jamaah  = Member::all()->count();
        $debit = Saving::where('created_at', '>=', date('Y-m-d'))->sum('debit');
        return view('admin.dashboard', compact('employe', 'jamaah', 'debit'));
    }
}
