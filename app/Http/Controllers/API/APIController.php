<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class APIController extends Controller
{
    public function userlistsCreate(Request $request)
    {    
        try {
            $data = $request->all();
            //file upload
            $extension = $request->avatar->extension();
            $fileName = round(microtime(true) * 1000) . '.' . $extension;
            $request->avatar->move(public_path('uploads/avatar'), $fileName);
            $data['avatar'] = URL::asset('uploads/avatar'.$fileName);
            
            $rules = array('email' => 'unique:users,email');

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                echo 'exist';
            }
            else {
                $result = User::create($data);
            }
            return response()->json(['result' => true, 'data' => $data]);
        } catch (Exception $e) {
            return response()->json(['result' => false, 'message' => $e->getMessage()]);
        }
    }
}
