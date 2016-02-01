<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Page;
use App\PagePicture;
use App\Picture;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class AboutController extends Controller
{
    public function index()
    {
	    $data['page'] = Page::find(1);
        return view('admin.about', $data);
    }
    
    public function update(Request $request)
    {
	    $input = $request->all();
		
	    $page = Page::find(1);

        $page->update([
	        'user_id' => Auth::user()->id,
			'is_active' => 1,
			'meta_title' => $input['meta_title'], 
			'meta_desc' => $input['meta_desc'], 
			'title_h1' => $input['title_h1'], 
			'title_h2' => $input['title_h2'], 
			'desc' => $input['desc'], 
			'content' => $input['content'], 
			'sender' => $input['sender']
        ]);
        
        $page->cover->update([
			'name' => $input['background_image_name'],
			'url' => 'cover'
		]);
		
		if(isset($input['background_image'])) {
			$file = base_path().'/public/assets/images/about/cover.jpg';
			$img = Image::make($input['background_image']);
			$img->save($file);	
		}
		
		foreach($page->pictures as $key=>$pic) {
			
			if(isset($input['about_image_name_'.$key])) {
				$pic->picture->name = $input['about_image_name_'.$key];
				$pic->picture->save();	
			}
			
			if(isset($input['about_image_'.$key])) {
				$unique_name = md5(microtime());
				
				$file = base_path().'/public/assets/images/about/'.$unique_name.'.jpg';
				$img = Image::make($input['about_image_'.$key]);
				$img->save($file);	
				
				$pic->picture->url = $unique_name;
				$pic->picture->save();
			}
		}
        
        return redirect()->route('about');
    }
}
