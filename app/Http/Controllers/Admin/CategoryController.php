<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Category;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    public function index()
    {
	    $data['categories'] = Category::orderBy('updated_at', 'DESC')->get();
        return view('admin.categories.index', $data);
    }
        
    public function create() 
    {
	    return view('admin.categories.create');
    }
    
    public function store(Request $request) 
    {
	    $input = $request->all();
		
	    $category = Category::create([
			'term' => $input['term'], 
			'color' => $input['color']
        ]);
        
	    return redirect()->route('categories');
    }
    
    public function edit($id) 
    {
	    $data['category'] = Category::find($id);
	    return view('admin.categories.edit', $data);
    }
    
    public function update(Request $request, $id)
    {
	    $input = $request->all();
	    
	    $category = Category::find($id);
	    
        $category->update([
	        'term' => $input['term'], 
			'color' => $input['color']
        ]);
		
        return redirect()->route('categories');
    }
    
    public function delete($id) 
    {
	    $category = Category::find($id);
	    $category->delete();
	    
	    return redirect()->route('categories');
    }
}
