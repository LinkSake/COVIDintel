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
        $orgs = DB::select('CALL datos_org_usr(?)', array($user[0]->id_user));
        $pc = DB::select('CALL leer_os_pc');
        $mobile = DB::select('CALL leer_os_mobile');
        $cat = DB::select('CALL leer_cat_org');
        return view('user/overview',[
            'user' => $user,
            'orgs' => $orgs,
            'os_pc' => $pc,
            'os_mobile' => $mobile,
            'cats' => $cat
            ]);
    }

    public function new($admin=0)
    {
        $pc = DB::select('CALL leer_os_pc');
        $mobile = DB::select('CALL leer_os_mobile');
        return view('user/detail',[
            'admin' => $admin,
            'os_pc' => $pc,
            'os_mobile' => $mobile
            ]);
    }

    public function create(Request $request)
    {
        $name = $this->validateString($request->input('name'));
        $father = $this->validateString($request->input('lastname_f'));
        $mother = $this->validateString($request->input('lastname_m'));
        $email = $this->validateString($request->input('email'));
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
            CALL nuevo_usuario(?,?,?,?,?,?,?,?,?,?,?,?,?)
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

        // if ($request->input('admin') == 0) {
        //     return redirect()->route('create_org', [
        //         'id' => $id,
        //     ]);
        // } else {
        //     return view('login');
        // }
        return view('login');
    }

    public function edit($id, $admin=false)
    {
        $user = DB::table('users')
            ->where('id_user', '=', $id)
            ->get();
        $pc = DB::select('CALL leer_os_pc');
        $mobile = DB::select('CALL leer_os_mobile');
        return view('user/detail',[
            'admin' => $admin,
            'user' => $user,
            'os_pc' => $pc,
            'os_mobile' => $mobile
            ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $this->validateString($request->input('name'));
        $father = $this->validateString($request->input('lastname_f'));
        $mother = $this->validateString($request->input('lastname_m'));
        $email = $this->validateString($request->input('email'));
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
            $id,
            $name,
            $father,
            $mother,
            $email,
            $phone,
            $curp,
            $pc,
            $mobile,
            $internet,
            $mobile_data,
            $os_pc,
            $os_mobile
        ));

        if ($request->input('admin')) {
            return redirect()->route('panel', [
                'id_org' => $request->input('admin'),
                'id_user' => $id
            ]);
        } else {
            return redirect()->route('board', [
                'id' => $id,
            ]);
        }
    }

    public function remove($id)
    {
        $user = DB::table('users')
            ->where('id_user', '=', $id)
            ->get();
        $cat = DB::select('CALL leer_cat_org');
        $pc = DB::select('CALL leer_os_pc');
        $mobile = DB::select('CALL leer_os_mobile');
        return view('user/delete',[
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
        return view('welcome');
    }

}