<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Procategory;

class proCatController extends Controller
{
    public function createProCategory(Request $request){
        $category = new Procategory();
        $category->proCat_name = $request->pro_category;
        
        
       $category->save();
       return redirect()->route('manage.procat')->with('success', 'Category Added successfully.');

    }
    public function destroyProCat(Request $request)
            {
                $item = Procategory::find($request->id);
                //dd($item);
                if (!$item) {
                    // Handle the case where the item is not found
                    return redirect()->route('manage.procat')->with('error', 'Category not found.');
                }

                $item->delete();

                // Redirect back with a success message
                return redirect()->route('manage.procat')->with('success', 'Category deleted successfully.');
            }

            
}
