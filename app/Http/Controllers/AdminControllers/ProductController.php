<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.pages.product.create', compact('categories', 'brands', 'colors', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if($request->image !== null){
            $image = trim($request->image, url('/'));
            $image = trim($image, 'uploads/');
            $request->merge(['image' => $image]);
        }

        $product = Product::create($request->all());

        if ($request->imageList !== null) {
            $images = json_decode($request->imageList);
            foreach ($images as $key => $value) {
                $name = trim($value, url('/'));
                $name = trim($name, 'uploads/');
                Image::create([
                    'path' => $name,
                    'product_id' => $product->id
                ]);
            }
        }
        if ($request->has('colors')) {
            foreach ($request->colors as $color) {
                ProductColor::create([
                    'color_id' => $color,
                    'product_id' => $product->id
                ]);
            }
        }
        if ($request->has('sizes')) {
            foreach ($request->sizes as $size) {
                ProductSize::create([
                    'size_id' => $size,
                    'product_id' => $product->id
                ]);
            }
        }
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        $images = Image::where('product_id', $id)->get();
        $product_colors = ProductColor::where('product_id', $id)->pluck('color_id')->toArray();
        $product_sizes = ProductSize::where('product_id', $id)->pluck('size_id')->toArray();
        return view('admin.pages.product.edit', compact('product', 'categories', 'brands', 'colors', 'sizes', 'images', 'product_colors', 'product_sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {

        if($request->image !== null){
            $image = trim($request->image, url('/'));
            $image = trim($image, 'uploads/');
            $request->merge(['image' => $image]);
        }

        $product = Product::find($id);
        $product->update($request->all());

        if ($request->imageList !== null) {
//            $images = json_decode($request->imageList);
            dd($request->imageList);
            Image::where('product_id', $id)->delete();
            foreach ($images as $key => $value) {
                $name = trim($value, url('/'));
                $name = trim($name, 'uploads/');
                Image::create([
                    'path' => $name,
                    'product_id' => $product->id
                ]);
            }
        }

//        if ($request->has('colors')) {
//            foreach ($request->colors as $color) {
//                ProductColor::create([
//                    'color_id' => $color,
//                    'product_id' => $product->id
//                ]);
//            }
//        }
//        if ($request->has('sizes')) {
//            foreach ($request->sizes as $size) {
//                ProductSize::create([
//                    'size_id' => $size,
//                    'product_id' => $product->id
//                ]);
//            }
//        }
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Image::where('product_id', $id)->delete();
        ProductColor::where('product_id', $id)->delete();
        ProductSize::where('product_id', $id)->delete();

        return redirect()->back();
    }

}
