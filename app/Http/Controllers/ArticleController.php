<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Article;
use App\Models\ArticleType;

class ArticleController extends Controller
{
    public function list()
    {

        return view('articles.list', [
            'articles' => Article::all()
        ]);

    }

    public function addForm()
    {

        return view('articles.add', [
            'homes'=> Article::homes(),
            'article_types' => ArticleType::all(),
        ]);

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'url' => 'nullable',
            'resources' => 'nullable',
            'instagram_id' => 'nullable',
            'twitter_id' => 'nullable',
            'soundcloud_id' => 'nullable',
            'article_type_id' => 'required',
            'published_at' => 'required',
            'home' => 'required',
        ]);

        $article = new Article();
        $article->create($attributes);

        return redirect('/articles/list')
            ->with('message', 'Article has been added!');

    }

    public function editForm(Article $article)
    {
        
        return view('articles.edit', [
            'article' => $article,
            'homes'=> Article::homes(),
            'article_types' => ArticleType::all(),
        ]);

    }

    public function edit(Article $article)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'url' => 'nullable',
            'resources' => 'nullable',
            'instagram_id' => 'nullable',
            'twitter_id' => 'nullable',
            'soundcloud_id' => 'nullable',
            'article_type_id' => 'required',
            'published_at' => 'required',
            'home' => 'required',
        ]);

        $article->update($attributes);

        return redirect('/articles/list')
            ->with('message', 'Article has been edited!');

    }

    public function delete(Article $article)
    {
        
        Storage::delete($article->image);
        
        $article->delete();

        return redirect('/articles/list')
            ->with('message', 'Article has been deleted!');                
        
    }

    public function imageForm(Article $article)
    {

        return view('articles.image', [
            'article' => $article,
            'type' => 'articles'
        ]);
    }

    public function image(Article $article)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        Storage::delete($article->image);
        
        $path = request()->file('image')->store('articles');

        $article->image = $path;
        $article->save();
        
        return redirect('/articles/list')
            ->with('message', 'Article image has been edited!');
    }

    public function deleteImage(Article $article)
    {

        Storage::delete($article->image);

        $article->image = "";
        $article->save();

        return redirect('/articles/list')
            ->with('message', 'Article image has been deleted!');

    }
}
