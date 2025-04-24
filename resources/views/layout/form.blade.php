@csrf
<div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label for="title" class="block text-sm/6 font-medium text-gray-900">Post Title</label>
                <div class="mt-2">
                    <div
                        class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                        <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">
                        </div>
                        <input type="text" name="title" id="title"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="" value="{{ old('title', isset($post) ? $post->title : '') }}">
                    </div>
                </div>
                @error('title')
                    <p class="text-red-800 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-full">
                <label for="about" class="block text-sm/6 font-medium text-gray-900">Post Body</label>
                <div class="mt-2">
                    <textarea id="about" rows="3"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                        name="body">{{ old('body', isset($post) ? $post->body : '') }}</textarea>
                </div>
                <p class="mt-1 text-sm/6 text-gray-600">Write your post sentences.</p>
                @error('body')
                    <p class="text-red-800 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-full">
                <fieldset>
                    <legend class="text-sm/6 font-semibold text-gray-900">Choose Enabled</legend>

                    <div class="mt-3 space-y-2">
                        <div class="flex items-center gap-x-3">
                            <input id="enabled" name="enabled" type="radio" value="1"
                                {{ old('enabled', isset($post) ? $post->enabled : '') == 1 ? 'checked' : '' }}
                                class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden">
                            <label for="enabled" class="block text-sm/6 font-medium text-gray-900">enabled</label>
                        </div>
                        <div class="flex items-center gap-x-3">
                            <input id="disabled" name="enabled" type="radio" value="0"
                                class="relative size-4 appearance-none rounded-full border border-gray-300 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white not-checked:before:hidden checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden">
                            <label for="disabled" class="block text-sm/6 font-medium text-gray-900">disabled</label>
                        </div>
                        @error('enabled')
                            <p class="text-red-800 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </fieldset>
            </div>
            <div class="col-span-full">

                <select name="user_id" id="userId"
                    class="px-3 py-2 border border-[#ccc] rounded-md bg-blue-100 text-[1rem] focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 ">
                    <option selected disabled>Select Author</option>
                    @foreach ($users as $user)
                        <option {{ isset($post) && $user->id == $post->user_id ? 'selected' : '' }}
                            class="rounded-md cursor-pointer" value="{{ $user->id }}">{{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- @error()
            @enderror --}}
        </div>
    </div>
</div>

<div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" onclick="history.back()" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
    <button type="submit"
        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ isset($post) ? 'Edit' : 'Create' }}</button>
</div>
