<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Hobbie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserRequest;

class DashboradController extends Controller
{
    //

    public function dashboard()
    {

        $user = Auth::user();
        $hobbie = Hobbie::get();
        $contry = DB::table('country')->get();
        $states = DB::table('states')->where('country_id', $user->country_id )->get();
        $districts = DB::table('districts')->where('state_id', $user->state_id)->get();

        return view('user.dashboard',compact('user','hobbie','contry','states','districts'));
    }

    public function dashboardupdate(UpdateUserRequest $request)
    {
      
        $user = User::find($request->id); 

        $updateData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'country_id' => $request->country,
            'state_id' => $request->state,
            'district_id' => $request->district,
            'city' => $request->city,
            'hobbies' => json_encode($request->hobbies),
        ];
       
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }
    
        $user->update($updateData);
        

        return redirect('/dashboard')->with('succeed', 'Your data is successfully updated!!');
    }
}
