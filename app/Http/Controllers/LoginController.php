<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{


    public function login(Request $request)
    {
        $email = $this->validateString($request->input('email'));
        $pass = $this->validateString($request->input('password'));
        $pass = $this->validateString($request->input('password'));
        $result = DB::table('users')
            ->where('email', '=', $email)
            ->select('id_user','password')
            ->get();
        $isUser = $this->check_if_correct($result, $pass);
        if ($isUser) {
            $isAdmin = $this->check_if_admin($isUser);
            if ($isAdmin) {
                return redirect()->route('panel', [
                    'id_org' => $isAdmin,
                    'id_user' => $isUser
                ]);
            } else {
                return redirect()->route('board', $isUser);
            }
        } else {
            return view('login',[
                'msg' => 'Correo o contraseña incorrectos'
                ]);
        }
    }

    public function check_if_correct($result, $pass)
    {
        if ($result[0]->password) {
            if (Hash::check($pass, $result[0]->password)) {
                return $result[0]->id_user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function check_if_admin($id)
    {
        $id = DB::select('CALL check_if_admin(?)', array($id));
        if (count($id) > 0) {
            return $id[0]->id_org;
        } else {
            return false;
        }

    }
}
