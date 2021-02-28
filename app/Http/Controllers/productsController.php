<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ConnectionController;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
class productsController extends Controller
{

    protected $woocommerce ; 

    public function __construct(){
        $Cnx = new ConnectionController();
        $this->woocommerce = $Cnx->woocommerce;
    }


    
    public  function  productsImport(Request  $request)
    {
        $feuilles = Excel::toArray(new ProductImport,$request['file']);
        foreach ($feuilles as $feuille)
        {
            foreach ($feuille as $line) {
                $newProductData = array(
                    'name' => $line['name'],
                    'description' => $line['description'],
                    'short_description' => $line['short_description'],
                    'sale_price' => strval($line['regular_price']),
                    'regular_price' => strval($line['regular_price']),
                );
                $this->woocommerce->post("products", $newProductData);
            }  
        }
        return back();
    }
        // Modifying Product
        public function modify(Request $request){
            $this->woocommerce->put("products/".$request->id , $request->all());
            return redirect('/dashboard/products');
        }
    
        // Deleting Product
        public function delete(Request $request){
            $this->woocommerce->delete("products/".$request->id);
            return redirect()->back();
        }
    
        // Create Product
        public function create(){
            $data = [
                'list_categories' => $this->woocommerce->get("products/categories"),
            ];
            return view('dashboard.products.create')->with($data);
        }
    
        // Add Product
        public function add(Request $request){
           
            $this->woocommerce->post("products",$request->all());
            return redirect('/dashboard/products');
        }

    // Getting All products
    public function list(){
        //dd($this->woocommerce->get("products"));
        $data = [
            'list_products' => $this->woocommerce->get("products", array('per_page'=>100,'page'=>1)),
        ];
        return view('dashboard.products.list')->with($data);
    }

    // Getting one product
    public function show($id){
        $data = [
            'product' => $this->woocommerce->get("products/".$id),
        ];
        return view('dashboard.products.show')->with($data);
    }

    // Updating Product
    public function update($id){
        $data = [
            'product' => $this->woocommerce->get("products/".$id),
        ];
        return view('dashboard.products.update')->with($data);
    }

    public function excel(Request $request){

    $file[]=array('id','product','price','regular price','on Sale');
    foreach ($this->woocommerce->get("products", array('per_page'=>100,'page'=>1)) as $product)
    {
        $file[]=array(
            'id'=>$product->id,
            'product'=>$product->name,
            'price'=>$product->price,
            'regular price'=>$product->regular_price,
            'On Sale'=>$product->on_sale
        );
    }
    return Excel::download(new productInvoices($file),'products.xlsx');
}


}
