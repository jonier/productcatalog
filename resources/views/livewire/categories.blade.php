<div>

    <h1 class="font-2xl">Categories</h1>
    <section class="bg-white py-8">
        <div class="container">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4">
                    <div class="max-w-full overflow-x-auto">
                    <div class="mb-5">

                        {{-- wire:click = The openModal method is responsible for opening the popup--}}
                        <button class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            wire:click='openModal'
                        >
                            New
                        </button>
                    </div>
                    
                    {{-- This table will be display the categories which have been created --}}

                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-blue-800 text-center">
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                    Name
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                    Description
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-l border-transparent">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                                        {{ $category->name }}
                                    </td>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2 bg-white border-b border-[#E8E8E8]">
                                        {{ $category->description }}
                                    </td>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2 bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                                        
                                        {{-- the action or method updateCategory will create or update a category --}}

                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                            wire:click.prevent = "updateCategory({{ $category }})"
                                        >
                                            Edit
                                        </button>

                                        {{-- the action or method deleteCategory will delete a category --}}

                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                            wire:click = "deleteCategory({{$category}})"
                                            wire:confirm="Are you sure you want to delete this Category?"
                                        >
                                            Delete
                                        </button>
                                    </td>                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </section>

    <!-- modal property will display the modal.  -->
    @if($modal)

        {{-- The modal helps us to create and modify the Categories --}}
        <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
            <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
                <div class="w-full"> 
                    <div class="m-8 my-20 max-w-[400px] mx-auto">
                        <div class="mb-8">
                            <h1 class="mb-4 text-3xl font-extrabold">@if($isUpdateCategory) Update Category @else Create New Category @endif</h1>
                            <form>
                                <div class="mb-4">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                                    
                                    {{-- wire:model = The input field named 'name' is bound to the 'name' property in the Category component located at app\Livewire\Categories.  --}}
                                    <input wire:model = "name" type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:focus:border-blue-500" placeholder="Write the name" required />
                                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>

                                    {{-- wire:model = The input field named 'description' is bound to the 'description' property in the Category component located at app\Livewire\Categories.  --}}
                                    <input wire:model = "description" type="text" id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:focus:border-blue-500" placeholder="Write the description of the category" required/>
                                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </form>
                        </div>
                        <div class="flex w-full">       

                            {{-- wire:click = The createOrUpdateCategory method is responsible for creating a new category or updating an existing one--}}

                            <button class="p-3 mr-1 w-50 flex-1 bg-black rounded-full text-white font-semibold"
                                wire:click.prevent ='createOrUpdateCategory'
                            >
                                @if($isUpdateCategory) Update Category @else Create Category @endif
                            </button>

                            {{-- wire:click = The closeModal method is responsible for closing the popup--}}
                            <button class="p-3 ml-1 w-50 flex-1 bg-white border rounded-full font-semibold"
                                wire:click.prevent = 'closeModal'
                            >
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
