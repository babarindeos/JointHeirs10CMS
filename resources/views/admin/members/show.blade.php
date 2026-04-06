<x-admin-layout>

    <div class=" w-full mx-auto">
        <!-- page header //-->
        <section class="flex flex-col w-[90%] md:w-[95%] py-8 px-4 mx-auto">
            
            <div class="flex border-b border-gray-300 py-2 justify-between">
                    <div >
                        <h1 class="text-2xl font-semibold font-serif text-gray-800">Member</h1>
                    </div>                
            </div>
            
        </section>
        <!-- end of page header //-->



        <!-- new college form //-->
        <section class="flex flex-col md:flex-row w-[90%] md:w-[95%] py-2 px-4 mx-auto">
                <div class='flex flex-col w-full md:w-[25%] justify-items py-1'>

                            <div class='flex justify-center'>
                                                            @if ($member->picture != null)
                                                                    
                                                                    <img class='w-36 h-36 rounded-full' src="{{ asset('storage/'.$member->picture )}}" alt="Member Picture" />
                                                            @else
                                                                    <img class='w-36 h-36 rounded-full' src="{{ asset('images/avatar_64.jpg') }}" alt="Default Avatar" />
                                                            @endif
                            </div>
                            <div class='flex mt-4 items-center justify-center text-xl font-semibold'>
                                {{ $member->surname }} {{ $member->firstname }} {{ $member->middlename }}
                                
                            </div>
                            <div class="flex items-center justify-center text-xl">
                                {{ $member->cardno }}
                            </div>
                </div>
                <div class='flex w-full md:w-[75%] border'>
                            <div class='w-full'><!-- member form //-->
                                <form  action="{{ route('admin.members.store')}} " method="POST" class="flex flex-col mx-auto w-[95%] items-center justify-center">
                                    @csrf

                                    

                                    <div class="flex flex-col w-[80%] md:w-full py-2 md:py-1 hidden" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                                        <h2 class="font-semibold text-xl py-1" >New Office</h2>
                                        Provide Office name 
                                    </div>


                                    @include('partials._session_response')
                                    
                                    
                                    <!-- Card No and Names //-->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 border-red-900 w-[80%] md:w-[100%] py-3">
                                        
                                        <div>
                                            <div name="surname" readonly class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Surname"
                                                                                
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                > {{ $member->surname }}</div>                                                                                                                                    

                                        
                                        </div>

                                        <div>
                                                <div  class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="First Name"                                                                       
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                > {{ $member->firstname }}
                                                </div> 


                                                                               
                                        
                                        </div>

                                        <div>
                                                <div name="middlename" class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Middle Name"
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                >
                                                                                {{  $member->middlename }}  
                                                </div>
                                                                                
                                        
                                        </div>
                                    </div><!-- end of card no and names //-->



                                    <!-- dob, phone and email //-->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 border-red-900 w-[80%] md:w-[100%] py-3">
                                        <div>
                                            <div class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="DOB"
                                                                               
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                >
                                                                                {{ \Carbon\Carbon::parse($member->dob)->format('l jS F, Y') }}
                                            </div>                                                                                                                                

                                                                               
                                        
                                        </div>


                                        <div>
                                            <div name="phone"  class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Phone"
                                                                                
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                >   
                                                                                {{ $member->phone }}
                                            </div>                                                                                                                             

                                                                               
                                        
                                        </div>



                                        <div>
                                            <div  class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Email"
                                                                            
                                                                               
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                >  
                                                                                {{ $member->email? $member->email : 'No email' }}
                                                                                
                                            </div>

                                                                               
                                        
                                        </div>
                                    </div><!-- end of dob, phone and email //-->


                                    <!-- occupation, home_addr //-->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-red-900 w-[80%] md:w-[100%] py-3">
                                        
                                        <div>
                                            <div name="occupation" class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Occupation"
                                                                                
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                > 
                                                                                {{ $member->occupation }}
                                            </div>                                                                                                                               

                                                                               
                                        
                                        </div>

                                        <div>
                                            <div type="text" name="home_addr" class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Home Address"                                                                               
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                >   
                                                                                {{ $member->home_addr }}
                                                                                
                                            </div>

                                                                               
                                        
                                        </div>

                                    </div><!-- end of occupation, home_addr //-->



                                    <!-- denomination, denomination_addr //-->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-red-900 w-[80%] md:w-[100%] py-3">
                                        
                                        <div>
                                            <div  class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Denomination"                                                                                
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                > 
                                                                                {{ $member->denomination }}
                                            </div>                                                                                                                               

                                                                                
                                        
                                        </div>

                                        <div>
                                            <div name="denomination_addr" class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Denomination Address"                                                                                
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                    
                                                                                
                                                                                >
                                                                                {{  $member->denomination_addr }}
                                            </div>                                                                                                                                

                                                                               
                                        
                                        </div>

                                    </div><!-- end of denomination, denomination_addr //-->



                                    <!-- nok, nok_phone, nok_addr //-->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 border-red-900 w-[80%] md:w-[100%] py-3">
                                        
                                        <div>
                                            <div name="nok" class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Next of Kin"
                                                                               
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                >
                                                                                {{ $member->nok }}
                                            </div>                                                                                                                                

                                                                               
                                        
                                        </div>

                                        <div>
                                            <div  class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Next of Kin Phone"
                                                                               
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                >  
                                                                            {{ $member->nok_phone }}
                                            </div>                                                                                                                              

                                                                              
                                        
                                        </div>


                                        <div>
                                            <div  class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Next of Kin Address"                                                                               
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                >   
                                                                    {{ $member->nok_addr }}
                                                                                
                                            </div>

                                                                             
                                        
                                        </div>

                                    </div><!-- end of nok, nok_phone, nok_addr //-->



                                    <!-- bank, account name, account number //-->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 border-red-900 w-[80%] md:w-[100%] py-3">
                                        
                                        <div>
                                            <div class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Bank"
                                                                                required
                                                                                value=""
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                >
                                                                                {{ $member->bank->name }}


                                            </div>                                                               
                                        
                                        </div>

                                        <div>
                                            <div  class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Account Name"
                                                                                
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                >
                                                                                {{ $member->account_name }}
                                                                                
                                            </div>                                                                              
                                        
                                        </div>


                                        <div>
                                            <div class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Account Number"
                                                                                required
                                                                                value=""
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                >
                                                                                {{ $member->account_number }}
                                                                                
                                            </div>                                                                              
                                        
                                        </div>

                                    </div><!-- end of bank, account name, account number  //-->




                                    

                                
                                   
                                    
                                </form><!-- end of new Office form //-->
                            <div><!-- end of member div //-->
                </div>

                
        </section>
    </div>


</x-admin-layout>