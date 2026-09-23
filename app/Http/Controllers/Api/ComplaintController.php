<?php
namespace App\Http\Controllers\Api;
use App\Models\Complaint;
use Illuminate\Http\Request;
class ComplaintController extends BaseApiController {
 public function store(Request $r){
  $d=$r->validate([
   'customer_name'=>'nullable|string|max:190','customer_phone'=>'nullable|string|max:50','order_number'=>'nullable|string|max:60',
   'message'=>'required|string|min:3','image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:5120','image_url'=>'nullable|string|max:1000'
  ]);
  if($r->hasFile('image')) $d['image_url']=asset('storage/'.$r->file('image')->store('complaints','public'));
  unset($d['image']); $d['user_id']=$r->user()?->id; $d['status']='open';
  $c=Complaint::create($d); return $this->ok(['id'=>$c->id,'image_url'=>$c->image_url],201);
 }
 public function index(Request $r){return $this->ok(Complaint::where('user_id',$r->user()->id)->latest()->get());}
}
