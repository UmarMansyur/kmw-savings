<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Saving as ModelsSaving;
use App\Models\SavingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Saving extends Controller
{
    public function index()
    {
        $categories = SavingCategory::all();
        $members = DB::select("SELECT members.id as id, code, members.name, address, saving_categories.name as category, saving_categories.limit as batas, SUM(debit) as saldo FROM savings JOIN members ON savings.member_id =  members.id JOIN saving_categories ON members.saving_category_id = saving_categories.id GROUP BY members.name, members.id, code, address, category, batas"); 
        return view('admin.savings.index', compact('categories', 'members'));
    }

    public function preview($id)
    {
        if (!$id) {
            return redirect('/admin/saving');
        }
        if (Member::find($id) == null) {
            return redirect('/admin/saving');
        }
        $member = DB::select("SELECT members.id as id, gender, email, phone, password, DATE(members.created_at) as created_at, code, members.name as name, address, saving_categories.name as category, saving_categories.limit as batas, SUM(debit) as saldo FROM savings JOIN members ON savings.member_id =  members.id JOIN saving_categories ON members.saving_category_id = saving_categories.id WHERE members.id = $id GROUP BY members.name, members.id, gender, email, phone, code, password, created_at, address, category, batas")[0];
        return view('admin.savings.preview', compact('member'));
    }

    public function deposit($id)
    {
        if (!$id) {
            return redirect('/admin/saving');
        }
        if (Member::find($id) == null) {
            return redirect('/admin/saving');
        }
        $member = DB::select("SELECT members.id as id, gender, email, phone, password, DATE(members.created_at) as created_at, code, members.name as name, address, saving_categories.name as category, saving_categories.limit as batas, SUM(debit) as saldo FROM savings JOIN members ON savings.member_id =  members.id JOIN saving_categories ON members.saving_category_id = saving_categories.id WHERE members.id = $id GROUP BY members.name, members.id, gender, email, phone, code, password, created_at, address, category, batas")[0];
        return view('admin.savings.deposit', compact('member'));
    }

    public function storeDeposit($id) {
        try {
            $saldo = DB::select("SELECT SUM(debit) as saldo FROM savings WHERE member_id = $id order by id desc limit 1")[0]->saldo;
            $save = new ModelsSaving();
            $save->member_id = $id;
            $save->debit = request('debit');
            $save->saldo = $saldo + request('debit');
            $save->save();
            notify()->success('Berhasil menambahkan deposit', 'Berhasil');
            return redirect('/admin/saving');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
