<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sclass;

class SclassController extends Controller
{
    public function index(){
        $sclass = Sclass::latest()->get();
        return response()->json($sclass);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'class_name' => 'required|unique:sclasses|max:25'
        ]);

        if($validateData == true){
            $store = new Sclass();
            $store->class_name = $request->class_name;
            $store->save();
        }

        return response('Student Class Inserted Successfully');

    }

    public function edit(Request $request,$id){
        $validateEdit = $request->validate([
            'class_name' => 'required|max:25'
        ]);

        if($validateEdit == true){
            $update = Sclass::findOrFail($id)->update([
                'class_name' => $request->class_name
            ]);
        }

        if($update == true){
            return response('Student Class Updated Successfully');
        }
    }

    public function deleteClass($id){
        $delete = Sclass::findOrFail($id)->delete();
        if($delete == true){
            return response("Student Class Name Successfully Deleted");
        }
    }
}