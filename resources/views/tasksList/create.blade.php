<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                    <form method="POST" action="/task">
                        @csrf
                        <div class="form-group">
                            <textarea name="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter your task'></textarea>
                            @error('description')
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </section>
</x-layout>
