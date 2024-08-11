<!-- resources/views/users/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Master') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto py-8">
                        <div class="flex justify-between items-center mb-4">
                            <h1 class="text-2xl font-bold">Employee Master</h1>
                            <a href="{{ route('employee.create') }}" class="btn btn-success">Add New Employee</a>
                        </div>

                        <!-- Display Flash Messages -->
                        @if (session('success'))
                            <div class="text-center alert alert-primary">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="max-w-7xl bg-white border border-gray-200 rounded-lg shadow-md" style="width:100%">
                            <thead class="bg-gray-100 border-b">
                                <tr>
                                    <th class="py-6 px-6 text-left text-gray-600">Name</th>
                                     <th class="py-6 px-6 text-left text-gray-600">Profile Photo</th>
                                    <th class="py-6 px-6 text-left text-gray-600">Email</th>
                                    <th class="py-6 px-6 text-left text-gray-600">Mobile No</th>
                                     <th class="py-6 px-6 text-left text-gray-600">State</th>
                                     <th class="py-6 px-6 text-left text-gray-600">City</th>
                                    <th class="py-6 px-6 text-left text-gray-600">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_employee_list as $row)
                                    <tr>
                                        <td class="py-6 px-6 text-left text-gray-600">{{ $row->name }}</td>
                                         <td class="py-6 px-6 text-left text-gray-600">
                                                                                    @if($row->profile_photo)
                                                                                        <img src="{{ asset('storage/app/public/profile_photos/'.$row->profile_photo) }}" alt="Profile Photo" class="w-16 h-16 object-cover rounded-full">
                                                                                    @else
                                                                                        No Photo
                                                                                    @endif
                                                                                </td>
                                        <td class="py-6 px-6 text-left text-gray-600">{{ $row->email }}</td>
                                        <td class="py-6 px-6 text-left text-gray-600">{{ $row->mobile_no }}</td>
                                         <td class="py-6 px-6 text-left text-gray-600">{{ $row->state_name  }}</td>
                                         <td class="py-6 px-6 text-left text-gray-600">{{ $row->city_name }}</td>
                                        <td class="py-6 px-6 text-left text-gray-600">
                                            <a href="{{ route('employee.edit', $row->id) }}" class="btn btn-success">Edit</a>
                                            <form action="{{ route('employee.destroy', $row->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
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
</x-app-layout>
