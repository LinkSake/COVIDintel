<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class OrganizationController extends Controller
{

    public function overview($id_org, $id_user)
    {
        $users = DB::select('CALL leer_panel_admin(?)', array($id_org));
        return view('org/overview',[
            'users' => $users,
            'org' => $id_org,
            'me' => $id_user
            ]);
    }

    public function new($id)
    {
        $cat = DB::select('CALL leer_cat_org');
        return view('org/detail',[
            'cat' => $cat,
            'me' => $id
            ]);
    }

    public function create(Request $request)
    {
        $name = $this->validateString($request->input('name'));
        $address = $this->validateString($request->input('address'));
        $email = $this->validateString($request->input('email'));
        $phone = $this->validateString($request->input('phone'));
        $cat = $this->validateInt($request->input('id_cat_org'));
        $admin = $this->validateInt($request->input('id_admin'));

        $result = DB::select('
        CALL nueva_org(?,?,?,?,?,?)
        ', array($name, $cat, $address, $email, $phone, $admin));
        $id = DB::select('CALL check_if_admin(?)', array($admin));

        return redirect()->route('panel', [
            'id_org' => $id[0]->id_org,
            'id_user' => $admin
        ]);
    }

    public function edit($id)
    {
        $org = DB::table('organization')
            ->where('id_org', '=', $id)
            ->get();
        $cat = DB::select('CALL leer_cat_org');
        return view('org/detail',[
            'org' => $org,
            'cat' => $cat
            ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $this->validateString($request->input('name'));
        $address = $this->validateString($request->input('address'));
        $email = $this->validateString($request->input('email'));
        $phone = $this->validateString($request->input('phone'));
        $cat = $this->validateInt($request->input('id_cat_org'));
        $admin = $this->validateInt($request->input('id_admin'));
        $result = DB::select('
            CALL editar_org(?,?,?,?,?,?,?)
        ', array($id, $name, $cat, $address, $email, $phone, $admin));
        return redirect()->route('panel', [
            'id_org' => $id,
            'id_user' => $admin
        ]);
    }

    public function remove($id)
    {
        $org = DB::table('organization')
            ->where('id_org', '=', $id)
            ->get();
        $cat = DB::select('CALL leer_cat_org');
        return view('org/delete',[
            'org' => $org,
            'cat' => $cat
           ]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $org = DB::select('
            CALL eliminar_org(?)
        ', array($id));
        return redirect()->route('create_org', [
            'id' => $request->input('id_admin'),
        ]);
    }

}
