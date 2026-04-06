<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;

class Admin_MemberController extends Controller
{
    //
    public function index(){
       
        $members = Member::orderBy('surname', 'asc')
                        ->orderBy('firstname', 'asc')
                        ->orderBy('middlename', 'asc')
                        ->paginate(2);

        return view('admin.members.index', compact('members'));

    }


    public function create()
    {
        $banks = Bank::orderBy('name', 'asc')->get();
        return view('admin.members.create', compact('banks'));
    }

    public function store(Request $request)
    {
        try
        {
            $formFields = $request->validate([
                'cardno' => 'required|string|max:255|unique:members,cardno',
                'firstname' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'middlename' => 'nullable|string|max:255',
                'dob' => 'required|date',
                'email' => 'nullable|email|unique:members,email',
                'phone' => 'required|string|max:50',
                'occupation' => 'required|string|max:255',
                "home_addr" => 'required|string|max:255',
                "denomination" => 'required|string|max:255',
                "denomination_addr" => 'required|string|max:255',
                "nok" => 'required|string|max:255',
                "nok_phone" => 'required|string|max:50',
                "nok_addr" => 'required|string|max:255',
                'bank' => 'required|exists:banks,id',
                'account_number' => 'required|string|max:255|unique:members,account_number',
                'account_name' => 'required|string|max:255',
            ]);

        //dd($request);
        DB::beginTransaction();

        
            $user_uuid = Str::orderedUuid();
            $password = Str::substr($user_uuid, 0,6);

            $createUser = User::create([
                'uuid' => $user_uuid,
                'surname' => $formFields['surname'],
                'firstname' => $formFields['firstname'],
                'middlename' => $formFields['middlename'],
                'email' => strtolower($request->cardno).'@jointheirs10.com',
                'password' => Hash::make($password),
                'role' => 'member'
            ]);

           
            //dd($createUser->id);

            if ($createUser)
            {
                $createMember = Member::create([
                    'uuid' => $user_uuid,
                    'user_id' => $createUser->id,
                    'cardno' => $formFields['cardno'],
                    'firstname' => ucfirst($formFields['firstname']),
                    'surname' => ucfirst($formFields['surname']),
                    'middlename' => ucfirst($formFields['middlename']),
                    'dob' => $formFields['dob'],
                    'email' => strtolower($formFields['email']),
                    'phone' => $formFields['phone'],
                    'occupation' => $formFields['occupation'],
                    "home_addr" => $formFields['home_addr'],
                    "denomination" => $formFields['denomination'],
                    "denomination_addr" => $formFields['denomination_addr'],
                    "nok" => $formFields['nok'],
                    "nok_phone" => $formFields['nok_phone'],
                    "nok_addr" => $formFields['nok_addr'],
                    'bank_id' => $request->input('bank'),
                    'account_number' => $formFields['account_number'],
                    'account_name' => $formFields['account_name']
                ]);

                if ($createMember)
                {
                    DB::commit();
                    $data = [
                        'error' => true,
                        'status' => 'success',
                        'message' => 'The Member has been successfully created.'
                    ];
                    
                }
                else
                {
                    DB::rollBack();
                    $data = [
                        'error' => true,
                        'status' => 'fail',
                        'message' => 'Failed to create member. Please try again.'
                    ];
                }
                
            }
            else
            {
                 DB::rollBack();
                 $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'Failed to create member. Please try again.'
                 ];
            }

        }
        catch(\Exception $e)
        {
            
            DB::rollBack();
            $data = [
            'error' => true,
            'status' => 'fail',
            'message' => $e->getMessage()
            ];
        }
        
        return redirect()->back()->with($data);
    }   


    public function edit($uuid)
    {
        $member = Member::where('uuid', $uuid)->first();

        if ($member == null)
        {
            return redirect()->back();
        }

        $banks = Bank::orderBy('name', 'asc')->get();
        return view('admin.members.edit', compact('banks', 'member'));

    }



    public function update(Request $request, $uuid)
    {
        
        try
        {
            $member = Member::where('uuid', $uuid)->first();

            if ($member == null)
            {
                return redirect()->back();
            }

            $formFields = $request->validate([
                'cardno' => 'required|string|max:255|unique:members,cardno',
                'firstname' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'middlename' => 'nullable|string|max:255',
                'dob' => 'required|date',
                'email' => 'nullable|email|unique:members,email',
                'phone' => 'required|string|max:50',
                'occupation' => 'required|string|max:255',
                "home_addr" => 'required|string|max:255',
                "denomination" => 'required|string|max:255',
                "denomination_addr" => 'required|string|max:255',
                "nok" => 'required|string|max:255',
                "nok_phone" => 'required|string|max:50',
                "nok_addr" => 'required|string|max:255',
                'bank' => 'required|exists:banks,id',
                'account_number' => 'required|string|max:255|unique:members,account_number',
                'account_name' => 'required|string|max:255',
            ]);

        //dd($request);
        DB::beginTransaction();

        
            $user = User::find($member->user_id);
           

            $updateUser = $user->update([               
                'surname' => $formFields['surname'],
                'firstname' => $formFields['firstname'],
                'middlename' => $formFields['middlename']                
            ]);

           
            //dd($createUser->id);

            if ($updateUser)
            {
                $updateMember = $member->update([
                    'cardno' => $formFields['cardno'],
                    'firstname' => ucfirst($formFields['firstname']),
                    'surname' => ucfirst($formFields['surname']),
                    'middlename' => ucfirst($formFields['middlename']),
                    'dob' => $formFields['dob'],
                    'email' => strtolower($formFields['email']),
                    'phone' => $formFields['phone'],
                    'occupation' => $formFields['occupation'],
                    "home_addr" => $formFields['home_addr'],
                    "denomination" => $formFields['denomination'],
                    "denomination_addr" => $formFields['denomination_addr'],
                    "nok" => $formFields['nok'],
                    "nok_phone" => $formFields['nok_phone'],
                    "nok_addr" => $formFields['nok_addr'],
                    'bank_id' => $request->input('bank'),
                    'account_number' => $formFields['account_number'],
                    'account_name' => $formFields['account_name']
                ]);

                if ($updateMember)
                {
                    DB::commit();
                    $data = [
                        'error' => true,
                        'status' => 'success',
                        'message' => 'The Member has been successfully updated.'
                    ];
                    
                }
                else
                {
                    DB::rollBack();
                    $data = [
                        'error' => true,
                        'status' => 'fail',
                        'message' => 'Failed to update member. Please try again.'
                    ];
                }
                
            }
            else
            {
                 DB::rollBack();
                 $data = [
                    'error' => true,
                    'status' => 'fail',
                    'message' => 'Failed to update member. Please try again.'
                 ];
            }

        }
        catch(\Exception $e)
        {
            
            DB::rollBack();
            $data = [
            'error' => true,
            'status' => 'fail',
            'message' => $e->getMessage()
            ];
        }
        
        return redirect()->back()->with($data);
    }


    public function show($uuid)
    {
        $member = Member::where('uuid', $uuid)->first();
        
        return view('admin.members.show', compact('member'));
    }
}
