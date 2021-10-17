<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $userID = Auth::user()->id;
        $user = User::where('id',$userID)->first();
        return view('backend.profile.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $userID = Auth::user()->id;
        $user = User::where('id',$userID)->first();
        return view('backend.profile.edit', compact('user'));
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
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'mobile' => 'required|string',
            'gender' => 'required',
            'address' => 'required|max:255',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = User::where('id', $id)->first();
        try {
        DB::beginTransaction();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->gender = $request->gender;
        $user->address = $request->address;
        if($request->image)
        {
            UploadHelper::deleteFile('public/backend/images/user_profile/'.$user->image);
            $user->image = UploadHelper::upload('image', $request->image, $request->name . '-' . time() . '-image', 'public/backend/images/user_profile/', $user->image);
        }
        $user->update();
        DB::commit();
        $notification = array(
        'Message' => 'User Profile Updated Successfully!',
        'alert-type' => 'success'
        );
        return redirect()->route('admin.user.profile.show')->with($notification);

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
        //
    }
}
