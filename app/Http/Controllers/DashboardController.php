<?php

namespace App\Http\Controllers;

use App\Models\Ptw;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        // dd();
        $total_proposal = count(Status::where('name', 'Proposal')->get());
        $total_verification = count(Status::where('name', 'Verification')->get());
        $total_assessment = count(Status::where('name', 'Assessment')->get());
        $total_rejection = count(Status::where('name', 'Rejection')->get());

        $ptws = Ptw::all();
        $user = User::where('id', Auth()->user()->id)->first();
        return view('dashboard', compact('user', 'total_proposal', 'total_verification', 'total_assessment', 'total_rejection', 'ptws'));
    }
}