<?php

use App\Constants\Enum;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('master_image')->default('default.png');
            $table->text('tags')->nullable();
            $table->enum('status',[Enum::PUBLISHED,Enum::INACTIVE])->default('published');
            $table->tinyInteger('is_deleted')->default(0);
            $table->foreignId('collection_id')->nullable()->constrained('collections');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
