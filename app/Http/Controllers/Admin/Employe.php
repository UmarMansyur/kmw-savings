<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employe as EmployeModel;
use App\Models\Role;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Employe extends Controller
{
    public function index()
    {
        $employes = EmployeModel::with('role')->get();
        return view('admin.settings.employes.index', compact('employes'));
    }

    public function new()
    {
        $roles = Role::all();
        if (request('id')) {
            $employe = EmployeModel::find(request('id'))::with('role')->first();
            return view('admin.settings.employes.employe', compact('employe', 'roles'));
        }

        return view('admin.settings.employes.employe', compact('roles'));
    }

    public function store()
    {
        try {
            // dd(request()->file('photo')->getClientOriginalName());
            $employe = new EmployeModel;
            $employe->name = request('name');
            $employe->email = request('email');
            if (request('password') != request('password_confirmation')) {
                notify()->error('Password tidak sama');
                return redirect('/admin/setting/add-karyawan');
            } else {
                $employe->password = Hash::make(request('password'));
            }
            $employe->role_id = request('role');
            $employe->address = request('address');
            $employe->gender = request('gender');
            $employe->phone = request('phone');
            if (request()->file('photo')) {
                $file = request()->file('photo');
                $fileName = Storage::putFile('/public/employes/images', $file);
                $fileName = explode('/', $fileName);
                $fileName = $fileName[count($fileName) - 1];
                $employe->thumbnail = $fileName;
            }

            $employe->save();
            notify()->success('Berhasil menambahkan karyawan baru');
            return redirect('/admin/setting/karyawan');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            dd($th->getMessage());
            // return redirect('/admin/setting/karyawan');
        }
    }

    public function update($id)
    {
        try {
            // dd(request()->all());
            $employe = EmployeModel::find($id);
            $employe->name = request('name') ?? $employe->name;
            $employe->email = request('email') ?? $employe->email;
            if (request('password') != request('password_confirmation')) {
                notify()->error('Password tidak sama');
                return redirect('/admin/setting/add-karyawan?id=' . $employe->id . '');
            } else {
                if (request('password')) {
                    $employe->password = Hash::make(request('password'));
                } else {
                    $employe->password = $employe->password;
                }
            }
            $employe->role_id = request('role') ?? $employe->role;
            $employe->address = request('address') ?? $employe->address;
            $employe->gender = request('gender') ?? $employe->gender;
            $employe->phone = request('phone') ?? $employe->phone;
            if (request()->file('photo')) {
                $file = request()->file('photo');
                Storage::delete('/public/employes/images/' . $employe->thumbnail);
                $fileName = Storage::putFile('/public/employes/images', $file);
                $fileName = explode('/', $fileName);
                $fileName = $fileName[count($fileName) - 1];
                $employe->thumbnail = $fileName;
            } else {
                $employe->thumbnail = $employe->thumbnail;
            }
            $employe->save();
            notify()->success('Berhasil mengubah karyawan');
            return redirect('/admin/setting/karyawan');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect('/admin/setting/karyawan');
        }
    }

    public function destroy($id)
    {
        try {
            $user = EmployeModel::find($id);
            Storage::delete('/public/employes/images/' . $user->thumbnail);
            $user->delete();
            notify()->success('Berhasil menghapus data karyawan');
            return redirect('/admin/setting/karyawan');
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect('/admin/setting/karyawan');
        }
    }
}
