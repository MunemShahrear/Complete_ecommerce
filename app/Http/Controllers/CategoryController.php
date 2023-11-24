<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;

class CategoryController extends Controller
{
    public function category(Request $request){
        $category = new Category();
        $category->cat_name = $request->blog_category;
        
        
       $category->save();
       return redirect()->route('create.category')->with('success', 'Category Added successfully.');

    }
    public function destroy(Request $request, $id)
            {
                $item = category::find($id);
                //dd($item);
                if (!$item) {
                    // Handle the case where the item is not found
                    return redirect()->route('create.category')->with('error', 'Category not found.');
                }

                $item->delete();

                // Redirect back with a success message
                return redirect()->route('create.category')->with('success', 'Category deleted successfully.');
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
