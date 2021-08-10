<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ImageUpload;
    public function index()
    {
        $product = Product::with('category')->get();
        return view('tables.products', compact('product'));
    }
    public function create()
    {
        $categories = Category::get();
        return view('forms.PrCreate', compact('categories'));
    }
    public function store(Request $request)
    {

    
        $data = $request->validate([
            'title' => 'required',
            'about' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'image' =>  'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($data) {
            $image = $request->image;
            if ($image) {
                $idp = Product::latest('id')->first();
                if (isset($idp)) {
                    $id = $idp->id + 1;
                } else {
                    $id = 1;
                }
                $filePath = $this->UserImageUpload($image, $id);

                Product::create([
                    'title' => $request->title,
                    'about' => $request->about,
                    'category_id' => $request->category_id,
                    'price' => $request->price,
                    'image' => $filePath
                ]);
            }
        }

        return redirect()->route('products');
    }
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('cards.PrShow', compact('product'));
    }
    public function edit($id)
    {
        $categories = Category::get();
        $product = Product::where('id', $id)->first();
        return view('forms.PrUpdate', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'about' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'image' =>  'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $product = Product::where('id', $id)->first();
        if (isset($data)) {
            $image = $request->image;
            if ($image) {

                if (isset($product)) {
                    $id = $product->id;
                }
                $filePath = $this->UserImageUpload($image, $id);

                $product->update([
                    'title' => $request->title,
                    'about' => $request->about,
                    'category_id' => $request->category_id,
                    'price' => $request->price,
                    'image' => $filePath
                ]);
            }
        }


        return redirect()->route('pr.show', ['id' => $id]);
    }
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return redirect()->route('products');
    }
}
