<?php
namespace Database\Seeders; use Illuminate\Database\Seeder; use App\Models\{User,Profile}; use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder { public function run():void{$u=User::updateOrCreate(['email'=>'admin@folbazar.local'],['password_hash'=>Hash::make('ChangeMe123!'),'role'=>'admin']);Profile::updateOrCreate(['id'=>$u->id],['full_name'=>'Fol Bazar Admin','phone'=>'','email'=>$u->email,'role'=>'admin']);} }
