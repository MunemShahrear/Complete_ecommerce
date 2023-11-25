<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Procategory;
use App\Models\Probrand;

class ProBrandController extends Controller
{
    public function createBrand(Request $request){
        $category = new Probrand();
        $category->brand_name = $request->brand_name;
       $category->save();
       return redirect()->route('manage.brand')->with('success', 'Category Added successfully.');

    }
    public function destroyBrand(Request $request)
            {
                $item = Probrand::find($request->id);
                //dd($item);
                if (!$item) {
                    // Handle the case where the item is not found
                    return redirect()->route('manage.brand')->with('error', 'Category not found.');
                }

                $item->delete();

                // Redirect back with a success message
                return redirect()->route('manage.brand')->with('success', 'Category deleted successfully.');
            }

}
