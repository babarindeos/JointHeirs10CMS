<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Bank;

class Admin_BankController extends Controller
{
    //

    public function index()
    {
        return view('admin.banks.index');
    }

    public function create()
    {
        return view('admin.banks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:banks,code',
        ]);

        // Create a new bank record
        $uuid = Str::uuid(); // Generate a UUID
        
        $create = Bank::create([
            'uuid' => $uuid,
            'name' => $request->name,
            'code' => $request->code,
        ]);

        if ($create) 
        {
            $data = [
                'error' => true,
                'status' => 'success',
                'message' => 'Bank created successfully.',
            ];
           
        } 
        else 
        {
            $data = [
                'error' => true,
                'status' => 'fail',
                'message' => 'Failed to create bank.',
            ];
        }   

        return redirect()->back()->with($data);
    }
}
