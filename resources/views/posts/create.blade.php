<x-layout>
    <section class="px-6 py-8 flex">
        <form action="/admin/posts" method="POST" class=" flex-initial" value="" >
            @csrf

            <div class="mb-6 max-w-sm mx-auto">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title"> Title

                </label>

                <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" value="{{ old('title') }}"  required>
            </div>

            <div class="mb-6 max-w-sm mx-auto">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug"> Slug

                </label>

                <input class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug" value="{{ old('slug') }}" required>
                @error('slug')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 max-w-sm mx-auto">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt"> Excerpt

                </label>

                <textarea class="border border-gray-400 p-2 w-full" type="text" name="excerpt" id="excerpt" required>
                    {{ old('excerpt') }}
                </textarea>
                @error('excerpt')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 max-w-sm mx-auto">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body"> Body

                </label>

                <textarea class="border border-gray-400 p-2 w-full" type="text" name="body" id="body"  required>
                    {{ old('body') }}
                </textarea>
                @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 max-w-sm mx-auto">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id"> Category

                </label>

                <select
                    class="border border-gray-400 p-2 w-full"
                    name="category_id"
                    id="category_id"
                >

                    @php
                        $categories = App\Models\Category::all();
                    @endphp

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach

                    @error('category_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </select>
            </div>


            <div >
                <button class="border border-gray-400 p-2  bg-blue-500 text-white font-bold  " type="submit"> Publish </button>
            </div>

        </form>
    </section>
</x-layout>
