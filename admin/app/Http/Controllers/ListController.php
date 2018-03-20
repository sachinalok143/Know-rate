<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Shopkeeper;
class ListController extends Controller
{
   
   public function getAllUsers()
   {
   	$users=Customer::All();
   	return response()->json( ['users'=>$users],200);
   }

   public function getAllShopkeepers()
   {
   	$shopkeepers=Shopkeeper::All();
   	return response()->json( ['shopkeepers'=>$shopkeepers],200);
   }
}
