<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Blog;
use App\Models\Procategory;
use App\Models\Product;

class ProductController extends Controller
{
    public function createProduct(Request $request){
        $product= new Product();
        $product->pro_title = $request->pro_title;
        $product->main_category = $request->main_category;
        $product->sub_category = $request->sub_category;
        $product->pro_brand = $request->pro_brand;
        $product->pro_model = $request->pro_model;
        $product->pro_price = $request->pro_price;
        $product->pro_sprice = $request->pro_sprice;
        $product->pro_qty = $request->pro_qty;
        $product->pro_waranty = $request->pro_waranty;
        $product->pro_datasheet = $request->pro_datasheet;
        $product->pro_img1 = $request->pro_img1;
        if ($request->hasFile('pro_img1')) {
            $image = $request->file('pro_img1');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName); // Store the image in the 'uploads' directory
            // You can also save the image details to a database if needed
            // return 'Image uploaded successfully';
            $product->pro_img1 = $imageName;
        }
        $product->pro_desc = $request->pro_desc;
       $product->save();
       return redirect()->route('all.product')->with('success', 'Product Added successfully.');

    }
    public function destroyProduct(Request $request)
            {
                $item = Product::find($request->id);
                //dd($item);
                if (!$item) {
                    // Handle the case where the item is not found
                    return redirect()->route('all.product')->with('error', 'Product not found.');
                }

                $item->delete();

                // Redirect back with a success message
                return redirect()->route('all.product')->with('success', 'Product deleted successfully.');
            }
}
