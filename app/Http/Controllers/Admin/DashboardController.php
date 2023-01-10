<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    
    public function users(){
        
        $users=User::where('role_as','0')->get();
        return view('admin.users.index',compact('users'));
    }

    public function admins(){
        
        $admins=User::where('role_as','1')->get();
        return view('admin.users.admin',compact('admins'));
    }

    public function addadmin(){
        return view('admin.users.addadmin');
    }
    
    public function update(Request $request){
       $users=new User();
       $users->name=$request->input('name');  
       $users->email=$request->input('email');
       $users->password=Hash::make($request['password']); 
       $users->role_as=$request->input('role_as')==TRUE?'1':'0';     
       $users->save();
       return redirect('admins')->with('status',"New Admin added Successful");
    }   

    public function viewusers($id){
        $users=User::find($id);
        return view('admin.users.view',compact('users'));
    }

    
}
