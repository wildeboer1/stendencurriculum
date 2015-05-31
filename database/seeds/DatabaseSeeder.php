<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('EducationTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('LocationTableSeeder');
		$this->call('ModuleTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){
		DB::table('users')->insert([
			[
				'name' => 'Mark',
				'email' => 'mark@mark.com',
				'docent_code' => 'MWIL',
				'password' => bcrypt('mark')
			]
		]);

		DB::table('education_user')->insert([
			[
				'user_id' => 1,
				'education_id' => 1
			]
		]);

	}
}

class LocationTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){
		DB::table('locations')->insert([
			[
				'name' => 'Emmen'
			],
			[
				'name' => 'Meppel'
			],
			[
				'name' => 'Assen'
			],
			[
				'name' => 'Leeuwarden'
			]
		]);

		DB::table('education_location')->insert([
			[
				'education_id' => 1,
				'location_id' => 1
			]
		]);
	}
}

class EducationTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){
		DB::table('educations')->insert([
			[
				'name' => 'Commerciele Economie'
			],
			[
				'name' => 'Informatica'
			],
			[
				'name' => 'Bedrijfskunde'
			],
			[
				'name' => 'Logistiek'
			]
		]);
	}
}



class ModuleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){
		DB::table('modules')->insert([
			[
				'name' => 'Inleiding Programmeren',
				'module_code' => 'PHP1',
				'description' => 'Omschrijving PHP1',
				'school_year' => 1,
				'school_period' => 1

			],
			[
				'name' => 'Inleiding Wiskunde',
				'module_code' => 'WIS1',
				'description' => 'Omschrijving WIS1',
				'school_year' => 1,
				'school_period' => 3

			],
			[
				'name' => 'Gevordend Engels',
				'module_code' => 'ENG3',
				'description' => 'Omschrijving ENG3',
				'school_year' => 2,
				'school_period' => 1

			],
			[
				'name' => 'Object Georienteerd Programmeren',
				'module_code' => 'OOP1',
				'description' => 'Omschrijving over OOP1',
				'school_year' => 1,
				'school_period' => 4
			]
		]);

		DB::table('education_module')->insert([
			[
				'education_id' => 1,
				'module_id' => 1
			]
		]);
	}
}