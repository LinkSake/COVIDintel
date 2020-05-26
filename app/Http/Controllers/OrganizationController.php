<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class OrganizationController extends Controller
{

    public function new()
    {
        return view('org/detail');
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
        return redirect()->action('OrganizationController@list');
    }
}
