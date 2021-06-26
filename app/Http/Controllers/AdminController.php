<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\http\Resources\etuList;
use App\Http\Controllers\AuthController;


class AdminController extends Controller
{
    public function index()
    {
        return etuList::collection(Etudiant::all());
    }

    public function addUser(request $rq){

        $s =new Etudiant();
        if($user->role =='etudiant'){
            $s->name=$rq->input('name');
            $s->cne=$rq->input('cne');
            $s->semester_id=$rq->input('semester');
            $s->user_id=$rq->input('user_id');
            $s->save();
        }
    }
    public function destroy($id)
    {
        //$user= new Etudiant();
        $etu = Etudiant::findOrFail($id);
        $user= User::findOrFail($etu->user_id);
        $user->delete();
    }
}
