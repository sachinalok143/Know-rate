<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;
use App\User;
use Hash;
use App\AdminRecomendation;


class ProfileController extends Controller
{
   
  public function updateProfile( Request $request)
  {
    $user=Auth::user();
    // dd($request->address);
    $user->name=$request->name;
    $user->address=$request->address;
    $user->email=$request->email;
    // $user->shopName=$request->shopName;
    if($request->country){
    $user->country=$request->country;
    }
    if($request->state){
    $user->state=$request->state;
    }
    $user->remark=$request->remark;
    $user->city=$request->city;
    // $user->landmark=$request->landmark;
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
 
 public function userProfile(Request $request)
 {
    $user=\DB::table('users')->where('id',$request->userId)->first();
    if($user){
    return view('otherView.userProfile',['user'=>$user]);
    }
    else return back();
  }

 

 public function getAdminRecommendation()
{
     $recommendations=AdminRecomendation::all();
     $recommendations=$this->recommendationAdminConnection($recommendations);
    return response()->json(['status'=>1,'recommendations'=>$recommendations],200);
}

public function addAdminRecommendation($contact)
{
  $recommend=User::where('contact',$contact)->get();
  $recommend1=AdminRecomendation::where('contact',$contact)->get();
  // dd(count($recommend1),count($recommend));
  if(count($recommend)||count($recommend1)){
      return response()->json(['error'=>'not saved'],200);  
  }
  else
  {
    $recommendation=new AdminRecomendation();
    $recommendation->contact=$contact;
    $recommendation->superUser=Auth::user()->id;
    $recommendation->Save();
    $status=1;
    $recommendations=AdminRecomendation::all();
    $recommendations= $this->recommendationAdminConnection($recommendations);
    return response()->json(['status'=>$status,'recommendations'=>$recommendations],200);
  }
}
 public function recommendationAdminConnection($recommendations)
  {
    if($recommendations){
      foreach ($recommendations as $recommendation) {
        $superUser=User::find($recommendation->superUser);
        if($superUser){
          $recommendation->superUser=$superUser;
        }
      }
    return $recommendations;
    }
  }
public function deleteAdminRecommendation($id)
{
  $recommend=AdminRecomendation::find($id);
  if($recommend){
    $recommend->delete();
    $recommendations=AdminRecomendation::all();
     $recommendations=$this->recommendationAdminConnection($recommendations);
    return response()->json(['status'=>1,'recommendations'=>$recommendations],200);
  }
  else
  {
    return response()->json(['error'=>'not saved'],200); 
  }
}


}
