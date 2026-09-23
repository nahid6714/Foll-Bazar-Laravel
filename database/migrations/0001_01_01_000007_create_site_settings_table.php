<?php
use Illuminate\Database\Migrations\Migration; use Illuminate\Database\Schema\Blueprint; use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up():void{if(Schema::hasTable('site_settings'))return;Schema::create('site_settings',function(Blueprint $t){$t->string('setting_key',190)->primary();$t->longText('setting_value')->nullable();$t->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();});} public function down():void{/* legacy table preserved intentionally; not dropped on rollback */} };
