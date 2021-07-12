<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB, Validator, Exception;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Models\Company;
use App\Models\CompanyMedia;

class companyController extends Controller
{
    public function index(Request $request){
        // $userId = Auth::user()->id;
        // $users = User::where('id', $userId)->first();
        // $company = Company::where('user_id', $userId)->first();
        // $companyPhotos = CompanyMedia::where('user_id', $userId)->get();
        $company_infos = Company::select('company_details.*', 'users.location', 'users.email', 'users.phone', 'users.location', 'company_media.path')
                                 ->join('users', 'company_details.user_id', '=', 'users.id')
                                 ->join('company_media', 'company_details.id', '=', 'company_media.company_id')
                                 ->groupBy('company_details.id')
                                 ->orderBy('company_details.created_at', 'desc')
                                 ->get();
        return view('admin.pages.company.index', [
            'company_infos' => $company_infos,
        ]);
    }
    public function create(Request $request){
        
        
        return view('admin.pages.company.create', [
            
        ]);
    }

    public function details(Request $request, $id){
        
        $company = Company::where('id', $id)->first();
        $userId = Company::select('users.id')
                         ->join('users', 'company_details.user_id', '=', 'users.id')
                         ->where('company_details.user_id', '=', $company->user_id)
                         ->first()->id;
        $users = User::where('id', $userId)->first();
        $companyPhotos = CompanyMedia::where('company_id', $id)->get();
        return view('admin.pages.company.details', [
            'users' => $users,
            'company' => $company,
            'companyPhotos' => $companyPhotos,
        ]);
    }

    public function edit(Request $request, $id){

        $company = Company::where('id', $id)->first();
        $userId = Company::select('users.id')
                         ->join('users', 'company_details.user_id', '=', 'users.id')
                         ->where('company_details.user_id', '=', $company->user_id)
                         ->first()->id;
        $users = User::where('id', $userId)->first();
        $company = Company::where('id', $id)->first();
        $image_paths = CompanyMedia::where('company_id', $id)->get();
        $path_array = [];
        $id_array = [];
        foreach($image_paths as $image_path){
            $path = $image_path->path;
            $id = $image_path->id;
            array_push($path_array, $path);
            array_push($id_array, ["key"=>$id]);
        }
        return view('admin.pages.company.edit', [
            'users' => $users,
            'company' => $company,
            'image_paths' => $path_array,
            'id_array'   => $id_array,
        ]);
    }
    public function store(Request $request){
        
        $userId = Auth::user()->id;
        $phone = $request->phone;
        $location = $request->location;
        $site_url = $request->site_url;
        $description = $request->description;
        //save user info
        $user = User::find($userId);
        $user->phone = $phone;
        $user->location = $location;
        $user->save();

        //save company info
        $company_exist = Company::where('user_id', $userId)->count();
        if($company_exist > 0){
            $company_id = Company::where('user_id', $userId)->first()->id;
            $company = Company::where('id', $company_id)->first();
            $company->user_id = $userId;
            $company->site_url = $site_url;
            //$company->name = $request->name;
            $company->member = $request->member;
            $company->description = $description;
            $company->save();    
        } else {
            $company = new Company;
            $company->user_id = $userId;
            $company->site_url = $site_url;
            //$company->name = $request->name;
            $company->member = $request->member;
            $company->description = $description;
            $company->save();
        }
        return response()->json('saved');
    }
    public function photoDestroy(Request $request){
        $userId = Auth::user()->id;
        $id = $request->key;
        $result = CompanyMedia::where('id', $id)->delete();
        return response()->json(['result' => true, 'deleted' => $result]);
    }
    public function photoStore(Request $request){
        $userId = Auth::user()->id;
        $company = Company::where('user_id', $userId)->first();
        if(is_null($company)){
            $companyId = Company::latest()->first()->id;
            $companyId ++;
            if ($request->has('file')) { 
                $extension = $request->file->extension();
                $imageName = round(microtime(true) * 1000) . '.' . $extension;
                $request->file->move(public_path('uploads/company/'.$userId.'/'), $imageName);
            }
            $filePath = URL::asset('uploads/company/'.$userId.'/'.$imageName);
            $result = new CompanyMedia;
            $result->company_id = $companyId;
            $result->path = $filePath;
            $result->save();
        } else {
            if ($request->has('file')) { 
                $extension = $request->file->extension();
                $imageName = round(microtime(true) * 1000) . '.' . $extension;
                $request->file->move(public_path('uploads/company/'.$userId.'/'), $imageName);
            }
            $filePath = URL::asset('uploads/company/'.$userId.'/'.$imageName);
            $result = new CompanyMedia;
            $result->company_id = $company->id;
            $result->path = $filePath;
            $result->save();
        }
        return response()->json(['uploaded' => 'uploads/company/'.$userId.'/']);
    }

    public static function userCheck($id){
        //$userId = Auth::user()->id;
        //dd(Company::where('user_id', $id)->first());
        $company = Company::where('user_id', $id)->first();
        return $company;
    }
}
