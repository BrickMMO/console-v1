<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleType;
use App\Models\Evaluation;
use App\Models\Meme;
use App\Models\Page;
use App\Models\Social;
use App\Models\Tag;
use App\Models\Tool;
use App\Models\ToolType;
use App\Models\Topic;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // \App\Models\User::factory(10)->create();

        // Schema::disableForeignKeyConstraints();
        // -Schema::enableForeignKeyConstraints();

    }
   
}
