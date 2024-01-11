<x-layout>

    <x-setting :heading="'Edit Post: ' . $post->title">
        <form action="/admin/posts" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="mb-6 max-w-sm mx-auto">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700 " for="title"> Title

                </label>

                <input placeholder="title" class="border border-gray-400 p-2 w-full" type="text" name="title" id="title"
                       value= "{{$post->title}}" required>
            </div>

            <div class="mb-6 max-w-sm mx-auto">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug"> Slug

                </label>

                <input placeholder="slug" class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug" value="{{ $post->slug }}" required>
                @error('slug')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>



            <div class="mb-6 max-w-sm mx-auto">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail"> Thumbnail

                </label>

                <input placeholder="slug" class="border border-gray-400 p-2 w-full" type="file" name="thumbnail" id="thumbnail"  >
                @error('slug')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6 max-w-sm mx-auto">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt"> Excerpt

                </label>

                <textarea  class="border border-gray-400 p-2 w-full" type="text" name="excerpt" id="excerpt"  required>
                    {{ $post->excerpt }}
                </textarea>
                @error('excerpt')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 max-w-sm mx-auto">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body"> Body

                </label>

                <textarea class="border border-gray-400 p-2 w-full" type="text" name="body" id="body"  required>
                    {{ $post->body }}
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
                    value="{{ $post->category_id }}"
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
                <button class="border border-gray-400 p-2 mt-6  bg-blue-500 text-white font-bold float-right " type="submit"> Publish </button>
            </div>

        </form>

    </x-setting>


</x-layout>
