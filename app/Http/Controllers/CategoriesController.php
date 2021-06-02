<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categories;
use DateTime;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{
    //
    public function display(){
        $categories = Categories::all();
    }
    public function index(Request $request)
    {
        $categories = Categories::latest()->get();
        if ($request->ajax()) {
            $data = Categories::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('admin.categories',compact('categories'));
    }
    public function store(Request $request)
    {
        if($request->category_id){
            $data = $request->all();
            $data['updated_at'] = new DateTime();
            Categories::find($request->category_id)->update($data);
        }else{
            $created_at = new DateTime();
            Categories::updateOrCreate(
                ['name' => $request->name],
                ['created_at'=> $created_at]
                );     
        }
        return response()->json(['success'=>'Category saved successfully.']);
    }
    public function update(Request $request, $id){
        $data = Categories::find($id)->update($request->all());
        return response()->json(['success'=>'Thành công']);
    }
    public function edit($id)
    {
        $category = Categories::find($id);
        return response()->json($category);
    }
    public function destroy($id)
    {
        Categories::findOrFail($id)->delete();
        return response()->json(['data'=>'removed']);
    }
}