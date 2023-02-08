<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Report extends Controller
{
    public function index()
    {
        if (request()->get('type') == 'harian') {
            $data = Member::where('saldo', '>', 0)->join('savings', 'members.id', '=', 'savings.member_id')->get();
            return view('admin.reports.index', compact('data'));
        } else if (request()->get('type') == 'bulanan') {
            $data = DB::select("SELECT MONTHNAME(savings.created_at) as bulan, MONTH(savings.created_at) as month, YEAR(savings.created_at) as year, SUM(debit) as debit,SUM(saldo) as saldo, members.name, code FROM savings JOIN members ON savings.member_id = members.id WHERE saldo > 0 GROUP BY month, bulan, year, members.name, code ORDER BY year, month");
            // dd($data);
            return view('admin.reports.index', compact('data'));
        } else if (request()->get('type') == 'tahunan') {
            $data = DB::select("SELECT YEAR(savings.created_at) as year, SUM(debit) as debit,SUM(saldo) as saldo, members.name, code FROM savings JOIN members ON savings.member_id = members.id WHERE saldo > 0 GROUP BY year, members.name, code ORDER BY year");
            return view('admin.reports.index', compact('data'));
        }
        $data = Member::where('saldo', '>', 0)->join('savings', 'members.id', '=', 'savings.member_id')->get();
        return view('admin.reports.index', compact('data'));
    }

    public function print() {
        if (request()->get('type') == 'harian') {
            $data = Member::where('saldo', '>', 0)->join('savings', 'members.id', '=', 'savings.member_id')->get();
            return view('admin.reports.print', compact('data'));
        } else if (request()->get('type') == 'bulanan') {
            $data = DB::select("SELECT MONTHNAME(savings.created_at) as bulan, MONTH(savings.created_at) as month, YEAR(savings.created_at) as year, SUM(debit) as debit,SUM(saldo) as saldo, members.name, code FROM savings JOIN members ON savings.member_id = members.id WHERE saldo > 0 GROUP BY month, bulan, year, members.name, code ORDER BY year, month");
            // dd($data);
            return view('admin.reports.print', compact('data'));
        } else if (request()->get('type') == 'tahunan') {
            $data = DB::select("SELECT YEAR(savings.created_at) as year, SUM(debit) as debit,SUM(saldo) as saldo, members.name, code FROM savings JOIN members ON savings.member_id = members.id WHERE saldo > 0 GROUP BY year, members.name, code ORDER BY year");
            return view('admin.reports.print', compact('data'));
        }
        $data = Member::where('saldo', '>', 0)->join('savings', 'members.id', '=', 'savings.member_id')->get();
        return view('admin.reports.print', compact('data'));
    }
}
