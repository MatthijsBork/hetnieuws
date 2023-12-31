<form method="POST" action="{{ $route }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="title" class="block text-sm font-semibold text-gray-600" required>Titel</label>
        <input type="text" id="title" name="title" value="{{ $article->title ?? old('title') }}"
            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
        @error('title')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <div id="intro-toolbar"></div>

        <label for="intro" class="block text-sm font-semibold text-gray-600">Introductie</label>
        <textarea id="intro" name="intro"
            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 min-h-[20vh]">{{ $article->intro ?? old('intro') }}</textarea>
        @error('intro')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="content" class="block text-sm font-semibold text-gray-600">Content</label>
        <textarea id="content" name="content"
            class="w-full px-3 py-2 border rounded-lg min-h-[25vh] focus:outline-none focus:ring focus:border-blue-300">{{ $article->content ?? old('content') }}</textarea>
        @error('content')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="publication_date" class="block text-sm font-semibold text-gray-600">Publiceerdatum</label>
        <input type="date" id="publication_date" name="publication_date"
            value="{{ isset($article) ? date('Y-m-d', strtotime($article->publication_date)) : old('publication_date') }}"
            class="px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-400 focus:border-blue-400">
        @error('publication_date')
            {{ isset($article) ? date('Y-m-d', strtotime($article->publication_date)) : old('publication_date') }}
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="category" class="block text-sm font-semibold text-gray-600">Categorie</label>
        <select name="category_id" id="category_id"
            class="px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-400 focus:border-blue-400">
            <option disabled selected>Kies een categorie</option>
            @foreach ($categories as $category)
                @if (($article->category_id ?? null) == $category->id || old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
        </select>
        @error('category_id')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    @if (isset($article->image_name))
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-600">Huidige Afbeelding</label>
            <img src="{{ asset('images/articles/' . $article->id . '/' . $article->image_name) }}"
                alt="Huidige Afbeelding" class="max-w-md p-1 border-gray-400 rounded-lg">
        </div>
        <div class="mb-4">
            <label for="delete_image" class="block text-sm font-semibold text-gray-600">Verwijder Afbeelding</label>
            <input type="checkbox" id="delete_image" name="delete_image" value="1">
        </div>
    @endif
    <div class="mb-4">
        <label for="image" class="block text-sm font-semibold text-gray-600">Foto</label>
        <input type="file" id="image" name="image" value="1"
            class="px-1 py-1 rounded-lg focus:outline-none focus:ring focus:ring-blue-400 focus:border-blue-400">
        @error('image')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="text-right">
        <button
            class="px-4 py-2 text-red-700 bg-transparent border border-red-500 rounded-lg hover:bg-red-500 hover:text-white hover:border-transparent">
            Annuleren
        </button>
        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Opslaan</button>
    </div>
</form>
