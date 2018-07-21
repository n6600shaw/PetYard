<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class UsersController extends Controller
{
    //middelware
    public function __construct(){
          $this->middleware('auth',[
          'except'=>['create','store','show']

    ]);

    $this->middleware('guest',[
            
        'only'=>['create']

    ]);
    
    }
    
    public function index(){

          $users=User::paginate(10);

        return view('users.index',compact('users'));
    }
    
    public function create()
    {

        return view('users.create');

    }
    public function show(User $user)
    {
        $statuses=$user->statuses()->orderby('created_at','dec')->paginate(30);
        return view('users.show', compact('user','statuses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'same:password',

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]
        );

        //direct to user personal page after login
        Auth::login($user);
        session()->flash('success', 'Welcome!');
        return redirect()->route('users.show', [$user]);

    }
    public function edit(User $user){
            
        #view can not resolving user id to user object 
        $this->authorize('update',$user);
        return view('users.edit',compact('user'));



    }

    public function update(User $user,Request $request){

        $this->validate($request,[
          'name'=>'required|max:50',
          'password'=>'nullable|confirmed|min:6'

        ]);

        $this->authorize('update',$user);
        
        $data=[];
        $data['name']=$user->name;
        if($request->password){

            $data['password']=bcrypt($request->password);
        }
        $user->update($data);
        session()->flash('success','Profile successfully updated!');
        return redirect()->view('users.show',$user->id);
    }

    public function destroy(User $user){

        $this->authorize('destroy',$user);
        $user->delete();
        session()->flash('success',"Successfully deleted user:".$user->id);
        return back();
        


    }
}