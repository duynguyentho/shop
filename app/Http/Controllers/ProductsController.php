<?php

namespace App\Http\Controllers;
use App\Categories;
use App\Products;
use App\CateProduct;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index(Request $request)
    {
        $products = Products::all();
        $categories = CateProduct::where('product_id',1)->get();
        if ($request->ajax()) {
            $data = Products::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Info" class="btn btn-success btn-sm">Info</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        // return response()->json($products);
        return view('admin.products',compact('products'))->with('categories', $categories);
    }
    public function display(Request $request)
    {
        # code...
    }
    public function fetch()
    {
        $categories = Categories::all();
        return response()->json($categories);
    }
    public function store(Request $request)
    {
        # code...
        $product['name'] = $request->input('name');
        $product['price'] = $request->input('price');
        $product['discount'] = $request->input('discount');
        $product['description'] = $request->description;
        $product['special'] = $request->input('special') == "1" ? "1":0;
        // store img
        $image = $request->product_image;
        if($request->img){
            $product['image'] = rand(111111, 9999999).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $product['image'] );
        }
        Products::create($product);
        $product_ct = DB::table('products')->max('id'); // find the max id
        // get array category of a product
        if($data = $request->input('category_product')){
            foreach($data as $record){
                CateProduct::create([
                    'product_id' => $product_ct,
                    'category_id' => $record,
                ]);
            }
        }
        return response()->json($product);
    }
    public function update(Request $request)
    {
        # code...
            $data = $request->all();
            Categories::find($request->category_id)->update($data);
        return response()->json($data);
    }
    public function edit($id)
    {
            $data = Products::find($id);
            $cate_pro = CateProduct::where('product_id','=',$id)->get();
        return response()->json(['product'=> $data,'cate_pro'=>$cate_pro]);
    }
    public function destroy($id)
    {
        Products::findOrFail($id)->delete();
        CateProduct::where('product_id','=',$id)->delete();
        return response()->json(['data'=>'removed']);
    }
}
