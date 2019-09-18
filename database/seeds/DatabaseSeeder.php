<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(GroupMenusTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuFrontendsTableSeeder::class);
        $this->call(SurveysTableSeeder::class);
        $this->call(SurveyQuestionsTableSeeder::class);
        $this->call(SurveyConditionsTableSeeder::class);
        $this->call(SurveyAnswersTableSeeder::class);
    }
}
