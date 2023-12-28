<?php

use App\Models\FamilyCard;
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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FamilyCard::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('id_number');
            $table->string('name');
            $table->enum('gender', ['male', 'female']);
            $table->string('blood_type', 20);
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('religion');
            $table->longText('address');
            $table->string('phone');
            $table->string('marital_status');
            $table->string('occupation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
