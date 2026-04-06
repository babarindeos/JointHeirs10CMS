<x-admin-layout>
    
    <div class="container mx-auto">
        <!-- page header //-->
        <section class="flex flex-col w-[90%] md:w-[95%] py-8 px-4 border-red-900 mx-auto">
            
            <div class="flex border-b border-gray-300 py-2 justify-between">
                    <div >
                        <h1 class="text-2xl font-semibold font-serif text-gray-800">Monthly Savings</h1>
                    </div>                
            </div>
            
        </section>
        <!-- end of page header //-->



        <!-- new college form //-->
        <section class='flex flex-col w-[90%] md:w-[40%] py-8 px-4 border-red-900 mx-auto border rounded-md shadow-sm'>
                <form  action="{{ route('admin.payments.preview')}} " method="POST" enctype="multipart/form-data" class="flex flex-col mx-auto w-[90%] items-center justify-center">
                        @csrf

                        

                        <div class="flex flex-col w-[80%] md:w-full py-2 md:py-1 hidden" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                            <h2 class="font-semibold text-xl py-1" >New Office</h2>
                            Provide Office name 
                        </div>


                        @include('partials._session_response')
                        
                        
                        
                        <!-- Month //-->
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-4 border-red-900 w-[80%] md:w-[100%] py-3">
                            
                            <div>
                                 <select type="text" name="month" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Bank"
                                                                    required
                                                                    value="{{ old('month') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    >
                                                                        <option value="" disabled selected>Select Bank</option>
                                                                    
                                                                        <option value="1" {{ old('month') == '1' ? 'selected' : '' }}>January</option>
                                                                        <option value="2" {{ old('month') == '2' ? 'selected' : '' }}>February</option>
                                                                        <option value="3" {{ old('month') == '3' ? 'selected' : '' }}>March</option>
                                                                        <option value="4" {{ old('month') == '4' ? 'selected' : '' }}>April</option>
                                                                        <option value="5" {{ old('month') == '5' ? 'selected' : '' }}>May</option>
                                                                        <option value="6" {{ old('month') == '6' ? 'selected' : '' }}>June</option>
                                                                        <option value="7" {{ old('month') == '7' ? 'selected' : '' }}>July</option>
                                                                        <option value="8" {{ old('month') == '8' ? 'selected' : '' }}>August</option>
                                                                        <option value="9" {{ old('month') == '9' ? 'selected' : '' }}>September</option>
                                                                        <option value="10" {{ old('month') == '10' ? 'selected' : '' }}>October</option>
                                                                        <option value="11" {{ old('month') == '11' ? 'selected' : '' }}>November</option>
                                                                        <option value="12" {{ old('month') == '12' ? 'selected' : '' }}>December</option>

                                                                    </select>                                                                                                                                

                                                                    @error('month')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>
                            <!-- end of month //-->

                            <div>
                                 <select type="text" name="year" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="Year"
                                                                    required
                                                                    value="{{ old('year') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                    
                                                                    >   
                                                                        <option value="" disabled selected>Select Year</option>
                                                                    
                                                                       @for ($i = date('Y'); $i >= 2020; $i--)
                                                                            <option value="{{ $i }}" {{ old('year') == $i ? 'selected' : '' }}>
                                                                                {{ $i }}
                                                                            </option>
                                                                        @endfor
                                 </select>                                                                                                                             

                                                                    @error('year')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>
                            <!-- end of year //-->


                            <div>
                                 <input type="file" name="file" class="border border-1 border-gray-400 bg-gray-50
                                                                    w-full p-4 rounded-md 
                                                                    focus:outline-none
                                                                    focus:border-blue-500 
                                                                    focus:ring
                                                                    focus:ring-blue-100" placeholder="File"
                                                                    required
                                                                    required
                                                                    value="{{ old('file') }}"
                                                                    
                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;" 
                                                                    accept=".csv"                                                                    
                                                                    
                                                                    />               
                                                                    <small>Card No., Dev Levy, Pension, Savings, Share, Remarks</small>                                                                                                                 

                                                                    @error('file')
                                                                        <span class="text-red-700 text-sm">
                                                                            {{$message}}
                                                                        </span>
                                                                    @enderror
                            
                            </div>

                        </div><!-- end of bank, account name, account number  //-->




                        

                       
                        <div class="flex flex-col border-red-900 w-[80%] md:w-[100%] mt-4">
                            <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                           hover:bg-gray-500
                                           rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Upload Savings</button>
                        </div>
                        
                    </form><!-- end of new Office form //-->
        </section>
        <!-- end of new Savings form //-->


         @if ($temp_payments->count())

                <!-- List of records //-->
                <div class="flex flex-col mx-auto w-[100%] md:w-[100%] mt-2 mb-8 md:px-10 items-center justify-center border rounded-md ">
                        <div class="flex flex-col border-0 border-red-800 w-[100%] md:w-[100%]  md:px-2 py-2  mb-8">
                                <div class='flex flex-row md:flex-row md:justify-between text-lg font-medium py-4 mt-2 '>
                                        <div>
                                                Savings Uploaded Records ({{ $temp_payments->count() }})
                                        </div>
                                        <div>
                                                <div class="flex flex-row space-x-2">
                                                        <div>
                                                                    <a href="#" class="border border-green-600 text-green-600 py-2 px-4 
                                                                                rounded-lg text-xs md:text-sm hover:bg-green-500 hover:text-white hover:border-green-500"> Clear </a>
                                                        </div>
                                                        <div>
                                                                    <a href="#" class="border border-green-600 text-green-600 py-2 px-4 
                                                                                rounded-lg text-xs md:text-sm hover:bg-green-500 hover:text-white hover:border-green-500"> Save </a>
                                                            
                                                        </div>

                                                </div>
                                        </div>
                                </div>
                                
                                <div class="flex flex-col overflow-x-auto">
                                        <div class="sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                                <div class="overflow-x-auto">
                                                        <table
                                                        class="min-w-full text-start text-md font-light text-surface dark:text-white">
                                                        <thead
                                                            class="border-b border-neutral-200 font-medium dark:border-white/10">
                                                            <tr>
                                                            <th scope="col" class="px-2 py-4">#</th>
                                                            <th scope="col" class="px-2 py-4 text-left border-0">Certification Body</th>
                                                            <th scope="col" class="px-2 py-4 text-left">Certification</th>                                                            
                                                            <th scope="col" class="px-2 py-4 text-left">Year</th>
                                                            <th width='20%' scope="col" class="px-4 py-4 text-center">Action</th>
                                                        

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $counter = 0;
                                                            @endphp

                                                            @foreach($professionals as $professional)
                                                            <tr class="border-b">
                                                                <td class='text-center px-2 py-8'>{{ ++$counter }}.</td>
                                                                <td class='px-2'>{{ $professional->institution }}</td>
                                                                <td class='px-2'>{{ $professional->qualification }}</td>                                                                
                                                                <td class='px-2'>{{ $professional->awarded_date }}</td>
                                                                <td class='px-4 border-0'>
                                                                        <div class='flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-1 justify-center items-center'>
                                                                            <div>
                                                                                <a href="{{ route('applicant.applications.professional.edit',['job_vacancy_uuid'=>$job_vacancy->uuid, 'professional_uuid'=>$professional->uuid]) }}" class='text-sm border 
                                                                                        border-blue-400 
                                                                                        px-4 py-1 rounded-md hover:bg-blue-50 hover:cursor-pointer'>
                                                                                        <i class="fa-solid fa-pencil text-blue-600"></i></a>
                                                                            </div>
                                                                            <div>
                                                                                <form action="{{ route('applicant.applications.professional.delete',['job_vacancy_uuid'=>$job_vacancy->uuid, 'professional_uuid'=>$professional->uuid]) }}" method="POST">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                        <button class='text-sm border 
                                                                                                border-blue-400 
                                                                                                px-4 py-1 rounded-md hover:bg-blue-50 hover:cursor-pointer'>
                                                                                                <i class="fa-solid fa-trash-can text-red-600"></i></button>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                </td>

                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                        </div>
                            
                </div>
                <!-- end of records //-->
                    
        @endif



    </div><!-- end of container //-->
</x-admin-layout>