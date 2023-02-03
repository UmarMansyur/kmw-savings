<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member as MemberModel;
use App\Models\SavingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Member extends Controller
{
    public function index()
    {
        $member = MemberModel::with('saving_category')->get();

        return view('admin.settings.members.index', compact('member'));
    }

    public function new()
    {
        if (request('id')) {
            $member = MemberModel::find(request('id'))::with('saving_category')->first();
            $saving_categories = SavingCategory::all();
            return view('admin.settings.members.member', compact('member', 'saving_categories'));
        }
        $saving_categories = SavingCategory::all();
        return view('admin.settings.members.member', compact('saving_categories'));
    }

    public function store()
    {
        try {
            $member = new MemberModel;
            $member->name = request('name');
            $member->email = request('email');
            $member->password = Hash::make(request('password'));
            $member->saving_category_id = request('saving_categories');
            $member->address = request('address');
            $member->gender = request('gender');
            $member->phone = request('phone');
            if (request('File')) {
                $ext = ['zip', 'ZIP', 'rar', 'RAR'];
                if (!in_array(request()->file('File')->getClientOriginalExtension(), $ext)) {
                    notify()->error('File harus berupa zip atau rar');
                    return redirect('/admin/setting/jamaah');
                }
                $file = request()->file('File');
                $fileName = Storage::putFile('/public/members/file', $file);
                $fileName = explode('/', $fileName);
                $fileName = $fileName[count($fileName) - 1];
                $member->thumbnail = $fileName;
            }
            if (request('photo')) {
                $file = request()->file('photo');
                $extension = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];
                if (!in_array($file->getClientOriginalExtension(), $extension)) {
                    notify()->error('File harus berupa gambar');
                    return redirect('/admin/setting/jamaah');
                }
                $fileName = Storage::putFile('/public/members/images', $file);
                $fileName = explode('/', $fileName);
                $fileName = $fileName[count($fileName) - 1];
                $member->thumbnail = $fileName;
            }
            $member->save();
            notify()->success('Berhasil menambahkan jamaah baru');
            return redirect('/admin/setting/jamaah');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect('/admin/setting/jamaah');
        }
    }

    public function update($id)
    {
        try {
            $member = MemberModel::find($id);
            $member->name = request('name');
            $member->email = request('email');
            $member->password = request('password') ? Hash::make(request('password')) : $member->password;
            $member->saving_category_id = request('saving_categories');
            $member->address = request('address');
            $member->gender = request('gender');
            $member->phone = request('phone');
            if (request('File')) {
                $ext = ['zip', 'ZIP', 'rar', 'RAR'];
                if (!in_array(request()->file('File')->getClientOriginalExtension(), $ext)) {
                    notify()->error('File harus berupa zip atau rar');
                    return redirect('/admin/setting/jamaah');
                }
                $file = request()->file('File');
                $fileName = Storage::putFile('/public/members/file', $file);
                $fileName = explode('/', $fileName);
                $fileName = $fileName[count($fileName) - 1];
                $member->thumbnail = $fileName;
            } else {
                $member->thumbnail = $member->thumbnail;
            }
            if (request('photo')) {
                $file = request()->file('photo');
                $extension = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];
                if (!in_array($file->getClientOriginalExtension(), $extension)) {
                    notify()->error('File harus berupa gambar');
                    return redirect('/admin/setting/jamaah');
                }
                $fileName = Storage::putFile('/public/members/images', $file);
                $fileName = explode('/', $fileName);
                $fileName = $fileName[count($fileName) - 1];
                $member->thumbnail = $fileName;
            } else {
                $member->thumbnail = $member->thumbnail;
            }
            $member->save();
            notify()->success('Berhasil mengubah jamaah baru');
            return redirect('/admin/setting/jamaah');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect('/admin/setting/jamaah');
        }
    }

    public function destroy($id)
    {
        try {
            $user = MemberModel::find($id);
            Storage::delete('/public/members/images/' . $user->thumbnail);
            Storage::delete('/public/members/file/' . $user->thumbnail);
            $user->delete();
            notify()->success('Berhasil menghapus data jamaah');
            return redirect('/admin/setting/jamaah');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect('/admin/setting/jamaah');
        }
    }
}
