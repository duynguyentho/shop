<?php

namespace App\Http\Controllers;
use App\Categories;
use App\Products;
use App\CateProduct;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Bus\DispatchesJobs;

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
    public function store(Request $request)
    {
        # code...
        if($request->product_id){
            $this->update($request);
            return response()->json('Cập nhật thành công');
        }
        $product['name'] = $request->input('name');
        $product['price'] = $request->input('price');
        $product['discount'] = $request->input('discount');
        $product['description'] = $request->description;
        $product['special'] = $request->input('special') == "1" ? "1":0;
        // store img
        $image = $request->image;
        if($image){
            $imageName = rand(11111,999999).'.'.$image->getClientOriginalExtension();
            $product['image'] = $imageName;
            $path = $image->storeAs('uploads/products', $imageName, 'public');
        }
        Products::create($product);
        // get array category of a product
        if($data = $request->input('category_product')){
            $product_ct = DB::table('products')->max('id'); // find the max id
            foreach($data as $record){
                CateProduct::create([
                    'product_id' => $product_ct,
                    'category_id' => $record,
                ]);
            }
        }
        return response()->json('message','Thêm thành công',$product);
    }
    public function update(Request $request)
    {
        # code...
        $product['name'] = $request->input('name');
        $product['price'] = $request->input('price');
        $product['discount'] = $request->input('discount');
        $product['description'] = $request->description;
        $product['special'] = $request->input('special') == "1" ? "1":0;
        $image = $request->image;
        if($image){
            $oldImg = Products::where('id', $request->product_id)->first();
            $oldImgName = $oldImg->image;
            $imgPath = storage_path('app/public/uploads/products/'.$oldImgName);
            if(file_exists($imgPath)){
                FILE::delete($imgPath);
            }
            $imageName = $image->getClientOriginalName();
            $product['image'] = $imageName;
            $path = $image->storeAs('uploads/products', $imageName, 'public');
        }
        // delete non-checked
        $categories = CateProduct::where('product_id',$request->product_id)->get(['category_id']);// category_id in database
        $category_id = array();
        foreach($categories as $catecory){
            array_push($category_id, strval($catecory->category_id));
        }
        $data = $request->input('category_product'); // category_id in view
        $arr_diff = array_diff($category_id, $data);
        foreach ($arr_diff as $category_id) {
           CateProduct::where('category_id', $category_id)->delete();
        }
        if($data){
            foreach($data as $category_id){
                CateProduct::updateOrCreate([
                    'product_id' => $request->product_id,
                    'category_id' => $category_id
                ]);
            }
        }
        Products::find($request->product_id)->update($product);
    }
    public function edit($id)
    {
            $data = Products::find($id);
            $cate_pro = CateProduct::where('product_id','=',$id)->get();
        return response()->json(['product'=> $data,'cate_pro'=>$cate_pro]);
    }
    public function destroy($id)
    {
        // delete Image
        $image = Products::findOrFail($id);
        $imageName = $image->image;
        $imgPath = storage_path('app/public/uploads/products/'.$imageName);
        if(file_exists($imgPath)){
            FILE::delete($imgPath);
        }
        Products::findOrFail($id)->delete();
        CateProduct::where('product_id','=',$id)->delete();
        return response()->json(['data'=>'removed']);
    }
    public static function getproducts(Request $request)
    {

        $category_id = $request->cat_id;
        $categories = Categories::orderBy('name')->get()->take(11);
        $collection = DB::table('products')
                      ->join('product_category', 'products.id','=', 'product_category.product_id')
                      ->where('product_category.category_id', '=', $category_id)
                      ->get();
        return view('home.product_menu')->with('products', $collection)->with('categories', $categories);
    }
    public static function getProductsByCategory($category_id)
    {
        $categories = Categories::orderBy('name')->get()->take(11);
        $collection = DB::table('products')
                      ->join('product_category', 'products.id','=', 'product_category.product_id')
                      ->where('product_category.category_id', '=', $category_id)
                      ->get();
        return json_encode($collection);
    }
    public function detail($id)
    {
        $product = Products::where('id',$id)->first();
        return view('home.product_detail',['product'=>$product]);
    }
}

