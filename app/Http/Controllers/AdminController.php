<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;



class AdminController extends Controller
{
    function index() {
        $all = Complaint::count();
        $pending = Complaint::where('status', 'pending')->count();
        $proses = Complaint::where('status', 'proses')->count();
        $selesai = Complaint::where('status', 'selesai')->count();
    
        return view('.dashboard.index',[
            'all'=> $all,
            'pending' => $pending,
            'process' => $proses,
            'done' => $selesai
        ]);
    }

    function allComplaints() {
        $data = Complaint::with( ['user'])->get();
        return view('admin.complaints.index', [
            'data' => $data 
        ]);
    }

    function allPendingComplaints() {
        $data = Complaint::where('status', 'pending')->get();
        return view('admin.complaints.index', [
            'data' => $data 
        ]);


   }


   function allProcessComplaints() {
    $data = Complaint::where( 'status', 'proses')->get();
    return view('admin.complaints.index', [
        'data' => $data 
    ]);

   }
   function allSuccessComplaints() {
    $data = Complaint::where( 'status', 'selesai')->get();
    return view('admin.complaints.index', [
        'data' => $data 
    ]);

}
 function showComplaint($id) {
    $data = Complaint::findOrFail($id);
    return view('admin.complaints.detail-complaint', [
    'data' => $data
     ]);

   }

}
