<div>

    <h1 class="font-2xl">Products</h1>
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
                    
                    <div class="flex flex-col">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-gray-800">
                                            <tr>
                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    Product
                                                </th>
                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    Description
                                                </th>
                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    Price
                                                </th>
                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    Category
                                                </th>
                                                <th scope="col" class="relative py-3.5 px-4">
                                                    <span class="sr-only">Actions</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                          @foreach ($products as $product)
                                            <tr>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    <div class="flex items-center gap-x-2">
                                                        <img class="object-cover w-8 h-8 rounded-full" src="{{ $product->image }}" alt="">
                                                        <div>
                                                            <h2 class="text-sm font-medium text-gray-800 dark:text-white ">{{ $product->name }}</h2>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $product->description }}</td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $product->price }}</td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $product->category->name }}</td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <div class="flex items-center gap-x-6">
                                                      {{-- the action or method updateProduct will create or update a product --}}

                                                      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                                          wire:click.prevent = "updateProduct({{ $product }})"
                                                      >
                                                          Edit
                                                      </button>

                                                      {{-- the action or method deleteProduct will delete a product --}}

                                                      <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                                          wire:click = "deleteProduct({{$product}})"
                                                          wire:confirm="Are you sure you want to delete this Category?"
                                                      >
                                                          Delete
                                                      </button>
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

                    <div class="flex items-center justify-between mt-6">
                        <a href="#" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                            </svg>
                            <span>
                                previous
                            </span>
                        </a>

                        <div class="items-center hidden md:flex gap-x-3">
                            <a href="#" class="px-2 py-1 text-sm text-blue-500 rounded-md dark:bg-gray-800 bg-blue-100/60">1</a>
                            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">2</a>
                            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">3</a>
                            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">...</a>
                            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">12</a>
                            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">13</a>
                            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">14</a>
                        </div>

                        <a href="#" class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                            <span>
                                Next
                            </span>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- modal property will display the modal.  -->
    @if($modal)

        {{-- The modal helps us to create and modify the Products --}}
        <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
            <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
                <div class="w-full"> 
                    <div class="m-8 my-20 max-w-[400px] mx-auto">
                        <div class="mb-8">
                            <h1 class="mb-4 text-3xl font-extrabold">@if($isUpdateProduct) Update Product @else Create New Product @endif</h1>
                            <form>
                                <div class="mb-4">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                                    
                                    {{-- wire:model = The input field named 'name' is bound to the 'name' property in the Product component located at app\Livewire\Products.  --}}
                                    <input wire:model = "name" type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:focus:border-blue-500" placeholder="Write the name" required />
                                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>

                                    {{-- wire:model = The input field named 'description' is bound to the 'description' property in the Product component located at app\Livewire\Products.  --}}
                                    <input wire:model = "description" type="text" id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:focus:border-blue-500" placeholder="Write the description of the product" required/>
                                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-4">                                  
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product</label>
                                    {{-- wire:model = The Select field named 'category_id' is bound to the 'category_id' property in the Product component located at app\Livewire\Products.  --}}
                                    <select wire:model="category_id" class="w-full p-2 border rounded">
                                        <option value="">Select a category</option>
                                      @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                      @endforeach
                                    </select>
                                    @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>

                                    {{-- wire:model = The input field named 'price' is bound to the 'price' property in the Product component located at app\Livewire\Products.  --}}
                                    <input wire:model = "price" type="number" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:focus:border-blue-500" required/>
                                    @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">URL Image</label>

                                    {{-- wire:model = The input field named 'image' is bound to the 'image' property in the Product component located at app\Livewire\Products.  --}}
                                    <input wire:model = "image" type="text" id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:focus:border-blue-500" placeholder="Enter the product image URL" required/>
                                    @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </form>
                        </div>
                        <div class="flex w-full">       
                            {{-- wire:click = The createOrUpdateProduct method is responsible for creating a new product or updating an existing one--}}

                            <button class="p-3 mr-1 w-50 flex-1 bg-black rounded-full text-white font-semibold"
                                wire:click.prevent ='createOrUpdateProduct'
                            >
                                @if($isUpdateProduct) Update Product @else Create Product @endif
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

{{-- https://m.media-amazon.com/images/I/61DOVeXWUiL._AC_UL320_.jpg --}}