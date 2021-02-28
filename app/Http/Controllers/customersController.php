<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ConnectionController;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class customersController extends Controller
{
    protected $woocommerce ; 

    public function modify(Request $request){
        $this->woocommerce->put("customers/".$request->id , $request->all());
        return redirect('/dashboard/customers');
    }

    public function delete(Request $request){
        $this->woocommerce->delete("customers/".$request->id, ['force' => true]);
        return redirect()->back();
    }

    public function create(){
        return view('dashboard.customers.create');
    }

    public function add(Request $request){
       
        $this->woocommerce->post("customers",$request->all());
        return redirect('/dashboard/customers');
    }
    
    public function __construct(){
        $Cnx = new ConnectionController();
        $this->woocommerce = $Cnx->woocommerce;
    }

    public function list(){
        $data = [
            'list_customers' => $this->woocommerce->get("customers"),
        ];
        return view('dashboard.customers.list')->with($data);
    }

    public function show($id){
        $data = [
            'customer' => $this->woocommerce->get("customers/".$id),
        ];
        return view('dashboard.customers.show')->with($data);
    }

    public function update($id){
        $data = [
            'customer' => $this->woocommerce->get("customers/".$id),
        ];
        return view('dashboard.customers.update')->with($data);
    }

    public function excel(Request $request){

        $file[]=array('id','email','first_name','last_name','username');
        foreach ($this->woocommerce->get("customers", array('per_page'=>100,'page'=>1)) as $customer)
        {
            $file[]=array(
                'id'=>$customer->id,
                'email'=>$customer->email,
                'first_name'=>$customer->first_name,
                'last_name price'=>$customer->last_name,
                'username'=>$customer->username

            );
        }
        return Excel::download(new CustomerInvoices($file),'customers.xlsx');
    }


}
