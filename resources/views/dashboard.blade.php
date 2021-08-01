<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py- m-6">

        <div class="w-full m-2">
            @hasanyrole('writer|admin')
            <a href="{{ route('posts.create') }}" class="m-2 p-2 bg-green-300 rounded">Create Post</a>
            @endhasanyrole
        </div>
        
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs text-gray-800 dark:text-gray-200 uppercase tracking-wider">Id</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs text-gray-800 dark:text-gray-200 uppercase tracking-wider">Title</th> 
                        <th scope="col" class="relative px-6 py-3">Edit</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr></tr>
                    @foreach(App\Models\Post::all() as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $post->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$post->title}}</td>
                        
                        <td class="px-6 py-4 text-right text-sm">

                        <form action="{{ route('posts.delete', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('posts.show', $post->id) }}" class="m-2 p-2 bg-blue-300 rounded">Details</a>
                        
                        @hasanyrole('editor|admin')
                        <a href="{{ url('posts/'.$post->id.'/edit') }}" class="m-2 p-2 bg-yellow-300 rounded">Eidt</a>
                        @endhasanyrole

                        @role('admin')
                        <button class="m-2 p-2 bg-red-300 rounded">Delete</button>
                        @endrole

                        </form>
                        </td>
                    </tr>
                    @endforeach
                    
                    <!-- More items... -->
                    </tbody>
                </table>
                    <div class="m-2 p-2">Pagination</div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
