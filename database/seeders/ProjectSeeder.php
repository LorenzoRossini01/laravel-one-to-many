<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $projects=config('projects');
        foreach($projects as $currProject){
            $project=new Project;
            $project->title=$currProject['title'];
            $project->description=$currProject['description'];
            $project->link=$currProject['link'];
            $project->imageUrl=$currProject['imageUrl'];
            $project->slug=Str::slug($project->title);
            $project->save();
        }


        // for($i=0;$i<50;$i++){

        //     $project=new Project;
        //     $project->title=$faker->catchPhrase();
        //     $project->description=$faker->paragraph(2);
        //     $project->link=$faker->url();
        //     $project->imageUrl=$faker->imageUrl(640, 480, 'animals', true);
        //     $project->slug=Str::slug($project->title);
        //     $project->save();
        // }
    }
}
