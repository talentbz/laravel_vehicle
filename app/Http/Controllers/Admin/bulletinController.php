<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB, Validator, Exception;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Models\Company;
use App\Models\Bulletin;

class bulletinController extends Controller
{
    public function index(Request $request){
        $userId = Auth::user()->id;
        $company = Company::select('id')->where('user_id', $userId)->first();
        if($company){
            $bulletins = Bulletin::where('company_id', $company->id)->orderBy('created_at', 'DESC')->get();
            
        } else {
            $bulletins = [];
        }  
        return view('admin.pages.bulletin.index', [
            'bulletins' =>$bulletins,
        ]);  
    }

    public function details(Request $request, $id){
        return view('admin.pages.bulletin.details', [
            
         ]);
    }
    public function add(Request $request){
        $categories = [
            '求人',
            '仕事求む',
            '仕事依頼',
            '車両探し',
            'その他',
        ];
        
        return view('admin.pages.bulletin.add', [
           'categories' => $categories,
        ]);
    }
    public function edit(Request $request, $id){
        $categories = [
            '求人',
            '仕事求む',
            '仕事依頼',
            '車両探し',
            'その他',
        ];
        $bulletin = Bulletin::where('id', $id)->first();
        return view('admin.pages.bulletin.edit', [
            'categories' => $categories,
            'bulletin' => $bulletin,
         ]);
        
    }
    public function store(Request $request){
        $id = $request->id;
        if($id){
            $bulletin = Bulletin::where('id', $id)->first();
            $bulletin->title = $request->title;
            $bulletin->deadline_date = $request->deadline;
            $bulletin->content = $request->content;
            $bulletin->save();
        } else {
            $userId = Auth::user()->id;
            $users = User::where('id', $userId)->first();
            $companyId = Company::where('user_id', $userId)->first()->id;
            $bulletin = new Bulletin;
            $bulletin->company_id = $companyId;
            $bulletin->category = $request->category;
            $bulletin->title = $request->title;
            $bulletin->deadline_date = $request->deadline;
            $bulletin->content = $request->content;
            $bulletin->save();
        }
    }
    public function destroy(Request $request){
        $id = $request->id;
        if($id){
            $result = Bulletin::where('id', $id)->delete();
            return response()->json($result);
        }
    }
}
