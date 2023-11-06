<?php

namespace App\Http\Controllers;

use App\Models\Notlar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class TeacherController extends Controller
{
    public function TeacherIndex(){
        return view('teacher.home');
    }

    public function NotKaydet(Request $request){

        $not = Notlar::where('user_id', $request->id)->first();

        if (is_null($not)) {
            $not = new Notlar();
        }

        if ($request->type == 'vize1'){
            $not->vize1 = $request->not;
            $not->save();
        }

        if ($request->type == 'vize2'){
            $not->vize2 = $request->not;
            $not->save();
        }

        if ($request->type == 'final'){
            $not->final = $request->not;
            $not->save();
        }



    }

    public function TeacherFetch(){

        $user = User::where('role',0)->get();

        return Datatables::of($user)
            ->addColumn('vize1',function ($data){

                $not = Notlar::where('user_id',$data->id)->first();


                return '<input value="' . (isset($not->vize1) ? $not->vize1:'')  . '" type="text" name="vize1" id="vize1_' . $data->id . '" value=" '.$data->vize1.' "> <button onclick="kaydet('. $data->id .', \'vize1\')">kydt</button>';
            })->addColumn('vize2',function ($data){

                $not = Notlar::where('user_id', $data->id)->first();

                return '<input  value="' . (isset($not->vize2) ? $not->vize2:'')  . '" type="text" name="vize2" id="vize2_' . $data->id . '" value=" '.$data->vize2.' "> <button onclick="kaydet('. $data->id .', \'vize2\')">kydt</button>';
            })->addColumn('final',function ($data){

                $not = Notlar::where('user_id', $data->id)->first();

                return '<input value="' . (isset($not->final) ? $not->final:'')  . '" type="text" name="final" id="final_' . $data->id . '"value=" '.$data->final.' "> <button onclick="kaydet('. $data->id .', \'final\')">kydt</button>';
            })->addColumn('detail',function ($data){
                return 'Detay';
            })->rawColumns(['vize1','vize2', 'final', 'detail'])
            ->make();
    }
}
