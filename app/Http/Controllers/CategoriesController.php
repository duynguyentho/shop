<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categories;
use DateTime;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{
    //
    public function display(){
        $categories = Categories::all();
    }
    public function index()
    {
        $categories = Categories::orderBy('id','desc')->get();
        return view('admin.categories')->with('categories',$categories);
    }
    public function deleteChecked(Request $request)
    {
        # code...
        $data= $request->input('ck');
        if(isset($data))
            foreach($data as $id){
                Categories::where('id','=', $id)->delete();
            }
        return redirect('admin/category');
    }
    public function store(Request $request)
    {
        # code...
        $data = $request->except('_token');
        $categories = Categories::updateOrCreate($data);
        print_r($categories);
        return response()->json([
            'data' => $categories,
        ],200); // 200 là mã lỗi
    }
    public function edit($id)
    {
        $categories=Categories::find($id);
        echo($categories);
        return response()->json(['data'=>$categories],200); // 200 là mã lỗi
    }
    public function update(Request $request, $id)
    {
        $categories=Categories::find($id)->update($id);
        return response()->json([
            'data'=>$categories,
            'categories' => $request->all(),
            'id' => $id,
            'message'=>'Cập nhật thành công'],200);
    }
    public function destroy($id)
    {
        Categories::findOrFail($id)->delete();
        echo "<script>alert($id)</script>";
        return response()->json(['data'=>'removed'],200);
    }

}
