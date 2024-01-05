<?php

use App\Models\Project;
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
        Schema::create('cermats', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignIdFor(Project::class);
            $table->string('location');
            $table->string('reported_by');
            $table->string('reported_posistion');
            $table->enum('reporter_status', ['PHM', 'Contractor']);
            $table->string('company');
            $table->string('case_description');
            $table->string('required_recomendation');
            $table->boolean('stop_card')->default(false);
            $table->foreignId('hazard_category_id')->constrained();
            $table->foreignId('event_id')->constrained();
            $table->foreignId('c_l_s_rule_id')->constrained();
            $table->enum('priority', ['P1 : Imediatelly to be closed', 'P2 : To be closed within a week', 'P3 : To be closed within a month']);
            $table->string('conern_department');
            $table->date('target_completion_date');
            $table->date('actual_completion_date');
            $table->enum('status',['open', 'close']);
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cermats');
    }
};
