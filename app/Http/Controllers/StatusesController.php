<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Status;
class StatusesController extends Controller
{
    //
    public function __contruct(){
              $this->middleware('auth');


    }

    public function store(Request $request){
                $this->validate($request,[
                     'content'=>'required|max:140'



                ]);
                 Auth::user()->statuses()->create([
                         'content'=>$request['content']



                 ]);

                 return redirect()->back();



    }

    public function destroy(Status $status){
        $this->authorize('destroy',$status);
        $status->delete();
        session()->flash('success','Post has been deleted!');
        return redirect()->back();


    }
}
