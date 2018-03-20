<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Auth;
use Image;
use App\Review;
use App\User;


class itemController extends Controller
{
   public function getItemBySaopkeeper()
   {
   	if(Auth::user()){
   	$categories=\DB::table('categories')->get();
   	$items=Item::where('shopId',Auth::user()->id)->get();
    $reviews=$this->getItemReviewConnection($items);
    $shopkeeper=Auth::user();
   	return response()->json(['items'=>$items,'shopkeeper'=>$shopkeeper,'reviews'=>$reviews,'categories'=>$categories],200);
   }
   else
   {
   	return response()->json(['message'=>'No Authentication'],404);
   }
   }

   public function getItemByCategory($id)
   {
   	if($id){
    	$items=Item::where('categoryId',$id)->where('shopId',Auth::user()->id)->get();
      $reviews=$this->getItemReviewConnection($items);
    	}
    	else{
    		$items=Item::where('shopId',Auth::user()->id)->get();	
        $reviews=$this->getItemReviewConnection($items);
    	}
    	if($items)
    	{
    		return response()->json(['items'=>$items,'reviews'=>$reviews],200);
    	}
    	else
    	{
    		return response()->json(['message'=>'No item available'],404);
    	}
   }

   public function addItemByShopkeeper(Request $request)
   {
    
     $items=Item::where('shopId',Auth::user()->id)->get();
       $reviews=$this->getItemReviewConnection($items);     
     if($items){
      return response()->json( ['items'=>$items,'reviews'=>$reviews],200);
      }
      else
     {
      return response()->json(['message'=>'Items not added'],200);
     }
      
   }

   public function editItemByShopkeeper(Request $request)
   {
    // dd($request->categoryId+1);
     $item=Item::find($request->id);
     $item->name=$request->name;
     $item->shopId=Auth::user()->id;
     $item->rate=$request->rate;
     $item->brand=$request->brand;
     $item->categoryId=$request->categoryId+1;
     if($request->hasFile('image'))
       {
        $image=$request->file('image');
           $filename=time().'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(300,300)->save(public_path('uploads/itemImage/'.$filename));
       $item->photo=$filename;
      }
     $save=$item->save();
     $items=Item::where('shopId',Auth::user()->id)->get();
     $reviews=$this->getItemReviewConnection($items);
     if($save){
      return response()->json(['items'=>$items,'reviews'=>$reviews],200);
     }
     else
     {
      return response()->json(['message'=>'Items not saved'],404);
     }
   }

   public function deleteItemById($id)
   {
     $item=Item::find($id);
     if($item->shopId==Auth::user()->id){
      $item->delete();
      $items=Item::where('shopId',Auth::user()->id)->get();
      $reviews=$this->getItemReviewConnection($items);
      
      return response()->json( ['items'=>$items,'reviews'=>$reviews],200);
     } 
     else
     {
      return response()->json( ['message'=>'Item Deleted Successfully'],404);
     }
   }

   public function getItemReviewConnection($items)
   {
    $reviews=[];
     for ($i=0; $i <count($items) ; $i++) { 
            $reviews[$i]=Review::where('itemId',$items[$i]->id)->get();
            if(count($reviews[$i])){
              foreach ( $reviews[$i] as $review) {
                 $custmer=\DB::table('users')->where('id',$review->userId)->first();
                    if($custmer){
                      $review->userId=$custmer->name;
                    }
                    else{
                      $review->userId='unknown';
                    }
              }
           }  
          }
         return $reviews; 

   }
  public function addImage(Request $request)
  {
     $item=new Item();
     $item->name=$request->name;
     $item->shopId=Auth::user()->id;
     $item->rate=$request->rate;
     $item->brand=$request->brand;
     $item->categoryId=$request->categoryId+1;
     if($request->hasFile('image'))
       {
        $image=$request->file('image');
           $filename=time().'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(300,300)->save(public_path('uploads/itemImage/'.$filename));
       $item->photo=$filename;
      }
     $save=$item->save();
     
  }
}
