<?php

namespace App\Http\Controllers;

use SEO;
use JsonLd;
use SEOMeta;
use Twitter;
use OpenGraph;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index()
    {
    	$categories = Category::with('posts')->get();

        foreach($categories as $category){
        $posts = $category->posts;
        $archives = Post::latest()->limit(10)->get();
        $posts = Post::latest()->paginate(10);
        $tags = Tag::with('posts')->get();

        $title = 'Latest news in Kenya';
        $desc = 'Latest news in Kenya,East Africa, Africa,Europe,Asia and America';
        $url = 'https://santonamedia.com/';

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords('latest,news,Kenya,East Africa, Africa,Europe,Asia,America');
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','articles');

        Twitter::setTitle($title);
        Twitter::setSite('@santonamedia');

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::addImage('https://santonamedia.com/public/static/globe.png');

        $data = array(
                    'categories' => $categories,
                    'posts' => $posts,
                    'archives' => $archives,
                    'category' => $category,
                    'tags' => $tags,
                    );

    	return view('welcome',$data);
	}
   }
}
