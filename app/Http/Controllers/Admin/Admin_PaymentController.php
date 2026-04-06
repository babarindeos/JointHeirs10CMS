<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\TempUpload;
use App\Models\FailedPayment;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\TempPayment;

class Admin_PaymentController extends Controller
{
    //
    public function index()
    {
        $temp_payments = TempPayment::get();
        return view('admin.payments.index', compact('temp_payments'));
    }

    public function preview(Request $request)
    {
        $request->validate([
            'month' => 'required',
            'year' => 'required',
            'file' => 'required|file|mimes:csv,txt',
        ]);

        //dd($request->all());

        // Read the CSV document file
        $file = $request->file('file');

        $filePath = $file->getRealPath();
        $data = array_map('str_getcsv', file($filePath));

        
        // Handle the uploaded file and preview logic here
        // You can read the CSV file and prepare data for preview
        try
        {
            if (count($data) > 0)
            {
                $header = ["cardno", "dev_levy", "pension", "savings", "shares"];

                // get the member details for the card number and prepare the data for preview

                $formFields = array();
                $failedRecords = array();

                foreach($data as $row)
                {
                    $row = array_combine($header, $row);
                    $cardno = $row['cardno'];

                    // get user_id from the member table
                    $member = Member::where('cardno', $cardno)->first();

                    //dd($member);

                    $reference_id =  $request->input('year').'_'.$request->input('month').'_'.rand(10000, 99999);

                    $payment_data = [
                        'month' => $request->input('month'),
                        'year' => $request->input('year'),
                        'dev_levy' => $row['dev_levy'],
                        'pension' => $row['pension'],
                        'savings' => $row['savings'],
                        'shares' => $row['shares'],
                        'payment_date' => Carbon::createFromFormat('d-m-Y', '01-'.$request->input('month').'-'.$request->input('year')),
                        'remarks' => '',
                        'post_mode' => 'bulk upload',
                        'reference_id' => $reference_id,
                        'user_id' => $member ? $member->user_id : null,
                        'uuid' => \Str::uuid()
                        
                    ];
                
                    //dd($payment_data);

                    if ($member != null)
                    {           
                        array_push($formFields, $payment_data);

                    }
                    else
                    {
                        array_push($failedRecords, $payment_data);
                    }

                }
                
                
                // Record the failed transactions
                FailedPayment::truncate();
                foreach($failedRecords as $fail)
                {
                    FailedPayment::create($fail);
                }


                // Create a transaction and insert the operation data into the database

                DB::beginTransaction();

                try
                {
                    foreach($formFields as $row)
                    {
                        TempPayment::create($row);
                        
                    }
                    DB::commit();
                }
                catch(\Exception $e)
                {
                    DB::rollBack();
                    
                    $data = [
                        'error'=>true,
                        'status' => 'fail',
                        'message' => $e->getMessage()
                    ];

                    return redirect()->back()->with($data);
                }

                return redirect()->back();
             


            }

        }
        catch(\Exception $e)
        {
            $data = [
                'error'=>true,
                'status' => 'fail',
                'message' => $e->getMessage()
            ];

           
        }

        return back()->with($data);
        
        //return view('admin.payments.preview', [
            // Pass the necessary data to the preview view
        //]);
    }
}
