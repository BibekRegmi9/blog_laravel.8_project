<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto bg-gray-100 border border-gray-200 p-8 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form method="POST" action="/register" class="mt-10">
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name"> Name

                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" required>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username"> Username

                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="username" id="username" required>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password"> Password

                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required>
                </div>

                <div class="mb-6">

                    <button class="border border-gray-400 p-2 w-full bg-blue-500 text-white font-bold" type="submit"> Submit </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
