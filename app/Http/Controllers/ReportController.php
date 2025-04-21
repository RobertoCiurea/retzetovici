<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;


class ReportController extends Controller
{
    public function index(){
        return view('report-problem');
    }

    public function store(Request $request):RedirectResponse{
        $incomingFields= $request->validate([
            'name'=>'required|min:3|max:255|string',
            'email'=>'required|min:3|max:255|email',
            'title'=>'required|min:5|max:255|string',
            'image'=>'mimes:png,jpg,jpeg|image|nullable',
            'url'=>'nullable|string',
            'description'=>'required|min:10|string',
        ]);
 

        //format image
        if($request->hasFile('image')){
            $image=Image::read($incomingFields['image']);
            $imageName = time().'.'.$incomingFields['image']->getCLientOriginalExtension();
            
            $resizedImage = $image->resize(600, 400, function($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $path = '/images/reports/'.$imageName;
            //convert image to string;
            $imageData = (string) $resizedImage->encode();
            Storage::disk('public')->put($path, $imageData);
            $imageUrl = Storage::url($path);
            $incomingFields['image'] =$imageUrl;
        }else{
            $incomingFields['image']='https://placehold.co/600x400/EEE/31343C?font=raleway&text=Report';
        }
        Report::create([
            'name'=>$incomingFields['name'],
            'email'=>$incomingFields['email'],
            'title'=>$incomingFields['title'],
            'url'=>$incomingFields['url'] ? $incomingFields['url'] : NULL,
            'image'=>$incomingFields['image'],
            'description'=>$incomingFields['description'],
        ]);
        return redirect()->back()->with(['success'=>'Problema dumneavoastră a fost raportată cu success!']);
    }
    
    public function update($id, Request $request):RedirectResponse{
        $incomingFields =$request->validate([
            'status' => ['required', Rule::in(['resolved', 'unresolved', 'in-process'])],
        ]);
        $report = Report::findOrFail($id);
        if($report){
            $report->status = $incomingFields['status'];
            $report->save();
            return redirect()->back()->with(['success'=>"Status modificat cu success"]);
        }else{
            return redirect()->back()->with(["error"=>"Reportul nu a fost gasit"]);
        }
    }

    public function delete($id):RedirectResponse{
        $report = Report::findOrFail($id);
        if($report){
            //remove image from public disk storage
            $imagePath = public_path($report->image);
            if(File::exists($imagePath)){
                File::delete($imagePath);
            }

            $report->delete();
            return redirect()->back()->with(["success"=>"Report sters cu succes!"]); 
        }else{
            return redirect()->back()->with(["error"=>"Reportul nu a fost gasit"]);
        }
    }

    public function details($id){
        $report = Report::findOrFail($id);
        if($report){
            return view('report-details-page', compact('report'));
        }else{
            return redirect()->back()->with(["error"=>"Oops... Ceva nu a mers bine!"]);
        }
    }

}
