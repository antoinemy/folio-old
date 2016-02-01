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

class ContactController extends Controller
{
    public function index()
    {
	    $data['page'] = Page::find(4);
        return view('admin.contact', $data);
    }
    
    public function update(Request $request)
    {
	    $input = $request->all();
		
	    $page = Page::find(4);

        $page->update([
	        'user_id' => Auth::user()->id,
			'is_active' => 1,
			'meta_title' => $input['meta_title'], 
			'meta_desc' => $input['meta_desc'], 
			'title_h1' => $input['title_h1'], 
			'desc' => $input['desc'], 
			'content' => $input['content'], 
			'sender' => $input['sender']
        ]);
        
        $page->cover->update([
			'name' => $input['background_image_name'],
			'url' => 'cover'
		]);
		
		if(isset($input['background_image'])) {
			$file = base_path().'/public/assets/images/contact/cover.jpg';
			$img = Image::make($input['background_image']);
			$img->save($file);	
		}
        
        return redirect()->route('contact_admin');
    }
}
