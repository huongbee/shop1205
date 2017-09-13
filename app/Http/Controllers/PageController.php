<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Foods;
use App\BillDetail;
use App\Bills;
use App\Customers;
use App\FoodType;
use App\Menu;
use App\MenuDetail;
use App\RoleResource;
use App\User;

class PageController extends Controller
{
   	public function getIndex(){
   		$today = Foods::where('today',1)->get();
   		$foods = Foods::paginate(6);
   		return view('pages.index',compact('today','foods'));
   	}

      public function getProductPagination(Request $req){
         $trang = isset($req->trang_so) && $req->trang_so > 0 ? $req->trang_so : 1;

         $vitri = ($trang - 1)*6;

         $foods = Foods::limit(6)
                        ->offset($vitri)
                        ->orderBy('id')
                        ->get();
         return view('ajax.list_foods_home_page',compact('foods'));
      }




   	public function getMenu(){
         $detail_first_menu = Menu::with('Foods')->first();
      
         $menu = Menu::all();
         // dd($menu);
   		return view('pages.menu',compact('detail_first_menu','menu'));
   	}


   	public function getFoodByType(){
   		return view('pages.food_type');
   	}


   	public function getSearch(){
   		return view('pages.search');
   	}

   	public function getCart(){
   		return view('pages.cart');
   	}
}
