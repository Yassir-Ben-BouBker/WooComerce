<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ConnectionController;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ordersController extends Controller
{
    protected $woocommerce ; 

    public function __construct(){
        $Cnx = new ConnectionController();
        $this->woocommerce = $Cnx->woocommerce;
    }

    // Getting All orders
    public function list(){
        $data = [
            'list_orders' => $this->woocommerce->get("orders"),
        ];
        return view('dashboard.orders.list')->with($data);
    }

    // Getting one order
    public function show($id){
        $data = [
            'order' => $this->woocommerce->get("orders/".$id),
        ];
        return view('dashboard.orders.show')->with($data);
    }

    // Updating order
    public function update($id){
        $data = [
            'order' => $this->woocommerce->get("orders/".$id),
        ];
        return view('dashboard.orders.update')->with($data);
    }

    // Modifying order
    public function modify(Request $request){
        $this->woocommerce->put("orders/".$request->id , $request->all());
        return redirect('/dashboard/orders');
    }

    // Deleting order
    public function delete(Request $request){
        $this->woocommerce->delete("orders/".$request->id);
        return redirect()->back();
    }

    // Create order
    public function create(){
        $data = [
            'list_categories' => $this->woocommerce->get("orders/categories"),
        ];
        return view('dashboard.orders.create')->with($data);
    }

    // Add order
    public function add(Request $request){
       
        $this->woocommerce->post("orders",$request->all());
        return redirect('/dashboard/orders');
    }

    public function excel(Request $request){
        $file[]=array('order_id','order_number','status');
        foreach ($this->woocommerce->get("orders", array('per_page'=>100,'page'=>1)) as $order)
        {
            $file[]=array(
                'id'=>$order->id,
                'order_number'=>$order->number,
                'status'=>$order->status,
            );
        }
        return Excel::download(new OrderInvoices($file),'orders.xlsx');
    }
}
