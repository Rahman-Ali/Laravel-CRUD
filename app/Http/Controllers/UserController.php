<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showUsers(){
        $users = DB::table('users')
        // ->get();
        // ->simplePaginate(2);
        ->Paginate(4);
        // ->orderBy('id')
        // ->cursorPaginate(2);
        return view('allusers',['data'=>$users]);
    }

    public function singleuser(string $id)
    {
        $user = DB::table('users')->where('id',$id)->get();
        return view('user',['data'=>$user]);
    }

    public function addUser(Request $req){
        $user = DB::table('users')
        ->insert([
            'name'=>$req->username,
            'email'=>$req->useremail,
            'age'=>$req->userage,
            'city'=>$req->usercity,
        ]);
        if($user){
            return redirect()->route('home');
        }
        else{
            echo 'Failed to Add New Record';
        }
    }

    public function updatePage(string $id){
        $user = DB::table('users')->find($id);
        return view('updateuser',['data'=>$user]);
    }

    public function updateUser(Request $req, string $id){
        $user = DB::table('users')
        ->where('id',$id)
        ->update([
            'name'=>$req->username,
            'email'=>$req->useremail,
            'age'=>$req->userage,
            'city'=>$req->usercity,
        ]);
        if($user){
            return redirect()->route('home');
        }
        else{
            echo 'Failed to Update Record';
        }
    }

    public function deleteUser(string $id){
        $user = DB::table('users')
        ->where('id',$id)
        ->delete();
        if ($user) {
            return redirect()->route('home')->with('success', 'A record was deleted successfully.');
        } else {
            return redirect()->route('home')->with('error', 'Failed to delete the record.');
        }
    }

    public function deleteAll(){
        try {
            DB::table('users')->truncate();
            return redirect()->route('home'); // Redirect to the home route after successful deletion
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to Delete All Records: ' . $e->getMessage());
        }
    }

}
