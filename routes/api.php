<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Brain;
use App\Models\BrainPort;
use App\Models\Hub;

use App\Http\Middleware\CheckApiKey;
use App\Http\Middleware\CheckForJson;

use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/brains', function () {

    $result['status'] = 'Success';
    $result['data'] = Brain::all();

    return $result;

});

Route::middleware([CheckApiKey::class,CheckForJson::class])->group(function () {

    Route::get('/whoami', function (Request $request) {

        $result['status'] = 'Success';
        $result['data'] = $request->brain;    

        return $result;
    
    });

    Route::get('/device', function(Request $request) {

        $result['status'] = 'Success';
        $result['data'] = [
            'ip' => $_SERVER['REMOTE_ADDR'],
            'key' => $request->get('key'),
            'id' => $request->brain->id,
        ];

        return $result;

    });

    Route::get('/brain', function (Request $request) {

        $brain = $request->brain;
        $brain->brainPorts;

        $hub = Hub::where('id', $brain->hub_id)->first();
        $hub->hubPorts;

        $result['status'] = 'Success';
        $result['data']['hub'] = $hub;
        $result['data']['brain'] = $brain;

        return $result;

    });


    Route::get('/port/{brainPort?}/settings/{json}', function(Request $request, BrainPort $brainPort, $json) {

        $brainPort->settings = $json;
        $brainPort->update();

        $result['status'] = 'Success';
        $result['data']['brainPort'] = $brainPort;

        return $result;

    });

});


/*

Route::get('/evaluations', function () {

    return Evaluation::all();

});


Route::get('/tags', function () {

    return Tag::orderBy('title')->get();

});


Route::get('/memes/tag/{tag?}', function (Tag $tag) {

    $memes = $tag->manyMemes()->orderBy('displayed_at')->get();

    foreach($memes as $key => $meme)
    {
        if ($memes[$key]->image)
        {
            $memes[$key]->image = env('APP_URL') . 'storage/' . $memes[$key]->image;
        }
    }

    return $memes;

})->where('type', '[0-9]+');


Route::get('/memes/displayed/{meme?}', function (Meme $meme) {

    $meme->displayed_at = Carbon::now();
    $meme->save();
 
    return $meme;

})->where('type', '[0-9]+');



Route::get('/pages/topic/{topic?}', function (Topic $topic) {

    $pages = Page::where('topic_id', $topic->id)->orderBy('published_at', 'ASC')->get();

    foreach($pages as $key => $page)
    {
        if ($pages[$key]->image)
        {
            $pages[$key]->image = env('APP_URL') . 'storage/' . $pages[$key]->image;
        }

        $pages[$key]->topics = $page->manyTopics()->get();
        foreach($pages[$key]->topics as $key2 => $topic)
        {
            $pages[$key]->topics[$key2]->image = env('APP_URL') . 'storage/' . $pages[$key]->topics[$key2]->image;
        }

    }

    return $pages;

});

Route::get('/pages/profile/{slug}', function ($slug) {

    $page = Page::where('id', $slug)->orWhere('slug', $slug)->firstOrFail();

    if ($page->image)
    {
        $page->image = env('APP_URL') . 'storage/' . $page->image;
    }

    $page->topic = $page->topic()->first();
    
    if ($page->topic->image)
    {
        $page->topic->image = env('APP_URL') . 'storage/' . $page->topic->image;
    }
    if ($page->topic->banner)
    {
        $page->topic->banner = env('APP_URL') . 'storage/' . $page->topic->banner;
    }

    $page->topics = $page->manyTopics()->get();
    foreach($page->topics as $key => $topic)
    {
        if ($page->topics[$key]->image)
        {
            $page->topics[$key]->image = env('APP_URL') . 'storage/' . $page->topics[$key]->image;
        }
        if ($page->topics[$key]->banner)
        {
            $page->topics[$key]->banner = env('APP_URL') . 'storage/' . $page->topics[$key]->banner;
        }
    }

    return $page;

});



Route::get('/socials/{filter?}/{value?}', function ($filter = false, $value = false) {

    if ($filter and $value) 
    {
        $socials = Social::where($filter, $value)->orderBy('title')->get();
    }
    else
    {
        $socials = Social::orderBy('title')->get();
    }

    foreach($socials as $key => $social)
    {
        if ($socials[$key]->image)
        {
            $socials[$key]->image = env('APP_URL') . 'storage/' . $socials[$key]->image;
        }
    }

    return $socials;

})->where('filter', 'home|about|header')->where('value', 'yes|no');


Route::get('/toolTypes', function() {

    return ToolType::all();

});

Route::get('/tools/type/{toolType?}', function (ToolType $toolType) {

    $tools = Tool::where('tool_type_id', $toolType->id)->orderBy('title')->get();

    foreach($tools as $key => $tool)
    {
        if ($tools[$key]->image)
        {
            $tools[$key]->image = env('APP_URL') . 'storage/' . $tools[$key]->image;
        }
    }

    return $tools;

})->where('type', '[0-9]+');



Route::get('/topics/{filter?}/{value?}', function ($filter = null, $value = null) {

    if ($filter and $value)
    {
        if ($filter == 'pages')
        {
            $topics = Topic::whereHas('pages')->orderBy('title')->get();
        }
        else
        {
            $topics = Topic::where($filter, $value)->orderBy('title')->get();
        }
    }
    else 
    {
        $topics = Topic::orderBy('title')->get();
    }

    foreach($topics as $key => $topic)
    {
        if ($topics[$key]->image)
        {
            $topics[$key]->image = env('APP_URL') . 'storage/' . $topics[$key]->image;
        }
        $topics[$key]->pages = $topic->pages()->count();
    }

    return $topics;

})->where('filter', 'pages|teaching|background')->where('value', 'yes|no|light|dark');

Route::get('/topics/page/{page?}', function (Page $page) {

    $topics = $page->manyTopics()->get();

    foreach($topics as $key => $topic)
    {
        if ($topics[$key]->image)
        {
            $topics[$key]->image = env('APP_URL') . 'storage/' . $topics[$key]->image;
        }
    }

    return $topics;

});

Route::get('/assignments', function () {

    $assignments = Assignment::all();

    foreach($assignments as $key => $assignment)
    {
        if ($assignments[$key]->image)
        {
            $assignments[$key]->image = env('APP_URL') . 'storage/' . $assignments[$key]->image;
        }
    }

    return $assignments;

});

Route::get('/courses', function () {

    $courses = Course::orderBy('name', 'ASC')->get();

    foreach($courses as $key => $course)
    {
        $courses[$key]->topics = $course->manyTopics()->get();
        foreach($courses[$key]->topics as $key2 => $topic)
        {
            $courses[$key]->topics[$key2]->image = env('APP_URL') . 'storage/' . $courses[$key]->topics[$key2]->image;
        }

    }

    return $courses;

});

*/