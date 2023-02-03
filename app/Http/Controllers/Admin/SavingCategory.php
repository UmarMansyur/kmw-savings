<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\SavingCategory as ModelsSavingCategory;
use Illuminate\Http\Request;

class SavingCategory extends Controller
{
    public function index() {
        try {
            $saving_categories = ModelsSavingCategory::all();
            
            return view('admin.settings.categories.index', compact('saving_categories'));
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
        }
    }
    public function store() {
        try {
            $category = new ModelsSavingCategory();
            $category->name = request('name');
            $category->limit = request('limit');
            $category->save();
            notify()->success('Kategori berhasil ditambahkan');
            return redirect()->back();
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }
    public function update() {
        try {
            // dd(request()->all());
            $category = ModelsSavingCategory::find(request('id_kategori'));
            $category->name = request('name_edit');
            $category->limit = request('limit_edit');
            $category->save();
            notify()->success('Kategori berhasil diubah');
            return redirect()->back();
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id) {
        try {
            $category = ModelsSavingCategory::find($id);
            $category->delete();
            notify()->success('Kategori berhasil dihapus');
            return redirect()->back();
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }
}
