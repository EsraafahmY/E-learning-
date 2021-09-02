<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userRateModel;
use App\Models\userModel;

class userRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //     $data = userRateModel::get();

    // return view('/rate.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = userModel::select('users.*', 'user_rate as rate')
        // ->join('rate', 'users.ID', '=', 'rate.userID')
        // ->paginate(50);
        return view('/rate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        dd($request);

        $data = $this->validate($request,[
            "teacherID" => "required",
            "userID" => "required",
            "rate" => "required"
                ]);
                // $data['userID'] = $request.;
 
        $op = userRateController::create($data);
 
        if($op){
            $message = "Track Added";
        }else{
            $message = "Error Try Again";
        }

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
