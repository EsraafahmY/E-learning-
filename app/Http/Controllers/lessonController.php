<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lessonModel;

class lessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('lesson.create');
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
        $data = $this->validate($request,[
            "title" => "required",
            "trackID" => "required"
        ]);
 
 
        $op = lessonModel::create($data);
 
        if($op){
            $message = "Lesson Added";
        }else{
            $message = "Error Try Again";
        }
 
        session()->flash('Message',$message);
 
        return redirect(url('/Lesson/'.session()->get('current_track')));
        
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
        session()->put('current_track', $id);
         $data = lessonModel::where('trackID',$id)->paginate(10);

        return view('lesson.index',['data' => $data]);
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
        $data = lessonModel::where('ID',$id)->get();
// dd($data);
        return view('lesson.edit',['data' => $data]);
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
      
      
           $op = lessonModel::where('ID',$id)->update(["title" => $request->title]);
      
      
            if($op){
                $message = "Record Updated";
            }else{
                $message = "Error Try Again";
            }


            session()->flash('Message',$message);

            return redirect(url('/Lesson/'.session()->get('current_track')));

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
        $op = lessonModel::where('ID',$id)->delete();

        if($op){
            $message =  "Track Deleted";

        }
        else{
            $message = "Error Try Again";
        }

         session()->flash('Message',$message);

        //  return redirect(url('/Lesson/'.session()->get('current_track')));
        return back();
    }
}
