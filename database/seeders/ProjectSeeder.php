<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = config('db.projects');
        foreach($projects as $project){
            $newProject = new Project();
            $newProject ->title= $project['title'];
            $newProject ->description = $project['description'];
            $newProject ->technologies = $project['technologies'];
            $newProject ->authors = $project['authors'];
            $newProject ->release_date = $project['release_date'];
            $newProject -> user_id = 1 ;
            $newProject -> slug = Str::slug($project['title']);
            $newProject->save();
        }
    }
}
