<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancionesTable extends Migration
{
    public function up()
    {
        Schema::create('canciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('album');
            $table->date('fecha');
            $table->time('duracion');
            $table->string('imagen');
            $table->string('archivo');
            $table->timestamps();
        });

        
        DB::table('canciones')->insert([
            [
                'nombre' => 'Cold',
                'album' => 'Rich Brian - Amen',
                'fecha' => '2018-02-20',
                'duracion' => '1',
                'imagen' => 'richbrian_cold.png',
                'archivo' => 'Rich Brian - Cold.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Tarot',
                'album' => 'Bad Bunny (ft. Jhay Cortez) - Un verano sin ti',
                'fecha' => '2022-05-06',
                'duracion' => '1',
                'imagen' => 'badbunny_tarot.jfif',
                'archivo' => 'Bad Bunny (ft. Jhay Cortez) - Tarot .mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('canciones');
    }
}