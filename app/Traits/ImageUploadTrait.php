<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait{

	public function verifyAndUpload(Request $request,$fieldname='image',$directory='public/storage')
	{
                if($request->hasFile($fieldname)){
                        if(!$request->file($fieldname)->isValid()){
        	       flash('Invalid Image')->error()->important();

        	return redirect()->back()->withInput();
        }
        	//Get filename with extention
                $filenameWithExt = $request->file($fieldname)->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file($fieldname)->getClientOriginalExtension();
                //File to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file($fieldname)->storeAs($directory,$fileNameToStore);
        	
                return $fileNameToStore;
        }

                return null;
	}
}