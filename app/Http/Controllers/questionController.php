<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\questionModel;
class questionController extends Controller
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
        return view('exam.create');
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
            "question" => "required",
            "answer1" => "required",
            "answer2" => "required",
            "answer3" => "required",
            "answer4" => "required",
            "right_answer" => "required",
            "lessonID" => "required",
        ]);
 
 dd($data);
        $op = questionModel::create($data);
 
        if($op){
            $message = "question Added";
        }else{
            $message = "Error Try Again";
        }
 
        session()->flash('Message',$message);
 
        return redirect( url('/ShowLesson/' . session()->get('current_lesson')));
 
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
        //
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
    }
}
