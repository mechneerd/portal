<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostingsTable extends Migration
{
    public function up()
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title'); // Job Title
            $table->text('description'); // Job Description
            $table->string('company_name'); // Company Name
            $table->string('location'); // Job Location
            $table->decimal('salary', 10, 2)->nullable(); // Salary Range (optional)
           // $table->enum('job_type', ['full-time', 'part-time', 'contract'])->nullable(); // Job Type
            $table->string('logo')->nullable(); // Logo column added here
            $table->timestamps(); // Created at & Updated at
            $table->dateTime('expires_at')->nullable(); // Deadline for applications (optional)
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_postings');
    }
}
