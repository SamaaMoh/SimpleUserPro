<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
       
    
    public function users(){
      $users = User::where('role' , 'user')->get();
      return view('admin.home', ['users' => $users]);
    }
    
    
        /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id){
         
         $user = User::where('id', $id)->first();
         
         return view('admin.editForm', ['user' => $user]);

    }
    
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
    ]);
        
        
       $user =  User::where('id', $request->id)
               ->update(['name' => $request->name,
                         'email' => $request->email]);

    
        return response()->json(['success' => true]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
   
        return response()->json(['success' => true]);
    }
    
    public function changeStatus($id){
        
        $user = User::where('id', $id)->first();
        $newStatus = 0;
        if ($user->status == 2){
            $newStatus =1;
        }else{
            $newStatus = 2;
        }
        
        $user->update([
            'status' => $newStatus
        ]);
        
                return response()->json(['success' => true]);

        
    }
}
