<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trackModel;

class trackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = trackModel::with('track_data')->paginate(10);

        return view('track.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('track.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $data = $this->validate($request,[
            "title" => "required",
            "teacherID" => "required"
        ]);
 
 
        $op = trackModel::create($data);
 
        if($op){
            $message = "Track Added";
        }else{
            $message = "Error Try Again";
        }
 
        session()->flash('Message',$message);
 
        if(session()->get('user')->roleID==2){
            return redirect(url('/Track/'.session()->get('user')->ID));
        }else{
            return redirect(url('/Track'));
        }
    
 
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
        $data = trackModel::where('teacherID',$id)->paginate(10);

        return view('track.index',['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = trackModel::where('ID',$id)->get();

        return view('track.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $this->validate($request,[
       
            "title"  => "required",
      
           ]);
      
      
           $op = trackModel::where('ID',$id)->update(["title" => $request->title]);
      
      
            if($op){
                $message = "Record Updated";
            }else{
                $message = "Error Try Again";
            }


            session()->flash('Message',$message);

            if(session()->get('user')->roleID==2){
                return redirect(url('/Track/'.session()->get('user')->ID));
            }else{
                return redirect(url('/Track'));
            }
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $op = trackModel::where('ID',$id)->delete();

        if($op){
            $message =  "Track Deleted";

        }
        else{
            $message = "Error Try Again";
        }

         session()->flash('Message',$message);

         if(session()->get('user')->roleID==2){
            return redirect(url('/Track/'.session()->get('user')->ID));
        }else{
            return redirect(url('/Track'));
        }       
    
    }

    public function yourTracks(){
        return view('track.studentTraks');
    }
}
