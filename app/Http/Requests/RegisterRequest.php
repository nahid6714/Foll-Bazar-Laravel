<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class RegisterRequest extends FormRequest { public function authorize():bool{return true;} public function rules():array{return ['name'=>['required','string','min:2','max:190'],'phone'=>['required','string','min:11','max:50'],'email'=>['nullable','email','max:190'],'password'=>['required','string','min:6']];} }
