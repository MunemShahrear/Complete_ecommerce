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
    public function destroyProCat(Request $request, $id)
            {
                $item = Procategory::find($id);
                //dd($item);
                if (!$item) {
                    // Handle the case where the item is not found
                    return redirect()->route('manage.procat')->with('error', 'Category not found.');
                }

                $item->delete();

                // Redirect back with a success message
                return redirect()->route('manage.procat')->with('success', 'Category deleted successfully.');
            }

            public function sort(Request $request)
            {

                if($request->blog_category == 'all_cat'){
                    $blogsorts = Blog::get();
                }
                else{
               $blogsorts = Blog::where('blog_cat', $request->blog_category)->get();
              // dd($blogsort);
            }
                // Redirect back with a success message
               
               return view('frontend.pages.sortBlog', compact('blogsorts'));
            }
}
