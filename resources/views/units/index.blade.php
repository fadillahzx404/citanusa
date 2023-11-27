<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Units') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  shadow-xl sm:rounded-lg">

                <div class="px-5 py-5">
                    <a href="{{ route('units.create') }}">
                        <x-button>Create new unit</x-button>
                    </a>
                </div>


                <div class="relative overflow-x-auto sm:rounded-lg pb-10">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                            <tr>
                                <th scope="col" class="py-3">
                                    No
                                </th>
                                <th scope="col" class="py-3">
                                    Name
                                </th>
                                <th scope="col" class="py-3">
                                    Slug
                                </th>

                                <th scope="col" class="py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $unit)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 text-center">
                                    <th scope="row"
                                        class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="py-4">
                                        {{ $unit->name }}
                                    </td>
                                    <td class="py-4">
                                        {{ $unit->slug }}
                                    </td>

                                    <td class="py-4 ">
                                        <div class="flex flex-row gap-4 justify-center">
                                            <a href="{{ route('units.edit', $unit->id) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            <form action="{{ route('units.destroy', $unit->id) }}"
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    Delete</button>
                                            </form>

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
</x-app-layout>
