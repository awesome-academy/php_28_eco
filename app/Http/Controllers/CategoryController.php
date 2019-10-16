<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use DB;

class CategoryController extends Controller
{
    
    public function index(Request $request)
    {
        $categories = DB::table('categories');
        if ($request->search) {
            $categories = $categories->where('name', 'LIKE', '%'.$request->search.'%');
        }
        $categories = $categories->orderBy('id', 'DESC')->paginate(config('view.paginate'));  
        $parent_id = Category::all();
        return view('admin.pages.category.index', compact('categories', 'parent_id'));
    }

    public function create()
    {
        $cate_parent = Category::where('parent_id', config('view.cate_parent'))->get();
        return view('admin.pages.category.create', compact('cate_parent'));
    }

    public function store(CategoryRequest $request)
    {
        $category_create = Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('category.index')->with(['type_message' => 'success', 'flash_message' => trans('message.create_message')]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $cate_parent = Category::where('parent_id', config('view.cate_parent'))->get();
        return view('admin.pages.category.edit', compact('cate_parent', 'category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $category = Category::findOrFail($id);
        $category->update($data);
        return redirect()->route('category.index')->with(['type_message' => 'success', 'flash_message' => trans('message.update_message')]);
    }

    public function destroy($id)
    {
        $cate_parent = Category::where('parent_id', $id)->get();
        if (count($cate_parent) == config('view.count_parent')) {
            $category = Category::find($id);
            if (isset($category)) {
                $category->delete();
            }
            return redirect()->back()->with(['type_message' => 'success', 'flash_message' => trans('message.delete_message')]);
        } else {
            return redirect()->back()->with(['type_message' => 'danger', 'flash_message' => trans('message.cant_delete')]);
        }        
    }
}
