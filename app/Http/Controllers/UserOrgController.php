<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class UserOrgController extends Controller
{
    public function new($id)
    {
        $orgs = DB::select('CALL leer_org');
        return view('usrorg/add',[
            'user' => $id,
            'orgs' => $orgs,
            ]);
    }

    public function create(Request $request)
    {
        $user = $this->validateInt($request->input('id_user'));
        $org = $this->validateInt($request->input('id_org'));
        $result = DB::select('
        CALL nuevo_usr_org(?,?)
        ', array($user, $org));
        return redirect()->route('board', [
            'id' => $user,
        ]);
    }

    public function remove($id, $user, $rel)
    {
        $org = DB::select('
            CALL detalle_org(?)',array($id));
        $cat = DB::select('CALL leer_cat_org');
        return view('usrorg/bye',[
            'org' => $org,
            'cat' => $cat,
            'user' => $user,
            'rel' => $rel
           ]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('rel');
        $result = DB::select('
            CALL eliminar_usr_org(?)
        ', array($id));
        return redirect()->route('board', [
            'id' => $request->input('user'),
        ]);
    }
}
