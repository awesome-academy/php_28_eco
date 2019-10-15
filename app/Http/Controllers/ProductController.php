<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ImageDetail;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $product = Product::where('deleted_at', null);
        if ($request->search) {
            $product = $product->where('name', 'LIKE', '%'.$request->search.'%')
                ->orWhere('price', 'LIKE', '%'.$request->search.'%')
                ->orWhere('status', 'LIKE', '%'.$request->search.'%')
                ->orWhere('cate_parent', 'LIKE', '%'.$request->search.'%')
                ->orWhere('category_id', 'LIKE', '%'.$request->search.'%');
        }
        $products = $product->orderBy('id', 'DESC')->paginate(config('view.paginate'));
        $cate_parent = Category::where('parent_id', '==', config('view.cate_parent'))->get();
        $category_id = Category::where('parent_id', '<>', config('view.cate_parent'))->get();
        return view('admin.pages.product.index', compact('products', 'cate_parent', 'category_id'));
    }

    public function create()
    {
        $cate_parent = Category::where('parent_id', '==', config('view.cate_parent'))->get();
        $category_id = Category::where('parent_id', '<>', config('view.cate_parent'))->get();
        return view('admin.pages.product.create', compact('cate_parent', 'category_id'));
    }

    public function store(ProductRequest $request)
    {
        $product_create = Product::create([
            'name' => $request->name,
            'status' => $request->status,
            'description' => $request->description,
            'price' => $request->price,
            'cate_parent' => $request->cate_parent,
            'category_id' => $request->category_id,
            'image' => $request->file('image')->getClientOriginalName(),
        ]);
        $request->file('image')->move(public_path('upload/'), $request->file('image')->getClientOriginalName());

        $product_id = $product_create->id;
        $this->createImageDetail($request, $product_id);

        return redirect()->route('product-list')->with(['type_message' => 'success', 'flash_message' => trans('message.create_message')]);
    }

    public function getSubCategory($idCateParent)
    {
        $category_id = Category::where('parent_id', $idCateParent)->get();
        foreach ($category_id as $key => $value) {
            echo "<option value='".$value->id."'>".$value->name."</option>";
        }
    }

    public function edit($id)
    {
        $cate_parent = Category::where('parent_id', '==', config('view.cate_parent'))->get();
        $category_id = Category::where('parent_id', '<>', config('view.cate_parent'))->get();
        $product = Product::findOrFail($id);
        $img_detail = ImageDetail::where('product_id', $id)->get();
        return view('admin.pages.product.edit', compact('cate_parent', 'category_id', 'product', 'img_detail'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('name', 'status', 'price', 'description', 'cate_parent', 'category_id');
        $product = Product::findOrFail($id);
        $product->update($data);

        $path_img_current = 'upload/'.$request->input('img_current'); 
        if ($request->hasFile('image')) {
            $file_name = $request->file('image')->getClientOriginalName();
            $product->image = $file_name;
            $request->file('image')->move(public_path('upload/'), $file_name);
            $product->save();
            if (File::exists($path_img_current)) {
                File::delete($path_img_current);
            }
        }

        $this->createImageDetail($request, $id);

        return redirect()->route('product-list')->with(['type_message' => 'success', 'flash_message' => trans('message.update_message')]);
    }

    public function delete($id)
    {
        $product_detail = ImageDetail::where('product_id', $id)->get();
        foreach ($product_detail as $key => $value) {
            File::delete(public_path('upload/detail/'.$value->name));
        }
        $product = $this->findId($id);
        File::delete(public_path('upload/'.$product->image));
        $product->delete();
        return redirect()->route('product-list')->with(['type_message' => 'success', 'flash_message' => trans('message.delete_message')]);
    }

    public function delImageDetail(Request $request, $id)
    {
        if ($request->ajax()) {
            $idHinh = (int)$request->get('idHinh');
            $image_detail = ImageDetail::findOrFail($id);
            if (!empty($image_detail)) {
                $path_img = 'upload/detail/'.$image_detail->name;
                if (File::exists($path_img)) {
                    File::delete($path_img);
                }
                $image_detail->delete(); 
            }
            return "Oke";
        }
    }

    public function createImageDetail($request, $product_id)
    {
        if ($request->hasFile('image_detail')) {
            foreach ($request->file('image_detail') as $file) {
                if (isset($file)) {
                    $img_detail = ImageDetail::create([
                        'name' => $file->getClientOriginalName(),
                        'product_id' => $product_id,
                    ]);
                    $file->move(public_path('upload/detail/'), $file->getClientOriginalName());
                }
            }
        }
    }
}
