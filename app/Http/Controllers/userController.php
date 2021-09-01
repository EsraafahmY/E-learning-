<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use Auth;
use App\Models\roleModel;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = userModel::paginate(5);

      return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = roleModel::get();
        // dd($data);
        return view('/register', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $roles = roleModel::join('user', 'user.roleID', '=', 'role.ID')
        //     ->join('role', 'role.ID', '=', 'user.roleID')
        //     ->get(['role.title']);
$data = $this->validate($request,[
    "Fname" => "required",
    "Lname" => "required",
    "email" => "required|email",
    "password" => "required|min:6",
    // "image"    => "image|mimes:png,jpeg,jpg,gif",
    "address" => "required",
    "phone" => "required|min:11|numeric",
    "roleID" => "required"
]);

# upload image ... 

$finalName = time().rand().'.'.$request->image->extension();

    $request->image->move(public_path('images'),$finalName);
    // $request->image->storeAs('images',$finalName);


$data['password'] = bcrypt($data['password']);

$data['img_dir'] ='/images/' . $finalName;
// dd($data);

$op = userModel::create($data);

if($op){
    $message = "user Registered";
}else{
    $message = "Error Try Again";
}

session()->flash('Message',$message);

 return redirect(url('/User'));

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

      $data = userModel::where('id',$id)->get();

      return view('student.edit',['data' => $data]);    }

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
        return redirect(url('Login'));  
      }

      public function login(){
        return view('login');
    } 
 
    public function doLogin(Request $request){

     $data = $this->validate($request,[
         
         "email" => "required|email",
         "password" => "required|min:6"
     ]);
 
     $status = false;
     if($request->has('rememberMe')){
      $status = true;
        } 
 
       if(auth()->guard('User')->attempt($data,$status)){
 
 
         return redirect(url(''));
 
       }else{
 
         session()->flash('Message','Invalid Credentials try again');
         return redirect(url('Login'));
 
       }
 
     
 
    }
 
 
    public function logout(){
 
     auth()->logout();
 
     return redirect(url('Login'));
    }
}