<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('comunicados', function (Blueprint $table) {
        $table->integer('orden')->nullable()->after('contenido');  // Agrega la columna 'orden'
    });
}

public function down()
{
    Schema::table('comunicados', function (Blueprint $table) {
        $table->dropColumn('orden');  // Elimina la columna si se hace un rollback
    });
}

};



