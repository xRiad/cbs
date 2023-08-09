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
        Schema::create('projects_roles', function (Blueprint $table) {
          $table->unsignedBigInteger('role_id');
          $table->unsignedBigInteger('project_id');

          $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
          $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

          $table->primary(['role_id', 'project_id']);

          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_roles');
    }
};
