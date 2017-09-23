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
use App\Cart;
use Session;

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



      public function getAddToCart(Request $req){
         $qty = isset($req->qty) ? $req->qty : 1;
         $food = Foods::where('id',$req->id)->first();
         if($food){


            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            //dd($oldCart);
            $cart = new Cart($oldCart);
            
            $cart->add($food,$req->id,$qty);

            $req->session()->put('cart', $cart); //
            //dd(Session::get('cart'));
            //dd($cart);
            return redirect()->back();
         }



      }


   	public function getSearch(){
   		return view('pages.search');
   	}

   	public function getCart(){

         $cart = Session::has('cart') ? Session::get('cart') : null;
         //dd($cart);
   		return view('pages.cart',compact('cart'));
   	}


      public function getDelItemCart(Request $req){
         $food = Foods::where('id',$req->id)->first();
         if($food){
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->removeItem($req->id);

            if(count($cart->items)<=0){
               $req->session()->forget('cart');
               echo "null";
            }
            else{
               $req->session()->put('cart', $cart);
               //echo 'true';
               $tongtien = number_format($cart->totalPrice);
               echo $tongtien;
            }
         }
         else{
            echo 'false';
         }
         return;
      }


   public function getUpdateItemCart(Request $req){
      $food = Foods::where('id',$req->id)->first();

      if($food){
         $oldCart = Session::has('cart') ? Session::get('cart') : null;
         
         $cart = new Cart($oldCart);
         
         $cart->update($food, $req->id, $req->qty);
         
         $req->session()->put('cart', $cart);
         
         $totalPriceItem = number_format($cart->items[$req->id]['price']);

         $totalPrice = number_format($cart->totalPrice);

         echo json_encode([
            'totalPriceItem'=>$totalPriceItem,
            'totalPrice'=>$totalPrice,'qty'=>$req->qty
         ]);
      }
   }

   public function postCheckout(Request $req){

      $this->validate($req,
         [
            'fullname' => "required|min:5|max:30",
            'email' => "required|email",
            'address' => 'required',
            'phone' => 'required|min:10|max:20'
         ],
         [
            'fullname.required' => 'Vui lòng nhập họ tên',
            'fullname.min' => 'Họ tên ít nhất 5 kí tự',
            'fullname.max' => 'Họ tên không quá 30 kí tự',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Điện thoại không được rỗng',
            'phone.min' => 'Điện thoại ít nhất 10 kí tự',
            'phone.max' => 'Điện thoại không quá 20 kí tự',
         ]);
      try{
         $customer = new Customers();
         $customer->name = $req->fullname;
         $customer->gender = $req->gender;
         $customer->email = $req->email;
         $customer->address = $req->address;
         $customer->phone = $req->phone;
         $customer->note = $req->note;
         $customer->save();

         if($customer){         
            $cart = Session::get('cart');
            $totalPrice = $cart->totalPrice;

            $bill = new Bills;
            $bill->id_customer = $customer->id;
            $bill->date_order = date('Y-m-d');
            $bill->total = $totalPrice;
            $bill->payment_method = $req->payment;
            $bill->note = $req->note;
            $bill->save();

            if($bill){
               foreach($cart->items as $key=>$value){
                  $bill_detail = new BillDetail;
                  $bill_detail->id_bill = $bill->id;
                  $bill_detail->id_food = $key;
                  $bill_detail->quantity = $value['qty'];
                  $bill_detail->price = $value['price'];
                  $bill_detail->save();
               }
            }
            Session::forget('cart');
            return redirect()->back()->with('thongbao','Đặt hàng thành công');
         }
      }
      catch(Exception $e){
         throw new Exception("Error Processing Request", 1);
         
      }
   }


}
