<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Api\BaseApiController;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends BaseApiController
{
    public function index()
    {
        return $this->ok(Complaint::latest()->get());
    }

    public function show(Complaint $complaint)
    {
        return $this->ok($complaint);
    }

    public function update(Request $r, Complaint $complaint)
    {
        $d = $r->validate([
            'status' => 'required|in:open,in_progress,resolved,closed',
        ]);
        $complaint->update($d);

        return $this->ok($complaint);
    }
}
