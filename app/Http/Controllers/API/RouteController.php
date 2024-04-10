<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\User;
use Carbon\Carbon;

class RouteController extends Controller
{
    //
    public function productList(){
        $products= Product::get();
        $users=User::get();
        $data=[
            'product'=>$products,
            'user'=>$users
        ];
        return response()->json($data,200);
        }
        public function categoryList(){
            $categories= Category::orderBy('id','desc')->get();


            return response()->json($categories,200);
            }
            //using post method
            public function categoryCreate(Request $request){
                $data=[
                    'name'=>$request->name,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ];
                $response=Category::create($data);
                return response()->json($response,200);
            }
            public function contactCreate(Request $request){
                $data=[
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'message'=>$request->description,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ];
                // return $data;
                Contact::create($data);
                $response=Contact::orderBy('created_at','desc')->get();
                return response()->json($response,200);
                // return $request->all();
            }
            // public function categoryDelete(Request $request){
            //     $data=Category::where('id',$request->category_id)->first();
            //     if (isset($data)){
            //         Category::where('id',$request->category_id)->delete();
            //         return response()->json(['message'=>'delete success'],200);

            //     };
            //     return response()->json(['message'=>'delete fail'],200);

            // }
            //delete by get method
            public function categoryDelete($id){
                $data=Category::where('id',$id)->first();
                if (isset($data)){
                    Category::where('id',$id)->delete();
                    return response()->json(['message'=>'delete success','dataInfo'=>$data],200);

                };
                return response()->json(['message'=>'delete fail'],200);

            }
            public function categoryDetails(Request $request){
                    $data=Category::where('id',$request->category_id)->first();
                if (isset($data)){
                    return response()->json(['message'=>'delete success','category'=>$data],200);

                };
                return response()->json(['message'=>'delete fail','category'=>"There is none"],200);

            }
            public function categoryUpdate(Request $request){
                $categoryId=$request->category_id;
                $dbSource=Category::where('id',$categoryId)->first();

                    if (isset($dbSource)){
                        $data=[
                        'name'=>$request->category_name,
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ];
                   $response= Category::where('id',$categoryId)->update($data);
                   return response()->json(['message'=>'update success','category'=>$response],200);
            };
            return response()->json(['message'=>'update fail','category'=>"There is none"],405);

        }
}
