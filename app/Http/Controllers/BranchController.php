<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BranchController extends Controller
{
    public function changebranches(Request $request)
    {
        $changedBranches = Branch::where('id',$request->id)->first();
        Session::put('branch', $changedBranches);

        return redirect()->back();
        // dd($changedBranches);
    }
}
