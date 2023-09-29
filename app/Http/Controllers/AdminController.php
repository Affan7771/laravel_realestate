<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }

    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');    
    }

    public function AdminLogin(){
        return view('admin.admin_login');
    }

    public function AdminProfile() {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        // Updating data
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        // File upload
        $file = $request->file('photo');
        if( $file ){
            @unlink(public_path('upload/admin-images/' . $data->photo));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin-images'), $fileName);
            $data->photo = $fileName;
        }
        
        // Save Data
        $data->save();

        $notification = array(
            'message'       => 'Profile Updated Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }

    public function AdminUpdatePassword(Request $request){

        // Validation
        $request->validate([
            'old_password'  => 'required',
            'new_password'  => 'required|confirmed',
        ]);

        // Match old password
        if( !Hash::check($request->old_password, Auth::user()->password) ){
            $notification = array(
                'message'       => 'Old Password does not match!!',
                'alert-type'    => 'error'
            );
            return back()->with($notification);
        }

        // Update password
        $id = Auth::user()->id;
        User::whereId($id)->update([
            'password'  => Hash::make($request->new_password)
        ]);
        
        $notification = array(
            'message'       => 'Password changed successfully!!',
            'alert-type'    => 'success'
        );
        return back()->with($notification);
    }
}
