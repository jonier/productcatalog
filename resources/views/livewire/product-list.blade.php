<div x-data="{ selectedCategory: null }">
    <h1 class="uppercase">Product List</h1>
    <div>
        <label for="categoryFilter">Filter by Category:</label>
        <select x-model="selectedCategory" class="mb-4 border rounded">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    
    <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @forelse ($products as $product)
            <template x-if="!selectedCategory || selectedCategory == {{ $product->category_id }}">
                <li class="bg-white dark:bg-gray-800 rounded-lg px-6 py-8 ring shadow-xl ring-gray-900/5">
                    <div>
                        @if($product->image)
                            <img class="mx-auto block w-full h-auto" src="{{ $product->image }}" alt="{{ $product->title }}">
                        @else
                            <div class="mx-auto block h-24 rounded-full sm:mx-0 sm:shrink-0"></div>
                        @endif
                        <div class="flex flex-col justify-between mt-4 h-[170px]">
                            <div class="flex flex-col items-center">
                                <strong class="uppercase">{{ $product->title }}</strong>
                                <div class="mt-4 line-clamp-3">{{ $product->description }}</div>
                            </div>
                            <div>${{ $product->price }}</div>
                        </div>
                    </div>
                </li>
            </template>
        @empty
            <p>No products available.</p>
        @endforelse
    </ul>
</div>