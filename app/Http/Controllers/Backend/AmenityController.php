<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Amenities;

class AmenityController extends Controller
{
    public function AllAmenities(){
        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_amenities', compact('amenities'));
    }

    public function AddAmenities(){
        return view('backend.amenities.add_amenities');
    }

    public function StoreAmenities(Request $request){
    
        Amenities::insert([
            'amenities_name' => $request->amenity_name,
        ]);

        $notification = array(
            'message'       => 'Amenity Created Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all.amenities')->with($notification);
    }

    public function EditAmenity($id){
        $amenities = Amenities::findOrFail($id);
        return view('backend.amenities.edit_amenities', compact('amenities'));
    }

    public function UpdateAmenity(Request $request){
        $id = $request->id;

        Amenities::findOrFail($id)->update([
            'amenities_name' => $request->amenity_name,
        ]);

        $notification = array(
            'message'       => 'Amenity Updated Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->route('all.amenities')->with($notification);
    }

    public function DeleteAmenity($id){
        Amenities::findOrFail($id)->delete();
        $notification = array(
            'message'       => 'Deleted Successfully!!',
            'alert-type'    => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
