<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function overview($id)
    {
        $user = DB::select('CALL detalle_usuario(?)', array($id));
        $orgs = DB::select('CALL datos_org_usr(?)', array($user['id_user']));
        $pc = DB::select('CALL leer_os_pc');
        $mobile = DB::select('CALL leer_os_mobile');
        return view('user/overview',[
            'user' => $user,
            'orgs' => $orgs,
            'pc' => $pc,
            'mobile' => $mobile
            ]);
    }

    public function new()
    {
        $pc = DB::select('CALL leer_os_pc');
        $mobile = DB::select('CALL leer_os_mobile');
        return view('user/detail',[
            'pc' => $pc,
            'mobile' => $mobile
            ]);
    }

    public function create(Request $request)
    {
        $plate = $this->validateInt($request->input('name'));
        $father = $this->validateString($request->input('lastname_f'));
        $mother = $this->validateString($request->input('lastname_m'));
        $email = $this->validateEmail($request->input('email'));
        $password = Hash::make($this->validateString($request->input('password')));
        $phone = $this->validateString($request->input('phone'));
        $curp = $this->validateString($request->input('curp'));
        $pc = $this->validateString($request->input('pc'));
        $mobile = $this->valueToBool($request->input('mobile'));
        $internet = $this->valueToBool($request->input('internet'));
        $mobile_data = $this->valueToBool($request->input('mobile_data'));
        $os_pc = $request->input('os_pc'); // OPTIONAL
        $os_mobile = $request->input('os_mobile'); // OPTIONAL

        $result = DB::select('
            CALL editar_usuario(?,?,?,?,?,?,?,?,?,?,?,?,?)
        ', array(
            $name,
            $father,
            $mother,
            $email,
            $password,
            $phone,
            $curp,
            $pc,
            $mobile,
            $internet,
            $mobile_data,
            $os_pc,
            $os_mobile
        ));

        if ($request->input('is_admin')) {
            return redirect()->action('OrganizationController@new');
        } else {
            return redirect()->action('UserController@overview');
        }
    }

    public function edit($id)
    {
        $user = DB::table('users')
            ->where('id_user', '=', $id)
            ->get();
        $pc = DB::select('CALL leer_os_pc');
        $mobile = DB::select('CALL leer_os_mobile');
        return view('user/detail',[
            'user' => $user,
            'pc' => $pc,
            'mobile' => $mobile
            ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $this->validateInt($request->input('name'));
        $father = $this->validateString($request->input('lastname_f'));
        $mother = $this->validateString($request->input('lastname_m'));
        $email = $this->validateEmail($request->input('email'));
        $password = Hash::make($this->validateString($request->input('password')));
        $phone = $this->validateString($request->input('phone'));
        $curp = $this->validateString($request->input('curp'));
        $pc = $this->validateString($request->input('pc'));
        $mobile = $this->valueToBool($request->input('mobile'));
        $internet = $this->valueToBool($request->input('internet'));
        $mobile_data = $this->valueToBool($request->input('mobile_data'));
        $os_pc = $request->input('os_pc'); // OPTIONAL
        $os_mobile = $request->input('os_mobile'); // OPTIONAL

        $result = DB::select('
            CALL editar_usuario(?,?,?,?,?,?,?,?,?,?,?,?,?,?)
        ', array(
            $id,
            $name,
            $father,
            $mother,
            $email,
            $password,
            $phone,
            $curp,
            $pc,
            $mobile,
            $internet,
            $mobile_data,
            $os_pc,
            $os_mobile
        ));

        return redirect()->action('UserController@overview');
    }

    public function remove($id)
    {
        $user = DB::table('users')
            ->where('id_users', '=', $id)
            ->get();
        $cat = DB::select('CALL leer_cat_org');
        $pc = DB::select('CALL leer_os_pc');
        $mobile = DB::select('CALL leer_os_mobile');
        return view('user/detail',[
            'user' => $user,
            'pc' => $pc,
            'mobile' => $mobile
            ]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $org = DB::select('
            CALL eliminar_usuario(?)
        ', array($id));
        return redirect()->action('HomeController@index');
    }

}