<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\Hobbie;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function register()
    {
        $hobbie = Hobbie::get();
        $contry = DB::table('country')->get();
        return view('user.register',compact('hobbie','contry'));
    }

    public function savedata(StoreUserRequest $request)
    {
        // dd($request->all());

        DB::beginTransaction();

        try {

            // $user = new User;
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'email' => $request->email,
                'mobile_number' => $request->mobile_number,
                'password' => Hash::make($request['password']),
                'country_id' => $request->country,
                'state_id' => $request->state,
                'district_id' => $request->district,
                'city' => $request->city,
                'hobbies'=> json_encode($request->hobbies)
            ]);
            
            DB::commit(); 
            return redirect('/login')->with('succeed', 'Your data is successfully stored in our database so you can login now');
        } catch (\Exception $e) {
           
            DB::rollBack(); // Rollback the transaction if any operation fails
            return redirect()->back()->withErrors(['error' => 'Something Went Wrong!!!']);
           
        }

    }
}
