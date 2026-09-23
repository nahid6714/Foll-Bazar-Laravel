<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::table('orders', function (Blueprint $table) {
   if (!Schema::hasColumn('orders','division')) $table->string('division',120)->nullable();
   if (!Schema::hasColumn('orders','district')) $table->string('district',120)->nullable();
   if (!Schema::hasColumn('orders','upazila')) $table->string('upazila',120)->nullable();
   if (!Schema::hasColumn('orders','delivery_note')) $table->text('delivery_note')->nullable();
  });
 }
 public function down(): void {
  Schema::table('orders', function (Blueprint $table) {
   foreach(['division','district','upazila','delivery_note'] as $col) if (Schema::hasColumn('orders',$col)) $table->dropColumn($col);
  });
 }
};
