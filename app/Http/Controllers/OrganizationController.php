<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class OrganizationController extends Controller
{

    public function overview($id)
    {
        $org = DB::select('CALL leer_panel_admin(?)', array($id));
        $cat = DB::select('CALL leer_cat_org');
        return view('org/overview',[
            'org' => $org,
            'cat' => $cat
            ]);
    }

    public function new()
    {
        $cat = DB::select('CALL leer_cat_org');
        return view('org/detail',[
            'cat' => $cat
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
        CALL nueva_org(?,?,?,?,?,?,?)
        ', array($name, $address, $email, $phone, $cat, $admin));
        return redirect()->action('OrganizationController@overview');
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
        ', array($id, $name, $address, $email, $phone, $cat, $admin));
        return redirect()->action('OrganizationController@overview');
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
        return redirect()->action('OrganizationController@new');
    }

}
