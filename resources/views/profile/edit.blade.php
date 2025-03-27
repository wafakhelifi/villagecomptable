

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Modifier votre profil</h1>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="name">Nom complet</label>
            <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"
                   class="w-full px-3 py-2 border rounded shadow appearance-none">
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}"
                   class="w-full px-3 py-2 border rounded shadow appearance-none">
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="avatar">Photo de profil</label>
            <input type="file" name="avatar" id="avatar"
                   class="w-full px-3 py-2 border rounded shadow appearance-none">
            
            @if(Auth::user()->avatar)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.Auth::user()->avatar) }}" 
                         alt="Photo de profil" 
                         class="w-20 h-20 rounded-full object-cover">
                </div>
            @endif
        </div>
        
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Mettre à jour
        </button>
    </form>
</div>
@endsection