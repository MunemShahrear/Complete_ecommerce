<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Procategory;
use App\Models\Prosubcategory;

class proSubCatController extends Controller
{
    public function createSubProCategory(Request $request){
        $category = new Prosubcategory();
        $category->proSubCat_name = $request->pro_Subcategory;
        $category->main_Cat = $request->main_category;
        
        //dd($category);
       $category->save();
       return redirect()->route('manage.proSubCat')->with('success', 'Category Added successfully.');

    }
    public function destroySubProCat(Request $request)
            {
                $item = Prosubcategory::find($request-->id);
                //dd($item);
                if (!$item) {
                    // Handle the case where the item is not found
                    return redirect()->route('manage.proSubCat')->with('error', 'Category not found.');
                }

                $item->delete();

                // Redirect back with a success message
                return redirect()->route('manage.proSubCat')->with('success', 'Category deleted successfully.');
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
