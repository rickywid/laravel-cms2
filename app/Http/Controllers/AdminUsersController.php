<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserFormRequest;
use App\User;
use App\Photo;
use App\Role;

use Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all()->pluck('name', 'id');

        return view('admin.users.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $input = $request->all();


        //if file upload exists
        if($file = $request->file('filename')){
            //create filename
            $name = "user" . $file->getClientOriginalName();
            //move file to /public/images/
            $file->move('images', $name);
            //create new photo record in Photos table
            $photo = Photo::create(['filename'=>$name]);
            //save newly created photo's id as photo_id inside User's table
            $input['photo_id'] = $photo->id;
        }

        Session::flash('user_created', 'User has been successfully created');

        //bcrypt password
        $input['password'] = bcrypt($request->password);
        //save new User
        User::create($input);

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $role = Role::all()->pluck('name', 'id');                

        return view('admin.users.edit', compact('user', 'role'));
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
        
        if(trim($request->password) == ''){
           $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        $user = User::findOrFail($id);

        //if file upload exists
        if($file = $request->file('filename')){
            //create filename
            $name = "user" . $file->getClientOriginalName();
            //move file to /public/images/
            $file->move('images', $name);
            //create new photo record in Photos table
            $photo = Photo::create(['filename'=>$name]);
            //save newly created photo's id as photo_id inside User's table
            $input['photo_id'] = $photo->id;
        }  

        Session::flash('user_updated', 'User has been successfully updated');

        $user->update($input);

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('user_deleted', 'User has been successfully deleted');

        return redirect('admin/users/');
    }
}
