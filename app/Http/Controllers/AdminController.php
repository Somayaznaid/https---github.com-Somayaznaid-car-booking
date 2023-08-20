<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\Lessor;
use App\Models\Booking;
use App\Models\Car;
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
        $data3 = Car::all();
        $data4 = Booking::all();
        return view('table_admin' , ['users'=> $data , 'lessors' =>$data2 , 'cars' =>$data3 , 'booking' =>$data4]);
       
    }

    public function showCar()
    {
        $data = Car::all();

       
        return view('admin_table_car' , ['cars' =>$data]);
       
    }

    public function showBooking()
    {
       
        $data = Booking::all();
        return view('admin_table_order' , ['booking' =>$data]);
       
    }

   public function adminInfo(){
     $info= Users::where('role_id' , 3)->first();
     $cars = Car::all();
     return view('admin_profile' , ['info'=> $info] ,['cars'=> $cars] );
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

       
       return redirect('admin_table')->with('add_user', 'User add successfully.');
    }

    // add lessor
    public function addlessor(Request $request)
    {
       
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            'address' => 'required',
        ]);
        // dd($validated);
    
        $lessor = new Lessor;
        $lessor->name = $request->input('name');
        $lessor->email = $request->input('email');
        $lessor->phone = $request->input('phone');
        $lessor->address = $request->input('address');
        $lessor->password = Hash::make($request->input('password'));
        $lessor->role_id = 2;
        $lessor->save();
    
        return redirect('admin_table')->with('add_lessor', 'Lessor added successfully.');
    }
    
   
    // show single user for update
    public function showUser(string $id)
    {
       $user= Users::find($id);

       return view( 'update_user_admin' ,['user' => $user]);
    }

    public function showLessor(string $id)
    {
       $lessor= Lessor::find($id);

       return view( 'update_lessor_admin' ,['lessor' => $lessor]);
    }
    
    public function editUser(Request $request)
    {
        // dd("dd");
        $validated = $request->validate([
            
            'name' => 'required',
            'email' => 'required|email',
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
   
       $user->update();

       return redirect('admin_table')->with('user_info_update' , 'User edit successfully.');
     }

     public function editLessor(Request $request)
     {
         // dd("dd");
         $validated = $request->validate([
             
             'name' => 'required',
             'email' => 'required|email',
             'password' => [
                 'required',
                 'min:6',
                 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                 
             ],
             'phone' => 'required',
             'address' => 'required',
            
         ]);
         
 
         // dd(Users::find($request -> input("id")));
        $lessor = Lessor::find($request -> input("id"));
        $lessor->name = $request -> input('name');
        $lessor->email = $request -> input('email');
        $lessor->address = $request -> input('address');
        $lessor->phone = $request -> input('phone');
        $lessor->password = Hash::make($request->input('password'));
        $lessor->role_id = 2;
    
        $lessor->update();
 
        return redirect('admin_table')->with('lessor_info_update' , 'Lessor edit successfully.');
      }

    /**
     * Remove the specified resource from storage.
     */
   
    public function deleteUser(string $id)
    {
        $user = Users::find($id);
    
        if ($user) {
            // Check if the user has related records in the bookings table
            $hasBookings = Booking::where('user_id' , $id)->exists();
    
            if ($hasBookings) {
                // User has related bookings, so deletion is not allowed
                return redirect('admin_table')->with('warning_delete_user', 'User deletion failed. User has related bookings.');
            } else {
                // User has no related bookings, proceed with deletion
                $user->delete();
                return redirect('admin_table')->with('success_delete_user', 'User deleted successfully.');
            }

            
        } else {
            // User not found
            return redirect('admin_table')->with('error_delete_user', 'User not found.');
        }
    }
    
    
    public function deleteLessor(string $id)
    {
       
        $lessor = Lessor::find($id);
    
        if ($lessor) {
            // Check if the user has related records in the bookings table
            $hasBookings = Booking::where('lessor_id' , $id)->exists();
    
            if ($hasBookings) {
                // User has related bookings, so deletion is not allowed
                return redirect('admin_table')->with('warning_delete_Lessor', 'Lessor deletion failed. Lessor has related bookings.');
            } else {
                // User has no related bookings, proceed with deletion
                $user->delete();
                return redirect('admin_table')->with('success_delete_Lessor', 'Lessor deleted successfully.');
            }
        } else {
            // User not found
            return redirect('admin_table')->with('error_delete_Lessor', 'Lessor not found.');
        }
    }


    public function editAdminInfo(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
        ]);
        // dd($validatedData);
        $admin = Users::find($request->input('id'));

        if (!$admin) {
            return redirect()->back()->with('error', 'Admin not found.');
        }

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        if ($request->filled('password')) {
            $admin->password = bcrypt($request->input('password'));
        }

        $admin->save();

        return redirect()->back()->with('success', 'Admin information updated successfully.');
    }
    
}
