<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bars', function (Blueprint $table) {
           $table->string('some_external_id')->index()->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bars');
    }
};
