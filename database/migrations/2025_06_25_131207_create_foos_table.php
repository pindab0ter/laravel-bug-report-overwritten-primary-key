<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('foos', function (Blueprint $table) {
            // Not autoincrementing
            $table->integer('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('foos');
    }
};
