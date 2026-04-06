<x-admin-layout>
    
    <div class="container mx-auto">
        <!-- page header //-->
        <section class="flex flex-col w-[90%] md:w-[95%] py-8 px-4 border-red-900 mx-auto">
            
            <div class="flex border-b border-gray-300 py-2 justify-between">
                    <div >
                        <h1 class="text-2xl font-semibold font-serif text-gray-800">New Member</h1>
                    </div>                
            </div>
            
        </section>
        <!-- end of page header //-->



        <!-- new college form //-->
        <section>
                <div>
                    <form  action="{{ route('admin.members.store')}} " method="POST" class="flex flex-col mx-auto w-[90%] items-center justify-center">
                        @csrf

                        

                        <div class="flex flex-col w-[80%] md:w-full py-2 md:py-1 hidden" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                            <h2 class="font-semibold text-xl py-1" >New Office</h2>
                            Provide Office name 
                        </div>


                        @include('partials._session_response')
                        
                        
                         <!-- Card No and Names //-->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 border-red-900 w-[80%] md:w-[100%] py-3">
                            <div>
                                 <input type="text" name="cardno" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Card No."
                                                                    required
                                                                    value="{{ old('cardno') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />                                                                                                                                

                                                                    @error('cardno')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>
                            <div>
                                 <input type="text" name="surname" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Surname"
                                                                    required
                                                                    value="{{ old('surname') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />                                                                                                                                       

                                                                    @error('name')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>
                            <div>
                                     <input type="text" name="firstname" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="First Name"
                                                                    required
                                                                    value="{{ old('firstname') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />                                                                                                                                        

                                                                    @error('firstname')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>
                            <div>
                                     <input type="text" name="middlename" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Middle Name"
                                                                    
                                                                    value="{{ old('middlename') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />  
                                                                                                                                        

                                                                    @error('middlename')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>
                        </div><!-- end of card no and names //-->



                        <!-- dob, phone and email //-->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 border-red-900 w-[80%] md:w-[100%] py-3">
                            <div>
                                 <input type="date" name="dob" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="DOB"
                                                                    required
                                                                    value="{{ old('dob') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />                                                                                                                                

                                                                    @error('dob')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>


                            <div>
                                 <input type="text" name="phone" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Phone"
                                                                    required
                                                                    value="{{ old('phone') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />                                                                                                                                

                                                                    @error('phone')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>



                            <div>
                                 <input type="email" name="email" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Email"
                                                                   
                                                                    value="{{ old('email') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />                                                                                                                                

                                                                    @error('email')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>
                        </div><!-- end of dob, phone and email //-->


                        <!-- occupation, home_addr //-->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-red-900 w-[80%] md:w-[100%] py-3">
                            
                            <div>
                                 <input type="text" name="occupation" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Occupation"
                                                                    required
                                                                    value="{{ old('occupation') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />                                                                                                                                

                                                                    @error('occupation')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>

                            <div>
                                 <input type="text" name="home_addr" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Home Address"
                                                                    required
                                                                    value="{{ old('home_addr') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />                                                                                                                                

                                                                    @error('home_addr')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>

                        </div><!-- end of occupation, home_addr //-->



                        <!-- denomination, denomination_addr //-->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-red-900 w-[80%] md:w-[100%] py-3">
                            
                            <div>
                                 <input type="text" name="denomination" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Denomination"
                                                                    required
                                                                    value="{{ old('denomination') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />                                                                                                                                

                                                                    @error('denomination')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>

                            <div>
                                 <input type="text" name="denomination_addr" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Denomination Address"
                                                                    required
                                                                    value="{{ old('denomination_addr') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />                                                                                                                                

                                                                    @error('denomination_addr')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>

                        </div><!-- end of denomination, denomination_addr //-->



                        <!-- nok, nok_phone, nok_addr //-->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 border-red-900 w-[80%] md:w-[100%] py-3">
                            
                            <div>
                                 <input type="text" name="nok" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Next of Kin"
                                                                    required
                                                                    value="{{ old('nok') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />                                                                                                                                

                                                                    @error('nok')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>

                            <div>
                                 <input type="text" name="nok_phone" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Next of Kin Phone"
                                                                    required
                                                                    value="{{ old('nok_phone') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />                                                                                                                                

                                                                    @error('nok_phone')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>


                            <div>
                                 <input type="text" name="nok_addr" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Next of Kin Address"
                                                                    required
                                                                    value="{{ old('nok_addr') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />                                                                                                                                

                                                                    @error('nok_addr')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>

                        </div><!-- end of nok, nok_phone, nok_addr //-->



                        <!-- bank, account name, account number //-->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 border-red-900 w-[80%] md:w-[100%] py-3">
                            
                            <div>
                                 <select type="text" name="bank" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Bank"
                                                                    required
                                                                    value="{{ old('bank') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    >
                                                                    <option value="" disabled selected>Select Bank</option>
                                                                    @foreach($banks as $bank)
                                                                        <option value="{{ $bank->id }}" {{ old('bank') == $bank->id ? 'selected' : '' }}>{{ $bank->name }}</option>     
                                                                    @endforeach
                                                                    </select>                                                                                                                                

                                                                    @error('bank')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>

                            <div>
                                 <input type="text" name="account_name" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Account Name"
                                                                    required
                                                                    value="{{ old('account_name') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />                                                                                                                                

                                                                    @error('account_name')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>


                            <div>
                                 <input type="text" name="account_number" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Account Number"
                                                                    required
                                                                    value="{{ old('account_number') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />                                                                                                                                

                                                                    @error('account_number')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>

                        </div><!-- end of bank, account name, account number  //-->




                        

                       
                        <div class="flex flex-col border-red-900 w-[80%] md:w-[100%] mt-4">
                            <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                           hover:bg-gray-500
                                           rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Create Member</button>
                        </div>
                        
                    </form><!-- end of new Office form //-->
                <div>
        </section>
        <!-- end of new office form //-->


    </div><!-- end of container //-->
</x-admin-layout>