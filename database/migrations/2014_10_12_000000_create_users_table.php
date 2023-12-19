<?php

use App\Enums\UserGenderEnum;
use App\Enums\UserRoleEnum;
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

            $table->string('surname');
            $table->string('name');
            $table->string('patronymic')->nullable();
            $table->date('birth_date');
            $table->enum('gender', [
                UserGenderEnum::man->name,
                UserGenderEnum::women->name,
            ]);

            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('password');

            $table->enum('role', [
                UserRoleEnum::cook->name,
                UserRoleEnum::director->name,
                UserRoleEnum::accountant->name,
                UserRoleEnum::manager->name,
                UserRoleEnum::waiter->name,
            ]);

            $table->foreignId('file_id')
                ->nullable()
                ->constrained();

            $table->index(['role']);
            $table->index(['gender']);
            $table->index(['birth_date']);

            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
