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
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('type_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // qui dobbiamo scrivere il codice che ci annulla l'aggiunta della chiave esterna
            // nella stringa del parametro di dropForeign() dobbiamo scrivere così:
            // "tabella_campo_foreign"
            // questo ci rimuoverà SOLO il vincolo
            $table->dropForeign('projects_type_id_foreign');

            // poi dobbiamo cancellare la colonna
            $table->dropColumn('type_id');
        });
    }
};
