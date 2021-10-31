<?php

namespace App\Http\Controllers;

use App\Content;
use App\ContentMaster;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CMSController extends Controller
{
    public function createField(Request $request){
        return view("cms.create_field")->with("section", $request->get("section", CMS_SECTIONS[0]));
    }

    public function editField(Request $request, ContentMaster $field){
        return view("cms.edit_field")
            ->with(compact("field"));
    }

    public function storeField(Request $request){
        ContentMaster::create($request->only(["name", "type", "section"]));
        return redirect()->to(route("home"));
    }

    public function updateField(Request $request, ContentMaster $field){
        $field->update($request->only(["name", "type", "section"]));
        return redirect()->to(route("home"));
    }

    public function deleteField(ContentMaster $field){
        $field->delete();
        return redirect()->to(route("home"));
    }

    public function optionsList(){
        return view("cms.options");
    }

    public function optionsUpdate(Request $request){
        $fields = $request->except("_token");
        foreach ($fields as $id => $value){
            $field = ContentMaster::find($id);
            if($field){
                $field->update([ "value" => $value ]);
            }
        }
        return redirect()->to(route("options"));
    }

    public function uploadFile(Request $request){
        $path = $request->file('file')->store('/uploads',env("UPLOADS_FILE_DRIVER", "public"));
        // $path =  Storage::disk('s3')->put('/uploads', $request->file('file'));
        return [
            "success" => true,
            "path" => $path,
        ];
    }
}
