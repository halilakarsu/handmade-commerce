<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
     public function index()
    {
        $users=User::all()->sortBy('user_must');
        return view('backend.users.index',compact('users'));
    }
    public function create()
    {
        return view('backend.users.create');
    }
    public function store(Request $request)
    {
        if($request->hasFile('user_file')){
            $request->validate([
                'email'=>'required',
                'name'=>'required',
                'password'=>'required',
                'user_role'=>'required',
                'user_file'=>'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

        }
        $file_name='profile'.rand(1,10000).'.'.$request->user_file->getClientOriginalExtension();
        $request->user_file->move(public_path('backend/images/users'),$file_name);
        $users=User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'user_file'=>$file_name,
            'password'=>Hash::make($request->password),
            'user_role'=>$request->user_role,
            'user_status'=>$request->user_status
        ]);
        if($users){
          return redirect(route('users.index'))->with('success','Kayıt Başarılı');
        }
        return back()->with('error','Kayıt Başarısız');
    }


    public function edit(string $id)
    {
        $users=User::where('id',$id)->first();

        return view('backend.users.edit',compact('users'));
    }


    public function update(Request $request, $id)
    {

        if($request->hasFile('user_file')){
            $request->validate([
                'name'=>'required',
                'email'=>'required|email',
                'user_role'=>'required',
                'user_file'=>'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);
            $file_name='profile'.rand(1,10000).'.'.$request->user_file->getClientOriginalExtension();
            $request->user_file->move(public_path('backend/images/users'),$file_name);
            if(strlen($request->password)>0){
                $request->validate([
                    'password'=>'required|min:8'
                ]);
                $users=User::where('id',$id)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'user_file'=>$file_name,
                    'password'=>Hash::make($request->password),
                    'user_role'=>$request->user_role,
                    'user_status'=>$request->user_status
                ]);
            }else {
                $users=User::where('id',$id)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'user_file'=>$file_name,
                    'user_role'=>$request->user_role,
                    'user_status'=>$request->user_status
                ]);
            }


        } else {
            if(strlen($request->password)>0){
                $request->validate([
                    'password'=>'required|min:8'
                ]);
                $users=User::where('id',$id)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'user_role'=>$request->user_role,
                    'user_status'=>$request->user_status
                ]);
            }else {
                $users=User::where('id',$id)->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'user_role'=>$request->user_role,
                    'user_status'=>$request->user_status
                ]);
            }

        }
        if($users){
            return redirect(route('users.index'))->with('success','Kayıtlar Güncellendi');
            }
             return back()->with('error','Kayıtlar Güncellenemedi.');
            }


    public function destroy($id)
    {
        $destroyType=User::find(intval($id));
        if($destroyType->delete())
        {
            echo 1;
        }
        else {
            echo 0;
        }
    }

    public function sortable()
    {
        foreach ($_POST['item'] as $key => $value) {
            $users = User::find(intval($value));
            $users->user_must = intval($key);
            $users->save();
        }
        return true;
    }
    public function switch(Request $request, $id){
        $status = User::where('id', intval($id))->update([
            'user_status' => $request->sts // Status bilgisini request üzerinden alıyoruz.
        ]);
        if($status){
            return response()->json(['success' => true, 'message' => "İşlem Başarılı"]);
        } else {
            return response()->json(['error' => false, 'message' => "İşlem Başarısız"]);
        }
    }
}
