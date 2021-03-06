<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('teams')){//condicional agragada por error "table already exist". caso contrario va el codigo dentro de la condicional.

                Schema::create('teams', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        };
        
        
        //Tabela pivot
        Schema::create('team_users', function (Blueprint $table){
            $table->id();
            $table->foreignId('user_id')
            ->constrained('users')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');

            $table->foreignId('team_id')
            ->constrained('teams')
            ->onUpDate('CASCADE')
            ->onDelete('CASCADE');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
        Schema::dropIfExists('team_users');
    }
};
