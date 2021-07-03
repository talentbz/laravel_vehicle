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
        //check exist email
        $rules = array('email' => 'unique:users,email');
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            echo 'exist';
        } else {
            $result = new User;  //create new user
            $result->email = $request->email;
            $result->password = Hash::make($request->password);
            $result->company_name = $request->company_name;
            $result->phone = $request->phone;
            $result->location = $request->location;
            //file upload
            if ($request->hasFile('file')) { 
                $extension = $request->file->extension();
                $fileName = round(microtime(true) * 1000) . '.' . $extension;
                $request->file->move(public_path('uploads/avatar'), $fileName);
                $result->avatar =  URL::asset('uploads/avatar/'.$fileName);
            }
            $result->save();
        }
    }

    public function userEdit(Request $request)
    {
        $id = $request->id;
        $result = User::where('id', $id)->first();
        if ($request->hasFile('file')) { 
            $extension = $request->file->extension();
            $fileName = round(microtime(true) * 1000) . '.' . $extension;
            $request->avatar->move(public_path('uploads/avatar'), $fileName);
            $result->avatar =  URL::asset('uploads/avatar/'.$fileName);
        } 
        
        //edit user
        $result->email = $request->email;
        $result->password = Hash::make($request->password);
        $result->company_name = $request->company_name;
        $result->phone = $request->phone;
        $result->location = $request->location;
        $result->save();
        return response()->json($result);
    }

    public function userDelete(Request $request)
    {
        $id = $request->id;
        $result = User::where('id', $id)->delete();
        return response()->json($result);
    }
}
