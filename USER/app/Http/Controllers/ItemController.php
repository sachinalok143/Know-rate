<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\Review;
use App\User;
use Carbon\Carbon;
use Auth;
use App\Shopkeeper;

class ItemController extends Controller
{
    public function getAllCategories()
    {
    	$categories=Category::all();
    	$items=Item::all();
        $shopkeepers=Shopkeeper::all();
        $reviews=Review::all();
        if($reviews){
        for ($i=0; $i <count($reviews) ; $i++) { 
            $reviews[$i]->userId=User::find($reviews[$i]->userId)->name;
            }
        }
    	if($categories )
    	{
    		return response()->json(['categories'=>$categories,'reviews'=>$reviews,'soapkeepers'=>$shopkeepers,'items'=>$items],200);
    	}
    	else{
    		return response()->json(['message'=>'No categories available'],404);
    	}
    }
    public function getItemByCategoryId($id)
    {
    	if($id){
    	$items=Item::where('categoryId',$id)->get();
    	}
    	else{
    		$items=Item::all();	
    	}
    	if($items)
    	{
    		return response()->json(['items'=>$items],200);
    	}
    	else
    	{
    		return response()->json(['message'=>'No item available'],404);
    	}

    }

/*    public function getReviewsByItem($id)
    {
     $reviews=Review::where('itemId',$id)->get();
     if($reviews){
        for ($i=0; $i <count($reviews) ; $i++) { 
            $reviews[$i]->userId=User::find($reviews[$i]->userId)->name;
        }
     return response()->json(['reviews'=>$reviews],200);   
    }
    else
    {
         return response()->json(['message'=>'error'],200);
    }
    }*/

    public function addReview(Request $request)
    {

        $review=new Review();
        $review->userId=Auth::user()->id;
        $review->review=$request->review;
        $review->rating=$request->rating;
        $review->itemId=$request->itemId;
        $review->save();
       $reviews=Review::where('itemId',$request->itemId)->get();
         if($reviews){
            for ($i=0; $i <count($reviews) ; $i++) { 
                $reviews[$i]->userId=User::find($reviews[$i]->userId)->name;
            }
         return response()->json(['reviews'=>$reviews],200);   
        }
        else
        {
             return response()->json(['message'=>'error'],200);
        }
    }

    /*public function getItemForeignId($id)
    {
        $item=Item::find($id);
        if($item){
        $shopId=Shopkeeper::find($item->shopId);
        $Category=\DB::table('categories')->find($item->categoryId)->name;
        return response()->json(['shopId'=>$shopId,'Category'=>$Category],200);
        }
    }*/
}
