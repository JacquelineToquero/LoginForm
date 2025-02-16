@extends('layouts.app')
 
@section('title', 'Home Product List')
 
@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">Home User List</h1>
    <a href="{{ route('admin/user/create') }}" class="text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add User</a>
    <hr />
    @if(Session::has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Password</th>
                <th scope="col" class="px-6 py-3">Type</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($users->count() > 0) {{-- Check if users exist --}}
                @foreach($users as $user) {{-- Use $user for each user --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td>
                            {{ $user->name }}  {{-- Correctly access $user's properties --}}
                        </td>
                        <td>
                            {{ $user->email }}  {{-- Correctly access $user's properties --}}
                        </td>
                        <td>
                            {{ $user->password }}  {{-- Correctly access $user's properties --}}
                        </td>
                        <td>
                            {{ $user->type }}  {{-- Correctly access $user's properties --}}
                        </td>
                        <td class="w-36">
                            <div class="h-14 pt-5">
                                <a href="{{ route('admin.users.show', $user->id) }}">Detail</a> |
                                <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a> |
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="6">No users found.</td> <!-- Changed colspan to 6 -->
                </tr>
            @endif
        </tbody>
        
    </table>
</div>
@endsection