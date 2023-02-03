<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Report extends Controller
{
   
    public function index()
    {
        if (empty(request()->session()->get('user')[0]->id)) {
            return redirect('/');
        }
        if (request()->get('type') == 'harian') {
            $data = Member::join('savings', 'members.id', '=', 'savings.member_id')->where('members.id', '=', request()->session()->get('user')[0]->id)->get();
            return view('admin.reports.index', compact('data'));
        } else if (request()->get('type') == 'bulanan') {
            $data = DB::select("SELECT MONTHNAME(savings.created_at) as bulan, MONTH(savings.created_at) as month, YEAR(savings.created_at) as year, SUM(debit) as debit,SUM(saldo) as saldo, members.name, code FROM savings JOIN members ON savings.member_id = members.id WHERE members.id = " . request()->session()->get('user')[0]->id ." GROUP BY month, bulan, year, members.name, code ORDER BY year, month");
            // dd($data);
            return view('admin.reports.index', compact('data'));
        } else if (request()->get('type') == 'tahunan') {
            $data = DB::select("SELECT YEAR(savings.created_at) as year, SUM(debit) as debit,SUM(saldo) as saldo, members.name, code FROM savings JOIN members ON savings.member_id = members.id WHERE members.id = " . request()->session()->get('user')[0]->id ." GROUP BY year, members.name, code ORDER BY year");
            return view('admin.reports.index', compact('data'));
        }
        $data = Member::join('savings', 'members.id', '=', 'savings.member_id')->get();
        return view('admin.reports.index', compact('data'));
    }
}
