<x-app-layout>
    <div class="w-full bg-white shadow-md rounded-lg p-10">

        <div class="py-3">
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
        
        <table class="w-full overflow-x-auto text-xs border-2 border-collapse border-gray-300 text-left">
            <thead>
                <tr>
                    <th class="border-2 border-gray-300">S/N</th>
                    <th class="border-2 border-gray-300">First Name</th>
                    <th class="border-2 border-gray-300">Last Name</th>
                    <th class="border-2 border-gray-300">Email</th>
                    <th class="border-2 border-gray-300">Phone Number</th>
                    <th class="border-2 border-gray-300">Date</th>
                    <th class="border-2 border-gray-300">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 0; ?>
                @foreach ($contacts as $contact)
                    <?php $index ++; ?>

                    <script>
                        function confirmDelete (){
                            const delete = confirm('Are you sure you want to delete this contact?')
                            if(!delete) return false;
                        }
                    </script>
                    
                    <tr>
                        <td class="border-2 border-gray-300">{{ $index }}</td>
                        <td class="border-2 border-gray-300">{{ $contact['fname'] }}</td>
                        <td class="border-2 border-gray-300">{{ $contact['lname'] }}</td>
                        <td class="border-2 border-gray-300">{{ $contact['email'] }}</td>
                        <td class="border-2 border-gray-300">{{ $contact['tel'] }}</td>
                        <td class="border-2 border-gray-300">{{ $contact['created_at'] }}</td>

                        <td class="border-2 border-gray-300">
                            <div class="py-2 px-2 flex space-x-2">

                                <div class="hidden w-screen h-screen backdrop-blur-sm left-0 top-0 bg-black/5 p-10 flex justify-center items-center">
                                    <div class="bg-white rounded-lg w-full lg:w-1/2 shadow">
                                        <div class="py-2 bg-gray-100 px-5 font-bold flex items-center justify-between">
                                            <div>
                                                Edit User Profile
                                            </div>
                                            <div class="text-red-700 cursor-pointer">
                                                [close]
                                            </div>
                                        </div>
                                        <div class="px-5 py-10">
                                            <form action="">
                                                <div class="">

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <button class="text-[8pt] rounded px-2 py-1.5 text-orange-100 bg-orange-700">Edit</button>
                                <form action="/contact/delete/{{ $contact['id'] }}" method="post">
                                    @csrf
                                    <button type="submit" class="text-[8pt] rounded px-2 py-1.5 text-red-100 bg-red-700" onclick="confirmDelete()">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>