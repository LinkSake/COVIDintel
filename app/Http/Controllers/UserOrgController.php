<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class UserOrgController extends Controller
{
    public function new()
    {
        $orgs = DB::select('CALL leer_org');
        $cat = DB::select('CALL leer_cat_org');
        return view('usr_org/add',[
            'orgs' => $orgs,
            'cat' => $cat
            ]);
    }

    public function create(Request $request)
    {
        $user = $this->validateInt($request->input('id_user'));
        $org = $this->validateInt($request->input('id_org'));
        $result = DB::select('
        CALL nuevo_usr_org(?,?)
        ', array($user, $org));
        return redirect()->action('UserController@overview');
    }

    public function remove($id)
    {
        $org = DB::select('
            CALL detalle_org(?)',array($id));
        $cat = DB::select('CALL leer_cat_org');
        return view('usr_org/remove',[
            'org' => $org,
            'cat' => $cat
           ]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $result = DB::select('
            CALL eliminar_usr_org(?)
        ', array($id));
        return redirect()->action('UserController@overview');
    }
}
