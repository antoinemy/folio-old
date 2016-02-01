<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Page;
use App\Publish;
use App\PublishPicture;
use App\Picture;
use App\Category;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class ArticleController extends Controller
{
    public function index()
    {
	    $data['page'] = Page::find(2);
	    $data['publish'] = Publish::where('type', 'article')->orderBy('updated_at', 'DESC')->get();
        return view('admin.articles.index', $data);
    }
    
    public function update_page(Request $request)
    {
	    $input = $request->all();

	    $page = Page::find(2);
	    
        $page->update([
	        'user_id' => Auth::user()->id,
			'is_active' => 1,
			'meta_title' => $input['meta_title'], 
			'meta_desc' => $input['meta_desc'],
			'title_h1' => $input['title_h1'], 
			'desc' => $input['desc'], 
			'content' => $input['content']
        ]);
        
        $page->cover->update([
			'name' => $input['background_image_name'],
			'url' => 'cover'
		]);
		
		if(isset($input['background_image'])) {
			$file = base_path().'/public/assets/images/articles/cover.jpg';
			$img = Image::make($input['background_image']);
			$img->save($file);	
		}
	    
        return redirect()->route('articles');
    }
    
    public function create() 
    {
	    $data['categories'] = Category::all();
	    return view('admin.articles.create', $data);
    }
    
    public function store(Request $request) 
    {
	    $input = $request->all();
		
		$picture = Picture::create([
			'name' => $input['background_image_name'],
			'url' => 'cover'
		]);
		
	    $article = Publish::create([
	        'user_id' => Auth::user()->id,
	        'category_id' => $input['category_id'],
	        'picture_id' => $picture->id,
			'is_active' => 1,
			'type' => 'article',
			'title' => $input['title'], 
			'desc' => $input['desc'], 
			'content' => $input['content']
        ]);
        
		mkdir(base_path().'/public/assets/images/articles/'.$article->id, 0777);
        $file = base_path().'/public/assets/images/articles/'.$article->id.'/cover.jpg';
		$img = Image::make($input['background_image']);
		$img->save($file);
        
	    return redirect()->route('articles');
    }
    
    public function edit($id) 
    {
	    $data['publish'] = Publish::find($id);
	    $data['categories'] = Category::all();
	    return view('admin.articles.edit', $data);
    }
    
    public function update(Request $request, $id)
    {
	    $input = $request->all();
	    
	    $article = Publish::find($id);
	    
        $article->update([
	        'user_id' => Auth::user()->id,
	        'category_id' => $input['category_id'],
			'title' => $input['title'], 
			'desc' => $input['desc'], 
			'content' => $input['content']
        ]);
        
        if(isset($input['background_image'])) {
	        $file = base_path().'/public/assets/images/articles/'.$article->id.'/cover.jpg';
			$img = Image::make($input['background_image']);
			$img->save($file);
		}
		
		$article->cover->update([
			'name' => $input['background_image_name'],
		]);
		
        return redirect()->route('articles');
    }
    
    public function delete($id) 
    {
	    $article = Publish::find($id);
	    $article->delete();
	    
	    return redirect()->route('articles');
    }
}
