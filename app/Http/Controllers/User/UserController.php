<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function home(){
        $pizza=Product::orderBy('created_at','desc')->get();
        $category=Category::get();
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        $history=Order::where('user_id',Auth::user()->id)->get();
        return view('user.main.home',compact('pizza','category','cart','history'));
    }
    public function changePasswordPage(){
        return view ('user.password.change');
    }
    public function changePassword(Request $request){
        $this->passwordValidationCheck($request);
        $currentUserId=Auth::user()->id;
        $user=User::select('password')->where('id',$currentUserId)->first();
        $dbPassword=$user->password;
        if(Hash::check($request->oldPassword,$dbPassword)){
         User::where('id',Auth::user()->id)->update([
         'password'=>Hash::make($request->newPassword)]);
        //  Auth::logout();
         return back()->with(['changeSuccess'=>'Password Changed....']);
        }
        return back()->with(['notMatch'=>'Fking Wrong Password!']);
    }
    public function accountChangePage(){
        return view('user.profile.account');
    }
    public function filter($categoryId){
        $pizza=Product::where('category_id',$categoryId)->orderBy('created_at','desc')->get();
        $category=Category::get();
        $cart=Cart::where('user_id',Auth::user()->id)->get();
        $history=Order::where('user_id',Auth::user()->id)->get();
        return view('user.main.home',compact('pizza','category','cart','history'));
    }

    public function history(){
        $order=Order::where('user_id',Auth::user()->id)->paginate(4);
        return view('user.main.history',compact('order'));
    }

    public function accountChange($id,Request $request){
        $this->accValidationCheck($request);
            $data=$this->getUserData($request);
            //for image
            if($request->hasFile('image')){
                $dbImage = User::where('id',$id)->first();
                $dbImage=$dbImage->image;

                if($dbImage != null){
                    Storage::delete('public/'.$dbImage);
                }

                $fileName=uniqid() . $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('public',$fileName);
                $data['image'] = $fileName;
            }
            User::where('id',$id)->update($data);
            return back()->with(['updateSuccess'=>'Admin Account change Pe Par B...']);
    }

    public function userList(){
        $users=User::where('role','user')
        ->paginate(3);
        return view("admin.user.list",compact('users'));
    }
    public function pizzaDetails($pizzaId){
        $pizza=Product::where('id',$pizzaId)->first();
        $pizzaList=Product::get();
        return view('user.main.details',compact('pizza','pizzaList'));
    }
    public function cartList(){
        $cartList=Cart::select('carts.*','products.name as pizza_name','products.price as pizza_price','products.image as product_image')->
        leftJoin('products','products.id','carts.product_id')
        ->where('carts.user_id',Auth::user()->id)->get();
        $totalPrice= 0;
        foreach($cartList as $c){
            $totalPrice += $c->pizza_price*$c->qty;
        }
        return view('user.main.cart',compact('cartList','totalPrice'));
    }
    public function userChangeRole(Request $request){
        $updateSource=[
            'role' => $request->role
        ];
            User::where('id',$request->userId)->update($updateSource);
    }
    private function passwordValidationCheck($request){
        Validator::make($request->all(),[
            'oldPassword'=>'required|max:12',
            'newPassword'=>'required|min:6|max:12',
            'confirmPassword'=>'required|min:6|same:newPassword'
        ],[
            'oldPassword.required'=> 'so stupid'
        ])->validate();
    }
    private function getUserData($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now(),
        ];
    }
    private function accValidationCheck($request){
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'image' => 'mimes:png,jpg,jpeg,webp|file',
            'phone' => 'required',
            'address' => 'required',
        ])->validate();
    }

    public function userDelete($id){
        User::where('id',$id)->delete();
        return redirect()->route('admin#userList')->with(['deleteSuccess'=>'Subject Destroyed Successfully...']);
    }

    public function userDetail($id){
        $users = User::select('users.*')->where("users.id",$id)->first();
        return view('admin.user.detail',compact('users'));
    }

}
