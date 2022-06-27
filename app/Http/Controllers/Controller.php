<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\emp;
use Illuminate\Http\Request;
use redirect;

class Controller extends BaseController
{
    public function index(){
        $records = emp::get();
        return view('recore',compact('records'));
    }

    public function register(){
        return view('welcome');
    }

    public function delete($id){
        $records = emp::where('id', $id)->delete();
        return redirect('/');
    }

    public function add(Request $request){
        $Emp = new emp;
        $Emp->emp_name=$request->name;
        $Emp->address=$request->address;
        $Emp->email=$request->email;
        $Emp->phone=$request->phone;
        $Emp->dob=$request->dob;
        // $Emp->image=$request->photo;

        if($request->file('photo')){
            $file= $request->file('photo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('assets/images/'), $filename);
            $Emp['image']= $filename;
        }

        $Emp->save();
        return redirect('/');
        // $records = emp::get();
        // return view('recore',compact('records'));
    }

    public function edit($id){
        $records = emp::find($id);
        return view('edit',compact('records'));
    }

    public function update(Request $request,$id){
        $Emp = emp::find($id);
        $Emp->emp_name=$request->input('name');
        $Emp->address=$request->input('address');
        $Emp->email=$request->input('email');
        $Emp->phone=$request->input('phone');
        $Emp->dob=$request->input('dob');
        if($request->file('photo')){
            $file= $request->file('photo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('assets/images/'), $filename);
            $Emp['image']= $filename;
        }
        $Emp->update();
        return redirect('/');
    }
}
