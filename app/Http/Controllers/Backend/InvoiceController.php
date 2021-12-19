<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')
            ->get();
        return view('backend.invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $units = Unit::all();
        $categories = Category::all();
        return view('backend.purchase.create', compact('suppliers', 'units', 'categories'));
    }

    public function store(Request $request)
    {
        if ($request->category_id == null)
        {
            $notification = array(
                'Message' => 'Sorry! you do not select any item',
                'alert-type' => 'error'
            );
            return redirect()->route('admin.purchase.create')
                ->with($notification);
        }
        else
        {
            try
            {
                $count_category = count($request->category_id);
                for ($i = 0;$i < $count_category;$i++)
                {
                    $purchase = new Purchase();
                    $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                    $purchase->purchase_no = $request->purchase_no[$i];
                    $purchase->supplier_id = $request->supplier_id[$i];
                    $purchase->category_id = $request->category_id[$i];
                    $purchase->product_id = $request->product_id[$i];
                    $purchase->buying_qty = $request->buying_qty[$i];
                    $purchase->unit_price = $request->unit_price[$i];
                    $purchase->buying_price = $request->buying_price[$i];
                    $purchase->description = $request->description[$i];
                    $purchase->created_by = Auth::user()->id;
                    $purchase->status = 0;
                    $purchase->save();
                }
                DB::commit();
                $notification = array(
                    'Message' => 'New Purchase Created Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->route('admin.purchase.list')
                    ->with($notification);
            }
            catch(\Exception $e)
            {
                session()->flash('db_error', $e->getMessage());
                DB::rollBack();
                return back();
            }
        }
    }

    public function destroy($id){
        $purchase = Purchase::where('id', $id)->first();
        $purchase->delete();
        $notification = array(
            'Message' => 'Purchase Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.purchase.list')
            ->with($notification);
    }

    public function pendingList()
    {
        $purchasePendings = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')
            ->where('purchases.status', 0)
            ->get();
        return view('backend.purchase.pending', compact('purchasePendings'));
    }

    public function approve($id)
    {
        $purchase = Purchase::where('id', $id)->first();
        $product = Product::where('id', $purchase->product_id)->first();
        $purchase_qty = ((float)($purchase->buying_qty)) + ((float)($product->quantity));
        $product->quantity = $purchase_qty;
        if($product->update()){
            DB::table('purchases')
                ->where('id',$id)
                ->update(['status' => 1]);
            // $purchase->status = 1;
            // $purchase->update();
        }
        $notification = array(
            'Message' => 'Purchase Pending Approved Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.purchase.pending')
            ->with($notification);

    }
}

