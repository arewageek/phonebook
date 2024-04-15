<x-app-layout>
    <div class="w-full lg:ml-10">
        <div class="bg-white w-full lg:w-2/5 p-4 rounded-2xl shadow-md">

            <div class="my-4">
                @if(session('success'))
    
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
                @endif
    
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
                @endif
            </div>
            <form action="/contact/{{$contact['id']}}/edit" method="post">
                @csrf
                <div class="flex space-x-3 items-center px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                    <h3 class="font-bold text-xs uppercase">Edit Contact</h3>
                </div>

                <div class="mt-5 px-4">
                    <div class="flex space-x-2">
                        {{-- contact first name --}}    
                        <div class="py-2 flex flex-col space-y-2 w-full">
                            <label class="text-sm font-semibold">First Name</label>
                            <input type="text" id="fname" value="{{$contact['fname']}}" name="fname" placeholder="Contact's Name" class="w-full text-xs py-3 rounded-lg">
                        </div>
                    
                        {{-- contact last name --}}
                        <div class="py-2 flex flex-col space-y-2 w-full">
                            <label class="text-sm font-semibold">Last Name</label>
                            <input type="text" id="lname" value="{{$contact['lname']}}" name="lname" placeholder="Contact's Name" class="w-full text-xs py-3 rounded-lg">
                        </div>
                    </div>
        
                    {{-- contact email --}}
                    <div class="py-2 flex flex-col space-y-2">
                        <label class="text-sm font-semibold">Email Address</label>
                        <input type="email" id="email" value="{{$contact['email']}}" name="email" placeholder="Email Address" class="w-full text-xs py-3 rounded-lg">
                    </div>


                    {{-- contact phone number --}}
                    <div class="py-2 flex flex-col space-y-2">
                        <label class="text-sm font-semibold">Phone Number</label>
                        <input type="tel" id="tel" value="{{$contact['tel']}}" name="tel" placeholder="Phone Number" class="w-full text-xs py-3 rounded-lg">
                    </div>

                    <div class="py-2 flex flex-col space-y-2">
                        <button class="bg-blue-600 w-fit px-4 py-2.5 rounded-lg text-white text-sm font-bold hover:bg-blue-950 transition">
                            Edit Contact
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
