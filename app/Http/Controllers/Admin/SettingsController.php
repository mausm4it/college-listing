<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index(){
        
        return view('admin.settings.index');
       }

    public function UpdateSettings(Request $request, $id){
        $settings = Setting::find($id);

        $request->validate([
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

          if ($request->hasFile('logo')) {
             
            if ($settings->logo) {
                Storage::delete($settings->logo);
            }
    
          
    
            $imagePath = $request->file('logo')->storeAs('site_logo', 'logo' . now()->format('YmdHis') . '.' . $request->file('logo')->getClientOriginalExtension());
            $settings->logo = $imagePath;
           
        }


        if ($request->hasFile('icon')) {
             
            if ($settings->icon) {
                Storage::delete($settings->icon);
            }
    
          
    
            $imagePath = $request->file('icon')->storeAs('site_icon', 'icon' . now()->format('YmdHis') . '.' . $request->file('icon')->getClientOriginalExtension());
            $settings->icon = $imagePath;
           
        }


        $settings->name = $request->name;
        $settings->about = $request->about;
        $settings->address = $request->address;
        $settings->email = $request->email;
        $settings->phone = $request->phone;
        $settings->meta_keywords = $request->meta_keywords;
        $settings->meta_description = $request->meta_description;
        $settings->save();
        return redirect()->back()->with('success', 'Setting Update SUCCESSFULY');

    
       
       }
}
