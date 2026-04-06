<x-guest-layout>
<div class="flex flex-col w-full borders h-full ">

    <div class="flex flex-col md:flex-row ">
            <!-- left  panel //-->
             <div class="flex flex-col w-full md:w-[70%] " >
                    <img src="{{ asset('images/1.webp') }}" id='img1' class="bg-gray-800" /> 
                    <img src="{{ asset('images/2.webp') }}" id='img2' class="hidden" />
                    <img src="{{ asset('images/3.webp') }}" id='img3' class="hidden" /> 
                    <img src="{{ asset('images/4.webp') }}" id='img4' class="hidden" /> 
                    <div>
                        <div class="flex flex-row items-center justify-center space-x-4 py-4">
                            <div class='py-1 px-10 bg-green-500 rounded-md' id='ind1'></div>
                            <div class='py-1 px-10 bg-gray-200 rounded-md' id='ind2'></div>
                            <div class='py-1 px-10 bg-gray-200 rounded-md' id='ind3'></div>
                            <div class='py-1 px-10 bg-gray-200 rounded-md' id='ind4'></div>

                        </div>
                    </div>
                    
                    
            </div>
            <!-- end of left panel //-->



            <!-- Right  panel //-->
            <div class="order-1 md:order-2 flex flex-col w-full md:w-[30%] items-center justify-start py-8 bg-gray-50">

                <section class="flex flex-col w-full border border-0">
                    <div class="flex flex-col w-full border border-0" >
                    <form  action="{{ route('staff.auth.login') }}" method="POST" class="flex flex-col mx-auto w-[90%] items-center justify-center space-y-2">
                            @csrf

                            <div class="flex flex-col w-[80%] md:w-[80%] py-4 mt-4 font-serif" >
                                <h2 class="font-semibold text-xl py-1" >Sign In</h2>
                                
                                
                            </div>

                            <!-- username //-->
                            <div class="w-[80%]">

                                <input type="text" name="email" class="border border-1 border-gray-400 bg-gray-50
                                                                        w-full p-4 rounded-md 
                                                                        focus:outline-none
                                                                        focus:border-blue-500 
                                                                        focus:ring
                                                                        focus:ring-blue-100" placeholder="Username"
                                                                        
                                                                        value="{{ old('email') }}"
                                                                        
                                                                        style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                        required
                                                                        />  
                                                                                                                                            

                                                                        @error('email')
                                                                            <span class="text-red-700 text-sm">
                                                                                {{$message}}
                                                                            </span>
                                                                        @enderror
                                
                            </div><!-- end of username //-->

                            <!-- password //-->
                            <div class="w-[80%]">

                                <input type="password" name="password" class="border border-1 border-gray-400 bg-gray-50
                                    w-full p-4 rounded-md 
                                    focus:outline-none
                                    focus:border-blue-500 
                                    focus:ring
                                    focus:ring-blue-100" placeholder="Password"
                                    
                                    value="{{ old('password') }}"
                                    
                                    style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                    required
                                    />  
                                                                                                        

                                    @error('password')
                                        <span class="text-red-700 text-sm">
                                            {{$message}}
                                        </span>
                                    @enderror

                            </div><!-- end of password //-->
                            <div class='text-sm underline text-right border-0 w-4/5'>
                                Forgot Password
                            </div>

                            <!-- submit //-->
                            <!-- submit button //-->
                            <div class="flex flex-col border-red-900 w-[80%] md:w-[80%] py-1 md:py-2">
                                <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                               hover:bg-gray-500
                                               rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Login</button>
                            </div>

                            <!-- end of submit //-->
                            <div class='w-[80%] py-4 hidden'>Don't have an account? <a href="{{ route('guest.auth.register') }}" class='underline'>Register</a>   </div>
                        </form>
                        
                    </div>

                    
                </section>


                
                    
            </div>
            <!-- end of right panel //-->
    </div>


</div>
</x-guest-layout>
<script>
    $(document).ready(function(){
            function functionOne() {
                $("#img1").show();
                $("#img2").hide();
                $("#img3").hide();
                $("#img4").hide();

                $("#ind1").removeClass('bg-gray-200').addClass('bg-green-500');
                $("#ind2").removeClass('bg-green-500').addClass('bg-gray-200');
                $("#ind3").removeClass('bg-green-500').addClass('bg-gray-200');
                $("#ind4").removeClass('bg-green-500').addClass('bg-gray-200');
            }

            function functionTwo() {
                $("#img1").hide();
                $("#img2").show();
                $("#img3").hide();
                $("#img4").hide();

                $("#ind1").removeClass('bg-green-500').addClass('bg-gray-200');
                $("#ind2").removeClass('bg-gray-200').addClass('bg-green-500');
                $("#ind3").removeClass('bg-green-500').addClass('bg-gray-200');
                $("#ind4").removeClass('bg-green-500').addClass('bg-gray-200');
            }


            function functionThree() {
                $("#img1").hide();
                $("#img2").hide();
                $("#img3").show();
                $("#img4").hide();

                $("#ind1").removeClass('bg-green-500').addClass('bg-gray-200');
                $("#ind2").removeClass('bg-green-500').addClass('bg-gray-200');
                $("#ind3").removeClass('bg-gray-200').addClass('bg-green-500');
                $("#ind4").removeClass('bg-green-500').addClass('bg-gray-200');
            }


            function functionFour() {
                $("#img1").hide();
                $("#img2").hide();
                $("#img3").hide();
                $("#img4").show();

                $("#ind1").removeClass('bg-green-500').addClass('bg-gray-200');
                $("#ind2").removeClass('bg-green-500').addClass('bg-gray-200');
                $("#ind3").removeClass('bg-green-500').addClass('bg-gray-200');
                $("#ind4").removeClass('bg-gray-200').addClass('bg-green-500');
            }

            let toggle = true;

            functionOne();

            let counter = 1;

            setInterval(function () {
                if (counter === 1) {
                    functionTwo();
                    counter = 2;
                } else if (counter === 2) {
                    functionThree();
                    counter = 3;
                } else if (counter === 3) {
                    functionFour();
                    counter = 4;
                }                
                else 
                {
                    functionOne();
                    counter = 1;
                }
            }, 10000); // every 10 seconds

    });


</script>
