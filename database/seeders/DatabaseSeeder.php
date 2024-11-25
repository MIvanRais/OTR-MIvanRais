<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\SubjectAssessmentTraining;
use App\Models\SubjetMandatoryTraining;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

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
        $faker = Faker::create('id_ID');

        Role::create([
            'name'=>'Admin', 
            'description'=>'Super User'
        ]);
        Role::create([
            'name'=>'Engineer', 
            'description'=>'Propose Permit to Work Document'
        ]);
        Role::create([
            'name'=>'PIC', 
            'description'=>'Verification Permit to Work Document'
        ]);
        Role::create([
            'name'=>'Quality Inspector', 
            'description'=>'Assessment Permit to Work Document'
        ]);

        
        User::create([
            'username' => $faker->userName,
            'password' => Hash::make('password'), // Default password for all users
            'email' => $faker->unique()->safeEmail,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'address' => $faker->address,
            'phone_number' => $faker->phoneNumber,
            'company_id_no'=> $faker->numerify('##########'),
            'last_formal_education' => $faker->randomElement(['S1', 'D4', 'D3', 'D2', 'D1', 'SMA', 'SMK']),
            'role_id' => 1
        ]);
        User::create([
            'username' => $faker->userName,
            'password' => Hash::make('password'), // Default password for all users
            'email' => $faker->unique()->safeEmail,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'address' => $faker->address,
            'phone_number' => $faker->phoneNumber,
            'company_id_no'=> $faker->numerify('##########'),
            'last_formal_education' => $faker->randomElement(['S1', 'D4', 'D3', 'D2', 'D1', 'SMA', 'SMK']),
            'role_id' => 2
        ]);
        User::create([
            'username' => $faker->userName,
            'password' => Hash::make('password'), // Default password for all users
            'email' => $faker->unique()->safeEmail,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'address' => $faker->address,
            'phone_number' => $faker->phoneNumber,
            'company_id_no'=> $faker->numerify('##########'),
            'last_formal_education' => $faker->randomElement(['S1', 'D4', 'D3', 'D2', 'D1', 'SMA', 'SMK']),
            'role_id' => 2
        ]);
        User::create([
            'username' => $faker->userName,
            'password' => Hash::make('password'), // Default password for all users
            'email' => $faker->unique()->safeEmail,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'address' => $faker->address,
            'phone_number' => $faker->phoneNumber,
            'company_id_no'=> $faker->numerify('##########'),
            'last_formal_education' => $faker->randomElement(['S1', 'D4', 'D3', 'D2', 'D1', 'SMA', 'SMK']),
            'role_id' => 3
        ]);
        User::create([
            'username' => $faker->userName,
            'password' => Hash::make('password'), // Default password for all users
            'email' => $faker->unique()->safeEmail,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'address' => $faker->address,
            'phone_number' => $faker->phoneNumber,
            'company_id_no'=> $faker->numerify('##########'),
            'last_formal_education' => $faker->randomElement(['S1', 'D4', 'D3', 'D2', 'D1', 'SMA', 'SMK']),
            'role_id' => 3
        ]);
        User::create([
            'username' => $faker->userName,
            'password' => Hash::make('password'), // Default password for all users
            'email' => $faker->unique()->safeEmail,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'address' => $faker->address,
            'phone_number' => $faker->phoneNumber,
            'company_id_no'=> $faker->numerify('##########'),
            'last_formal_education' => $faker->randomElement(['S1', 'D4', 'D3', 'D2', 'D1', 'SMA', 'SMK']),
            'role_id' => 4
        ]);
        User::create([
            'username' => $faker->userName,
            'password' => Hash::make('password'), // Default password for all users
            'email' => $faker->unique()->safeEmail,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'address' => $faker->address,
            'phone_number' => $faker->phoneNumber,
            'company_id_no'=> $faker->numerify('##########'),
            'last_formal_education' => $faker->randomElement(['S1', 'D4', 'D3', 'D2', 'D1', 'SMA', 'SMK']),
            'role_id' => 4
        ]);

        SubjetMandatoryTraining::create([
            'subject'=>'HUMAN FACTOR TRAINING'
        ]);
        SubjetMandatoryTraining::create([
            'subject'=>'SMS TRAINING'
        ]);
        SubjetMandatoryTraining::create([
            'subject'=>'RVSM PBN TRAINING'
        ]);
        SubjetMandatoryTraining::create([
            'subject'=>'ETOPS TRAINING (only for applicant for A/C type effective ETOPS)'
        ]);
        SubjetMandatoryTraining::create([
            'subject'=>'RII TRAINING (only for applicant RII)'
        ]);

        SubjectAssessmentTraining::create([
            'subject'=>'The understanding of CASR, SMS, HF, RVSM & PBN'
        ]);
        SubjectAssessmentTraining::create([
            'subject'=>'The understanding of Lion Air CMM, QCPM and QN'
        ]);
        SubjectAssessmentTraining::create([
            'subject'=>'The understanding of Required Inspection Item (only for applicant RII person)'
        ]);
        SubjectAssessmentTraining::create([
            'subject'=>'The understanding of ETOPS (only for applicant type rating A330)'
        ]);
        SubjectAssessmentTraining::create([
            'subject'=>'The understanding and the application of MP and MEL'
        ]);
        SubjectAssessmentTraining::create([
            'subject'=>'Preflight / Transit / Daily'
        ]);
        SubjectAssessmentTraining::create([
            'subject'=>'AD / SB'
        ]);
        SubjectAssessmentTraining::create([
            'subject'=>'AFML, DMI, DBC, NSRDI'
        ]);
        SubjectAssessmentTraining::create([
            'subject'=>'Chronologies Report, AOG and SS Declaration'
        ]);
        SubjectAssessmentTraining::create([
            'subject'=>'The understanding of Airframe, Engine, Aircraft system'
        ]);
        SubjectAssessmentTraining::create([
            'subject'=>'The understanding of Electronics, Instrument, Radio installed to the Aircraft type'
        ]);
        SubjectAssessmentTraining::create([
            'subject'=>'What is the experience on performing trouble shooting on the aircraft? And how is his/her PASS FAIL performance on conducting trouble shooting?'
        ]);
    }
}