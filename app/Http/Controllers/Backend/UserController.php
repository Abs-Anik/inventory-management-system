<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')->get();
        return view('backend.users.create', compact('roles'));
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
            'usertype' => 'nullable',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        try {
        DB::beginTransaction();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        // Assign Roles
        if ($request->usertype != null) {
                foreach ($request->usertype as $usertype) {
                $user->assignRole($usertype);
            }
         }
        DB::commit();
        $notification = array(
        'Message' => 'New user Created Successfully!',
        'alert-type' => 'success'
        );
        return redirect()->route('admin.users.index')->with($notification);

        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
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
        $user = User::where('id',$id)->first();
        $roles = DB::table('roles')->get();
        return view('backend.users.edit',compact('user', 'roles'));
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
        $request->validate([
            'usertype' => 'nullable',
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
        ]);
        $user = User::where('id',$id)->first();
        try {
            DB::beginTransaction();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->update();
            // Detach roles and Assign Roles
            $user->roles()->detach();
            // Assign Roles
            if (!is_null($request->usertype)) {
                foreach ($request->usertype as $usertype) {
                    $user->assignRole($usertype);
                }
            }
            DB::commit();
            $notification = array(
            'Message' => 'User Updated Successfully!',
            'alert-type' => 'success'
            );
            return redirect()->route('admin.users.index')->with($notification);

            } catch (\Exception $e) {
                session()->flash('db_error', $e->getMessage());
                DB::rollBack();
                return back();
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
        $user = User::where('id',$id)->first();
        if(!empty($user))
        {
            // Detach roles and Assign Roles
            $user->roles()->detach();
            $user->delete();
            $notification = array(
                'Message' => 'User Deleted successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.users.index')->with($notification);
        }
    }
}
