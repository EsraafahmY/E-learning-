<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\roleModel;


class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = roleModel::paginate(100);

        return view('/role.index',['data' => $data]);   
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/role.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            "title" => "required"
                ]);
 
 
        $op = roleModel::create($data);
 
        if($op){
            $message = "role added";
        }else{
            $message = "Error Try Again";
        }
 
        session()->flash('Message',$message);
 
       return redirect(url('/Role'));
 
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = roleModel::where('ID',$id)->get();

        return view('role.edit', ['data' => $data]);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request,[
       
            "title"  => "required",
      
           ]);
      
      
           $op = roleModel::where('ID',$id)->update(["title" => $request->title]);
      
      
            if($op){
                $message = "Record Updated";
            }else{
                $message = "Error Try Again";
            }


            session()->flash('Message',$message);

            return redirect(url('/Role'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $op = roleModel::where('ID',$id)->delete();

        if($op){
            $message =  "role Deleted";

        }
        else{
            $message = "Error Try Again";
        }

         session()->flash('Message',$message);

         if(session()->get('user')->roleID==2){
            return redirect(url('/Role/'.session()->get('user')->ID));
        }else{
            return redirect(url('/Role'));
        }
    
    }

}
