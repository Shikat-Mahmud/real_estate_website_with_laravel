<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('bathroom')->nullable();
            $table->decimal('sqft', 10, 2)->nullable();
            $table->string('room')->nullable();
            $table->string('bed_room')->nullable();
            $table->string('unit')->nullable();
            $table->string('floor')->nullable();
            $table->string('kitchen')->nullable();
            $table->string('parking')->nullable();
            $table->string('propertyid')->nullable();
            $table->string('rent_type')->nullable();
            $table->string('floor_plan')->nullable();
            $table->string('year')->nullable();
            $table->string('structure_type')->nullable();

            $table->longText('description')->nullable();
            $table->longText('map')->nullable();
            $table->decimal('price', 10, 2);
            $table->text('video_url')->nullable();
            $table->text('property_images')->nullable();


            $table->integer('status')->comment('0=>active; 1=>inactive');

            $table->unsignedBigInteger('user_id'); // Foreign key to link to the Locations table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            
            $table->unsignedBigInteger('location_id'); // Foreign key to link to the Locations table
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            
            $table->text('amenities')->nullable();
            $table->text('nearest_places')->nullable();
            
            $table->unsignedBigInteger('property_type_id'); // Foreign key to link to the PropertyTypes table
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');
            $table->unsignedBigInteger('property_status_id'); // Foreign key to link to the PropertyStatuses table
            $table->foreign('property_status_id')->references('id')->on('property_statuses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};