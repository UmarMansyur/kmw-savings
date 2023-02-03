<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Saving;
use App\Models\SavingCategory as ModelsSavingCategory;

class Dashboard extends Controller
{
    public function index()
    {
        $saving_category = ModelsSavingCategory::find(request()->session()->get('user')[0]->saving_category_id);
        $saldo = Saving::where('member_id', request()->session()->get('user')[0]->id)->limit(1)->orderBy('id', 'desc')->get();
        $average = Saving::where('member_id', request()->session()->get('user')[0]->id)->avg('debit');
        $average = number_format($average, 0, ',', '.');
        return view('users.dashboard', compact('saving_category', 'saldo', 'average'));
    }
}
