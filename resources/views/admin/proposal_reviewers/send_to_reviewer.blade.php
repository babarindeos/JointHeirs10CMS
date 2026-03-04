<x-admin-layout>

    <div class="flex flex-col border-0 border-red-900 w-full">
        <section class="flex flex-row justify-between border-b border-gray-200 py-2 px-8 md:px-10 mt-6">
                <div>
                    <div class="text-2xl font-semibold ">
                        Proposal Application 
                    </div>
                    <div class='text-lg'>{{ $proposal_application->call_for_proposal->title }}</div>
                </div>

                <div>                          


                            <a href="{{ route('admin.call_for_proposals.index') }}" class="border border-green-600 text-green-600 py-2 px-6 
                                            rounded-lg text-xs md:text-sm hover:bg-green-500 hover:text-white hover:border-green-500">Call for Proposals</a>
                </div>
                
        </section>
       
        
       
    
        <section class="py-8 mt-2">
                <div>
                    <form  action="{{ route('admin.call_for_proposals.proposal_application.send_to_reviewer.store',['proposal_application' => $proposal_application->id]) }} " method="POST" enctype="multipart/form-data" class="flex flex-col mx-auto w-full md:w-[95%] items-center justify-center">
                        @csrf
    
                        
    
                        <div class="flex flex-col w-[80%] md:w-[60%] py-2 md:py-4" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                            <h2 class="font-semibold text-xl py-1" >Send Proposal to Reviewer</h2>
                            
                        </div>
    
    
                        <div class="flex flex-col w-[80%] md:w-[60%] mx-auto border-0">
                            @include('partials._session_response')
                        </div>
                        

                        <!-- Title //-->
                        <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                        
                            
                            <input disabled name="title" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Title"

                                                                    value="{{ $proposal_application->proposal_title }}"
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    />
                                                                    <span><div class='text-sm underline text-blue-700 py-1'><a href="{{ asset('storage/'.$proposal_application->proposal_file) }}">{{ $proposal_application->proposal_file }}</a></div></span>                                                                   
                                                                    
    
                                                                    @error('title')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                        </div><!-- end of Title //--> 


                         <!-- Reviewer //-->
                        <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                        
                            
                            <select type="text" name="reviewer"  class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Title"
                                                                    
                                                                   
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    >
                                   <option>-- Select Reviewer --</option>
                                   @foreach($reviewers as $reviewer)
                                        <option value="{{ $reviewer->id }}">{{ $reviewer->name }}</option>
                                   @endforeach
                            </select>  
                                                                                                                                        
    
                                                                    @error('reviewer')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                        </div><!-- end of Reviewer //--> 
    
                        
                        
    
                       
                        
                       
                                  
    
                        <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] mt-4">
                            <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                           hover:bg-gray-500
                                           rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Submit</button>
                        </div>
                        
                    </form><!-- end of new Call for Proposal form //-->
                <div>
    
            

        </section>
        <!-- End of Create Call for Proposals Section //-->


         <section class="py-2 mt-1 border-0 w-[60%] mx-auto mb-5">
                <div>
                    <div class="flex flex-col mx-auto w-full md:w-[95%] items-start justify-start">
                        <table class='w-full'>
                            <tr class='border' >
                                <td class='text-gray-800 p-4 font-semibold border' colspan='3'>
                                     Reviewers ({{ $proposal_application->reviews->count() }})
                                </td>
                            </tr>
                            <tr class='border' >
                                <td class='text-gray-800 p-4 font-semibold border' >
                                     SN 
                                </td>
                                 <td class='text-gray-800 p-4 font-semibold border' >
                                     Names
                                </td>
                                 <td class='text-gray-800 p-4 font-semibold border' >
                                     Action
                                </td>
                            </tr>
                            <tbody>
                                 @php
                                    $counter = 0;
                                 @endphp

                                 @foreach($proposal_application->reviews as $review)
                                        <tr class='border'>
                                            <td class='border-0 text-center' width='10%'> {{ ++$counter }}.</td>
                                            <td class='py-4 px-4' width='80%'>
                                                <div>{{ $review->reviewer->name }}</div>
                                            </td>
                                            <td class='border-0'>
                                                <form action='' method='post'>
                                                    @csrf
                                                    <button type='submit' class='text-xs border rounded-md py-2 px-4 border-red-500 '>Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                @endforeach

                            </tbody>
                        </table>
                        

                       
                        

                        
                    </div>
                   
                        
                    
                </div>
         </section>
    

    </div>

</x-admin-layout>