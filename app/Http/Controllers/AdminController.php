<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function changePasswordPage(){
        return view('admin.account.changePassword');
    }
    //change Password
    public function changePassword(Request $request){
       $this->passwordValidationCheck($request);
       $currentUserId=Auth::user()->id;
       $user=User::select('password')->where('id',$currentUserId)->first();
       $dbPassword=$user->password;
       if(Hash::check($request->oldPassword,$dbPassword)){
        User::where('id',Auth::user()->id)->update([
        'password'=>Hash::make($request->newPassword)]);
        // return back();
        // Auth::logout();
        // return redirect()->route('auth#loginPage');
        return back()->with(['changeSuccess'=>'Password Changed....']);
       }
       return back()->with(['notMatch'=>'Fking Wrong Password!']);
    }
    //direct details page
    public function details(){
        return view('admin.account.details');
    }
        //direct profile page
        public function edit(){
            return view('admin.account.edit');
        }
        //update account
        public function update($id,Request $request){
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
            return redirect()->route('admin#details')->with(['updateSuccess'=>'Admin Account change Pe Par B...']);
        }
        public function list(){
            $admin=User::where('role','admin')
            ->when(request('key'),function($q){
                $q->orwhere('name','like','%'.request('key').'%')
                ->orwhere('email','like','%'.request('key').'%')
                ->orwhere('gender','like','%'.request('key').'%')
                ->orwhere('phone','like','%'.request('key').'%')
                ->orwhere('address','like','%'.request('key').'%');
            })->paginate(3);
            $admin->appends(request()->all());
            return view('admin.account.list',compact('admin'));
        }
        //account delete
        public function delete($id){
            User::where('id',$id)->delete();
            return back()->with(['deleteSuccess'=>'Admin is destroyed']);
        }
        public function changeRole($id){
            $account=User::where('id',$id)->first();
            return view('admin.account.changeRole',compact('account'));
        }
        public function change($id,Request $request){
            $data=$this->requestUserData($request);
            User::where('id',$id)->update($data);
            return redirect()->route('admin#list');
        }
        public function adminChangeRole(Request $request){
            $updateSource=[
                'role' => $request->role
            ];
                User::where('id',$request->adminId)->update($updateSource);
        }
        private function requestUserData($request){
            return[
                'role'=>$request->role
            ];
        }
        //request data
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
        //acc validation check
        private function accValidationCheck($request){
            Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required',
                'gender' => 'required',
                'image' => 'mimes:png,jpg,jpeg|file',
                'phone' => 'required',
                'address' => 'required',
            ])->validate();
        }
    //password Validation check
    private function passwordValidationCheck($request){
        Validator::make($request->all(),[
            'oldPassword'=>'required|max:12',
            'newPassword'=>'required|min:6|max:12',
            'confirmPassword'=>'required|min:6|same:newPassword'
        ],[
            'oldPassword.required'=> 'so stupid'
        ])->validate();
    }
}
