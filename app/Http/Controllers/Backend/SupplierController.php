<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('backend.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supplier.create');
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
            'mobile_no' => 'required|string',
            'email' => 'nullable',
            'address' => 'required|string|min:5',
        ]);
        try {
        DB::beginTransaction();
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->mobile_no = $request->mobile_no;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->created_by = Auth::user()->id;
        $supplier->save();
        DB::commit();
        $notification = array(
        'Message' => 'New Supplier Created Successfully!',
        'alert-type' => 'success'
        );
        return redirect()->route('admin.supplier.list')->with($notification);

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
        $supplier = Supplier::where('id', $id)->first();
        return view('backend.supplier.edit', compact('supplier'));
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
            'mobile_no' => 'required|string',
            'email' => 'nullable',
            'address' => 'required|string|min:5',
        ]);
        $supplier = Supplier::where('id', $id)->first();
        try {
        DB::beginTransaction();
        $supplier->name = $request->name;
        $supplier->mobile_no = $request->mobile_no;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->updated_by = Auth::user()->id;
        $supplier->update();
        DB::commit();
        $notification = array(
        'Message' => 'Supplier Updated Successfully!',
        'alert-type' => 'success'
        );
        return redirect()->route('admin.supplier.list')->with($notification);

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
        $supplier = Supplier::where('id', $id)->first();
        $supplier->delete();
        $notification = array(
            'Message' => 'Supplier Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.supplier.list')->with($notification);
    }
}
