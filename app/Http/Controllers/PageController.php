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




   	// public function getMenu(){
    //      $detail_first_menu = Menu::with('Foods')->first();
      
    //      $menu = Menu::all();
    //      // dd($menu);
   	// 	return view('pages.menu',compact('detail_first_menu','menu'));
   	// }

      public function getDetailMenu(Request $req){
         
         $id = isset($req->id) ? (int)$req->id : 0;
         if($id === 0){
            $detail_first_menu = Menu::with('Foods')->first();
         }
         else{
            $detail_first_menu = Menu::with('Foods')
                                 ->where('id',$id)
                                 ->first();
         }
         
         if(!$detail_first_menu){
            return redirect()->back()->with('thongbao','Không tìm thấy menu');
         }
         else{
            $menu = Menu::all();
            return view('pages.menu',compact('menu','detail_first_menu'));
         }
      }
      


   	public function getFoodByType(){
         $type = FoodType::orderBy('id')->get();

         $type_first = FoodType::orderBy('id')->first();
         $id_type = $type_first->id;
         $foods = Foods::where('id_type',$id_type)->paginate(6);

   		return view('pages.food_type',compact('type','foods','id_type'));
   	}

      public function ajaxGetFoodByType(Request $req){
         $id_type = $req->id_type;

         $foods = Foods::where('id_type',$id_type)->orderBy('id')->paginate(6);

         return view('ajax.list_foods_by_type',compact('foods','id_type'));
      }


      public function ajaxGetProductPagination(Request $req){
         $id_type = $req->id_type;
         $trang = isset($req->trang_so) && $req->trang_so > 0 ? $req->trang_so : 1;

         $vitri = ($trang - 1)*6;
         // echo $req->trang_so;
         // echo $vitri;
         $foods = Foods::where('id_type',$id_type)
                        ->offset($vitri)
                        ->limit(6)
                        ->orderBy('id')
                        ->get();
         $foodAll = Foods::where('id_type',$id_type)->orderBy('id')->paginate(6);
         
         return view('ajax.list_foods_by_type',compact('foods','id_type','foodAll','trang'));
      }



   	public function getSearch(){
   		return view('pages.search');
   	}

   	public function getCart(){
   		return view('pages.cart');
   	}



   }
