<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::all();
        return view('backend.unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.unit.create');
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
            'name' => 'required',
        ]);
        try {
        DB::beginTransaction();
        $unit = new Unit();
        $unit->name = $request->name;
        $unit->created_by = Auth::user()->id;
        $unit->save();
        DB::commit();
        $notification = array(
        'Message' => 'New Unit Created Successfully!',
        'alert-type' => 'success'
        );
        return redirect()->route('admin.unit.list')->with($notification);

        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::where('id', $id)->first();
        return view('backend.unit.edit', compact('unit'));
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
        ]);
        $unit = Unit::where('id', $id)->first();
        try {
        DB::beginTransaction();
        $unit->name = $request->name;
        $unit->updated_by = Auth::user()->id;
        $unit->update();
        DB::commit();
        $notification = array(
        'Message' => 'Unit Updated Successfully!',
        'alert-type' => 'success'
        );
        return redirect()->route('admin.unit.list')->with($notification);

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
        $unit = Unit::where('id', $id)->first();
        $unit->delete();
        $notification = array(
            'Message' => 'Unit Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.unit.list')->with($notification);
    }
}
