<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator, Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use App\Models\User;
class userListController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('role', 2)->get();

        return view('admin.pages.users.index', [
            'users' => $users,
        ]);
    }
    public function userCreate(Request $request)
    {
        $data = $request->all();
        $id = $request->id;
        //file upload
        if (request()->has('avatar')) { 
            $extension = $request->avatar->extension();
            $fileName = round(microtime(true) * 1000) . '.' . $extension;
            $request->avatar->move(public_path('uploads/avatar'), $fileName);
        }
        //check exist email
        $rules = array('email' => 'unique:users,email');
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            echo 'exist';
        } else {
            if($id){
                //edit user
                $result = User::where('id', $id)->first();
                $result->email = $request->email;
                $result->password = Hash::make($request->password);
                $result->company_name = $request->company_name;
                $result->phone = $request->phone;
                $result->location = $request->location;
                $result->avatar =  URL::asset('uploads/avatar/'.$fileName);
                $result->save();
            } else {
                //add user
                $result = new User;
                $result->email = $request->email;
                $result->password = Hash::make($request->password);
                $result->company_name = $request->company_name;
                $result->phone = $request->phone;
                $result->location = $request->location;
                $result->avatar =  URL::asset('uploads/avatar/'.$fileName);
                $result->save();
            }
        }
    }

    public function userEdit(Request $request)
    {
        // $id = $request->id;
        // $result = User::where('id', $id)->first();
        // return response()->json($result);
    }

    public function userDelete(Request $request)
    {
        $id = $request->id;
        $result = User::where('id', $id)->delete();
        return response()->json($result);
    }
}
