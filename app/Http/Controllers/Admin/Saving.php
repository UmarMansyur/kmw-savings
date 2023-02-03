<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\SavingCategory;
use Illuminate\Http\Request;

class Saving extends Controller
{
    public function index() {
        $categories = SavingCategory::all();
        return view('admin.savings.index', compact('categories'));
    }

    public function preview($id) {
        if(!$id) {
            return redirect('/admin/saving');
        }
        if(Member::find($id) == null) {
            return redirect('/admin/saving');
        }
        $member = Member::find($id)::with('saving_category', 'savings')->first();
        return view('admin.savings.preview', compact('member'));
    }

    public function deposit($id) {
        if(!$id) {
            return redirect('/admin/saving');
        }
        if(Member::find($id) == null) {
            return redirect('/admin/saving');
        }
        $member = Member::find($id)::with('saving_category', 'savings')->first();
        return view('admin.savings.deposit', compact('member'));
    }
}
