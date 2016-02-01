<?php

namespace App\Http\Controllers;

use App\Page;
use App\Publish;

use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
	    $data['page'] = Page::find(2);
	    $data['url_cv'] = Page::find(1)->sender;
	    $data['publish'] = Publish::where('type', 'article')->orderBy('updated_at', 'DESC')->get();
        return view('list', $data);
    }
    
    public function show($id)
    {
	    $data['article'] = Publish::find($id);
	    $data['url_cv'] = Page::find(1)->sender;
	    $data['articles'] = Publish::where('type', 'article')->orderBy('updated_at', 'DESC')->take(3)->get();
        return view('article', $data);
    }
}
