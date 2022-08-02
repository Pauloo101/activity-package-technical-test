<?php

declare(strict_types=1);

namespace Activity\Tests;

use Activity\ActivityServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase as OrchestraTestCase;


class TestCase extends OrchestraTestCase
{

    protected function getPackageProviders($app)
    {
        return [ActivityServiceProvider::class];
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->string('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('title');
            $table->string('body');
            $table->timestamps();
        });
    }

    // protected function getEnvironmentSetUp($app){
    //     $app['config']->set('database.default', 'test');
    //     $app['config']->set('database.connections.test',[
    //         'driver' => 'sqlite',
    //         'database' => ':memory:'
    //     ]);
    // }
}
