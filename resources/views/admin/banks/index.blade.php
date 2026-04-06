<x-admin-layout>
    
    <div class="container mx-auto">
        <!-- page header //-->
        <section class="flex flex-col w-[90%] md:w-[95%] py-8 px-4 border-red-900 mx-auto">
            
            <div class="flex border-b border-gray-300 py-2 justify-between">
                    <div >
                        <h1 class="text-2xl font-semibold font-serif text-gray-800">Banks</h1>
                    </div>  
                    <div>
                            <a href="{{ route('admin.banks.create') }}" class="border border-blue-700 text-blue-700 py-2 px-4 
                                            rounded-lg text-sm hover:bg-blue-500 hover:text-white">Create Bank</a>
                    </div>              
            </div>
            
        </section>
        <!-- end of page header //-->

</x-admin-layout>