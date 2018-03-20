<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Auth;
use Image;
use App\Review;
use App\User;
use App\Shopkeeper;
use App\Category;

class itemController extends Controller
{
   public function getItemBySaopkeeper()
   {
   	
   	$categories=\DB::table('categories')->get();
   	$items=Item::all();
    $reviews=$this->getItemReviewConnection($items);
    $shopkeepers=Shopkeeper::all();
   	return response()->json(['items'=>$items,'shopkeepers'=>$shopkeepers,'reviews'=>$reviews,'categories'=>$categories],200);
   }

   public function getItemByCategory($id)
   {
   	if($id){
    	$items=Item::where('categoryId',$id)->get();
      $reviews=$this->getItemReviewConnection($items);
    	}
    	else{
    		$items=Item::all();	
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
    // dd($request->category);
    $category=\DB::table('categories')->where('name',$request->category)->get();
    if(!count($category)){
      $newCategory=new Category();
      $newCategory->name=$request->category;
      $newCategory->save();
      $categories=Category::All();
      return response()->json(['categories'=>$categories],200);
    }
    else
    {
      return response()->json(['error'=>'category already exist!'],200);
    }
   }

  /* public function addItemByShopkeeper(Request $request)
   {
    // dd($request);
     $item=new Item();
     $item->name=$request->name;
     $item->shopId=$request->shopkeeperId;
     $item->rate=$request->rate;
     $item->brand=$request->brand;
     $item->categoryId=$request->categoryId;
     if($request->hasFile('file'))
       {
        $image=$request->file('file');
           $filename=time().'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(300,300)->save(public_path('uploads/itemImage/'.$filename));
       $item->photo=$filename;
      }
     $save=$item->save();
     $items=Item::all();
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
     if($save){
      return response()->json( ['items'=>$items,'reviews'=>$reviews],200);
     }
     else
     {
      return response()->json(['message'=>'Items not added'],200);
     }
      
   }*/

   /*public function editItemByShopkeeper(Request $request)
   {
     $item=Item::find($request->id);
     $item->name=$request->name;
     $item->shopId=$request->shopkeeperId;
     $item->rate=$request->rate;
     $item->brand=$request->brand;
     $item->categoryId=$request->categoryId;
     if($request->hasFile('file'))
       {
        $image=$request->file('file');
           $filename=time().'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(300,300)->save(public_path('uploads/itemImage/'.$filename));
       $item->photo=$filename;
      }
     $save=$item->save();
     $items=Item::all();
     if($save){
      return response()->json(['items'=>$items],200);
     }
     else
     {
      return response()->json(['message'=>'Items not saved'],404);
     }
   }*/

   public function deleteItemById($id)
   {
     $item=Item::find($id);
      $item->delete();
      $items=Item::all();
      $reviews=$this->getItemReviewConnection($items);
      
      return response()->json( ['items'=>$items,'reviews'=>$reviews],200);
    
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
                      $review->userName=$custmer->name;
                    }
                    else{
                      $review->userName='unknown';
                    }
              }
           }
          }
         return $reviews; 
   }

   public function deleteBeviewById(Request  $request)
   {
    $review=Review::find($request->reviewId);
      if($review){
       $review->delete();
       $items=Item::all();
       $reviews=$this->getItemReviewConnection($items);
       return response()->json(['items'=>$items,'reviews'=>$reviews],200);
     }else{
      return response()->json(['error'=>'review not found!'],200);
     }
    }
}
