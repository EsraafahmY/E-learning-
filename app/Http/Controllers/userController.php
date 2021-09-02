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
        $data = userModel::select('users.*', 'role.title as title')
            ->join('role', 'users.roleID', '=', 'role.ID')
            ->paginate(50);

        return view('/users.index', ['data' => $data]);
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

        $data = $this->validate($request, [
            "Fname" => "required",
            "Lname" => "required",
            "email" => "required|email",
            "password" => "required|min:6",
            // "image"    => "image|mimes:png,jpeg,jpg,gif",
            "address" => "required",
            "phone" => "required|min:11|numeric",
            "roleID" => "required",
            "job" => "",
            "education" => ""
        ]);

        # upload image ... 

        $finalName = time() . rand() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $finalName);
        // $request->image->storeAs('images',$finalName);


        $data['password'] = bcrypt($data['password']);

        $data['img_dir'] = '/images/' . $finalName;
        // dd($data);

        $op = userModel::create($data);

        if ($op) {
            $message = "user Registered";
        } else {
            $message = "Error Try Again";
        }

        session()->flash('Message', $message);

        return redirect(url('/'));

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
        // $data = userModel::where('ID',$id)->paginate(10);

        // return view('users.profile',['data' => $data]);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = userModel::where('ID', $id)->get();
        $roles = roleModel::get();

        // dd($data);

        return view('users.editUserRole', ['data' => $data , 'roles' => $roles]);
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
        $data = $this->validate($request,[
       
            "roleID"  => "required",
      
           ]);
      
      
           $op = userModel::where('ID',$id)->update(["RoleID" => $request->roleID]);
      
      
            if($op){
                $message = "Record Updated";
            }else{
                $message = "Error Try Again";
            }


            session()->flash('Message',$message);

            return redirect(url('/User'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $op = userModel::where('ID',$id)->delete();

        if($op){
            $message =  "user Deleted";

        }
        else{
            $message = "Error Try Again";
        }

         session()->flash('Message',$message);

        return redirect(url('/User'));   
     }

    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {

        $data = $this->validate($request, [

            "email" => "required|email",
            "password" => "required|min:6"
        ]);

        $status = false;
        if ($request->has('rememberMe')) {
            $status = true;
        }

        if (auth()->attempt($data, $status)) {
            // dd(auth()->user()->img_dir);

            session()->put('user',auth()->user());

            if (auth()->user()->roleID == 1) {
                return redirect(url('User'));
            } elseif (auth()->user()->roleID == 2) {
                return redirect(url('Track/'.auth()->user()->ID));
                // return redirect(url('temp'));
            } else {
                return redirect(url('Track'));
            }
        } else {

            session()->flash('Message', 'Invalid Credentials try again');
            return redirect(url('/'));
        }
    }


    public function logout()
    {

        auth()->logout();
        session()->forget(['user']);

        return redirect(url('/'));
    }

    public function editRole($id)
    {

        $data = userModel::where('ID', $id)->get();

        return view('users.editUserRole', ['data' => $data]);
    }

    public function updateUserRole(Request $request, $id)
    {
        $data = $this->validate($request,[
       
            "roleID"  => "required",
      
           ]);
      
      
           $op = userModel::where('ID',$id)->update(["RoleID" => $request->roleID]);
      
      
            if($op){
                $message = "Record Updated";
            }else{
                $message = "Error Try Again";
            }


            session()->flash('Message',$message);

            return redirect(url('/User'));

    }

    public function students()
    {
        $data = userModel::select('users.*', 'role.title as title')//'user_rate.rate as rate'
            ->join('role', 'users.roleID', '=', 'role.ID')
            //->join('user_rate', 'users.ID', '=', 'user_rate.userID')
            ->where('roleId','3')
            ->paginate(50);
// dd($data);
        // $data = userModel::where('roleId','3')->paginate(50);

        return view('/users.students',['data' => $data]);        
    }

}