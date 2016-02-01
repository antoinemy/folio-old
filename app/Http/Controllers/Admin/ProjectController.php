<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Page;
use App\Publish;
use App\PublishPicture;
use App\PublishTool;
use App\Picture;
use App\Tool;
use App\Category;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class ProjectController extends Controller
{
    public function index()
    {
	    $data['page'] = Page::find(3);
	    $data['publish'] = Publish::where('type', 'project')->orderBy('updated_at', 'DESC')->get();
        return view('admin.projects.index', $data);
    }
    
    public function update_page(Request $request)
    {
	    $input = $request->all();
	    
	    $page = Page::find(3);

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
			$file = base_path().'/public/assets/images/projects/cover.jpg';
			$img = Image::make($input['background_image']);
			$img->save($file);	
		}
	    
        return redirect()->route('projects');
    }
    
    public function create() 
    {
	    $data['categories'] = Category::all();
	    return view('admin.projects.create', $data);
    }
    
    public function store(Request $request) 
    {
	    $input = $request->all();
		
		$picture = Picture::create([
			'name' => $input['background_image_name'],
			'url' => 'cover'
		]);
		
	    $project = Publish::create([
	        'user_id' => Auth::user()->id,
	        'category_id' => $input['category_id'],
	        'picture_id' => $picture->id,
			'is_active' => 1,
			'type' => 'project',
			'title' => $input['title'], 
			'desc' => $input['desc'], 
			'content' => $input['content'],
			'url' => $input['url']
        ]);
        
		mkdir(base_path().'/public/assets/images/projects/'.$project->id, 0777);
        $file = base_path().'/public/assets/images/projects/'.$project->id.'/cover.jpg';
		$img = Image::make($input['background_image']);
		$img->save($file);
		
		$tools = explode('_', $input['tags']);
		
		if($tools[0] != '') {
			foreach($tools as $tool) {
				$tool = Tool::create([
					'term' => $tool
				]);
				
				PublishTool::create([
					'publish_id' => $project->id,
					'tool_id' => $tool->id
				]);
			}
		}
		
		for($i=0;$i<6;$i++) {
			if(isset($input['image_'.$i])) {
				$unique_name = md5(microtime());
				
				$picture = Picture::create([
					'name' => $input['image_name_'.$i],
					'url' => $unique_name
				]);
				
				PublishPicture::create([
					'publish_id' => $project->id,
					'picture_id' => $picture->id
				]);
				
				$file = base_path().'/public/assets/images/projects/'.$project->id.'/'.$unique_name.'.jpg';
				$img = Image::make($input['image_'.$i]);
				$img->save($file);
			}
		}
        
	    return redirect()->route('projects');
    }
    
    public function edit($id) 
    {
	    $data['publish'] = Publish::find($id);
	    $data['categories'] = Category::all();
	    
	    $data['tools'] = '';
	    $num = count($data['publish']->tools);
	    $i = 0;
	    foreach($data['publish']->tools as $tool) {
		    $data['tools'] .= $tool->tool->term;
		    if(++$i !== $num) {
				$data['tools'] .= '_';   
		    }
	    }
	    
	    return view('admin.projects.edit', $data);
    }
    
    public function update(Request $request, $id)
    {        
        $input = $request->all();
	    
	    $project = Publish::find($id);
	    
        $project->update([
	        'user_id' => Auth::user()->id,
	        'category_id' => $input['category_id'],
			'title' => $input['title'], 
			'desc' => $input['desc'], 
			'content' => $input['content'],
			'url' => $input['url']
        ]);
        
        if(isset($input['background_image'])) {
	        $file = base_path().'/public/assets/images/projects/'.$project->id.'/cover.jpg';
			$img = Image::make($input['background_image']);
			$img->save($file);
        }
        
		$project->cover->update([
			'name' => $input['background_image_name'],
		]);
		
		$tools = explode('_', $input['tags']);

		$project->tools->each(function($item, $key) {
			$item->tool->delete();
			$item->delete();
		});
		
		if($tools[0] != '') {
			foreach($tools as $tool) {
				$tool = Tool::create([
					'term' => $tool
				]);
				
				PublishTool::create([
					'publish_id' => $project->id,
					'tool_id' => $tool->id
				]);
			}
		}
		
        return redirect()->route('projects');
    }
    
    public function delete($id) 
    {
	    $project = Publish::find($id);
	    $project->delete();
	    
	    return redirect()->route('projects');
    }
}
