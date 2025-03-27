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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->boolean('is_athena_user')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status')->default('active');
            $table->string('google_id')->nullable();
            $table->boolean('condition_utilisation')->default(false);
            $table->rememberToken();
            $table->timestamps();
            $table->string('username')->unique()->nullable();
            $table->foreignId('diploma_id')->nullable()->constrained('diplomas');
            $table->string('verify_token')->nullable();
            $table->string('social')->nullable();
            $table->text('fcm')->nullable();
            $table->string('image')->nullable();
            $table->text('disabled_reason')->nullable();
            $table->softDeletes();
            $table->string('phone')->nullable();
            $table->boolean('is_email')->default(true);
            $table->string('site_web')->nullable();
            $table->string('post')->nullable();
            $table->integer('points')->default(0);
            $table->boolean('page_pro')->default(false);
            $table->string('career')->nullable();
            $table->string('niveau')->nullable();
            $table->json('networks')->nullable();
            $table->foreignId('responsible_id')->nullable()->constrained('users');
            $table->string('name')->nullable();
            $table->string('pays')->nullable();
            $table->string('genre')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->text('history')->nullable();
            $table->json('team')->nullable();
            $table->string('couverture')->nullable();
        });
    }
        //Schema::create('users', function (Blueprint $table) {
          //  $table->id();
           // $table->string('name');
          //  $table->string('email')->unique();
           // $table->timestamp('email_verified_at')->nullable();
          //  $table->string('password');
          //  $table->rememberToken();
          //  $table->foreignId('current_team_id')->nullable();
          //  $table->string('profile_photo_path', 2048)->nullable();
          //  $table->timestamps();
       // });

       // Schema::create('password_reset_tokens', function (Blueprint $table) {
       //     $table->string('email')->primary();
       //     $table->string('token');
        //    $table->timestamp('created_at')->nullable();
       // });

       // Schema::create('sessions', function (Blueprint $table) {
        //    $table->string('id')->primary();
        //    $table->foreignId('user_id')->nullable()->index();
        //    $table->string('ip_address', 45)->nullable();
         //   $table->text('user_agent')->nullable();
         //   $table->longText('payload');
          //  $table->integer('last_activity')->index();
      //  });
    //}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
