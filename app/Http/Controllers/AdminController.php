<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\Lessor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * list table users , lessor
     */
    public function index()
    {
        
        $data = Users::all()->where("role_id" , 1);
        $data2 = Lessor::all()->where("role_id" , 2);
        return view('table_admin' , ['users'=> $data , 'lessors' =>$data2]);
       
    }

   

   // add user 
    public function addUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                
            ],
           
        ]);
   
       $user = new Users;
       $user->name = $request -> input('name');
       $user->email = $request -> input('email');
       $user->password = Hash::make($request->input('password'));
       $user->role_id = 1;
       $user->save();

       
       return redirect('admin_table');
    }

    // add lessor
    public function addlessor(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 
            ],
            'phone' => 'required',
            'address' => 'required',
        ]);
       $lessor = new Lessor;
       $lessor->name = $request -> input('name');
       $lessor->email = $request -> input('email');
       $lessor->phone = $request -> input('phone');
       $lessor->address = $request -> input('address');
       $lessor->password = Hash::make($request->input('password'));
       $lessor->role_id = 2;
       $lessor->save();
       return redirect('admin_table');
    }
   
    // show single user for update
    public function showUser(string $id)
    {
       $user= Users::find($id);

       return view( 'update_user_admin' ,['user' => $user]);
    }

    
    
    public function editUser(Request $request)
    {
        dd($request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                
            ],
           
        ]));
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                
            ],
           
        ]);
        

        // dd(Users::find($request -> input("id")));
       $user = Users::find($request -> input("id"));
       $user->name = $request -> input('name');
       $user->email = $request -> input('email');
       $user->password = Hash::make($request->input('password'));
       $user->role_id = 1;
    //    dd($user);
       $user->update();

       return redirect('admin_table');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteUser(string $id)
    {
        $data = Users::find($id);
    
        // Display a confirmation dialog to the user
        $confirmation = true; // Simulating user confirmation for the sake of this example
    
        if ($confirmation) {
            // User confirmed the deletion
            $data->delete();
            return redirect('admin_table')->with('success', 'User deleted successfully.');
        } else {
            // User canceled the deletion
            return redirect('admin_table')->with('warning', 'User deletion canceled.');
        }
    }
    
    public function deleteLessor(string $id)
    {
        $data = Lessor::find($id);
    
        // Display a confirmation dialog to the user
        $confirmation = true; // Simulating user confirmation for the sake of this example
    
        if ($confirmation) {
            // User confirmed the deletion
            $data->delete();
            return redirect('admin_table')->with('success', 'User deleted successfully.');
        } else {
            // User canceled the deletion
            return redirect('admin_table')->with('warning', 'User deletion canceled.');
        }
    }
}
