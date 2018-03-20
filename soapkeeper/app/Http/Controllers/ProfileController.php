<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;
use App\User;
use Hash;

class ProfileController extends Controller
{
   
  public function updateProfile( Request $request)
  {
    $user=Auth::user();
    // dd($request->address);
    $user->name=$request->name;
    $user->address=$request->address;
    $user->email=$request->email;
    $user->shopName=$request->shopName;
    if($request->country){
    $user->country=$request->country;
    }
    if($request->state){
    $user->state=$request->state;
    }
    $user->remark=$request->remark;
    $user->city=$request->city;
    $user->landmark=$request->landmark;
    $user->save();
    return back();    
  }

   public function updateProfilePic(Request $request)
   {
       if($request->hasFile('image'))
       {
           $image=$request->file('image');
           $filename=time().'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(300,300)->save(public_path('uploads/User/'.$filename));
           $user=Auth::User();
           $user->avatar=$filename;
           $user->save();
           return back();
       }
   }
   public function updateCoverPic(Request $request)
   {
       if($request->hasFile('image'))
       {
           $image=$request->file('image');
           $filename=time().'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(300,300)->save(public_path('uploads/UserCover/'.$filename));
           $user=Auth::User();
           $user->avatarCover=$filename;
           $user->save();
           return back();
       }
   }
public function resetPassword($id,Request $request)
{
  $user=User::find($id);
  // dd(Hash::make($request->password),$user->password);
  if(Hash::check($request->password,$user->password)){
    $user->password=Hash::make($request->newPassword);
    $user->save();
    return response()->json(['status'=>1],200);
  }
  else{
    return response()->json(['status'=>0],200); 
  }
}

}
