<?php

namespace App\Http\Controllers;

use App\Page;
use App\Publish;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
	    $data['page'] = Page::find(1);
	    $data['url_cv'] = Page::find(1)->sender;
	    $data['articles'] = Publish::where('type', 'article')->orderBy('updated_at', 'DESC')->take(3)->get();
	    $data['projects'] = Publish::where('type', 'project')->orderBy('updated_at', 'DESC')->take(4)->get();
        return view('home', $data);
    }
    
    public function sitemap_xml()
    {
	    $data['page'] = Page::find(1);
	    $data['articles'] = Publish::where('type', 'article')->orderBy('updated_at', 'DESC')->take(3)->get();
	    $data['projects'] = Publish::where('type', 'project')->orderBy('updated_at', 'ASC')->take(4)->get();
        return view('home', $data);
    }
    
    public function sitemap()
    {
	    $data['page'] = Page::find(5);
	    $data['url_cv'] = Page::find(1)->sender;
	    $data['articles'] = Publish::where('type', 'article')->orderBy('updated_at', 'DESC')->get();
	    $data['projects'] = Publish::where('type', 'project')->orderBy('updated_at', 'DESC')->get();
        return view('sitemap', $data);
    }
    
    public function contact()
    {
	    $data['page'] = Page::find(4);
	    $data['url_cv'] = Page::find(1)->sender;
        return view('contact', $data);
    }
    
    public function post_contact(Request $request) {
	    $input = $request->all();
	    
	    if($input['spam'] == 7) {
		    $contact = Page::find(4)->sender;
		    
		    $headers = 'From: '.$input['email'].'\r\n'.'X-Mailer: PHP/'.phpversion();
		    
		    if(mail($contact, 'MESSAGE PORTFOLIO DE '.$input['name'], $input['content'], $headers)) {
			    return redirect()->route('contact')->with('type', 'success')->with('message', 'Le message a bien été envoyé. Je vous répondrai dès que possible.');
		    }
	        else {
		        return redirect()->route('contact')->with('type', 'error')->with('message', 'Une erreur est survenue, contactez-moi par téléphone. Sinon merci de réessayer ultérieurement.')->withInput();
	        }
	    }
	    else {
		    return redirect()->route('contact')->with('type', 'error')->with('message', 'La vérification anti-spam n\'est pas correct.')->withInput();
	    }
	    
    }
}
