<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Profile') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <p>-------------------------</p>
              <h2>Profile</h2>
                <div>
                    <p>ID:{{ $profile->id }}</p>
                    //画像
                    <img src="{{ asset($profile->image_path) }}" width="20%" height="20%">
                    <a href="{{ route('profile.edit', ['userId' => $profile->user_id]) }}">編集する >></a>
                    </form>
                    
                    <p>-------------------------</p>
                </div>
          </div>
      </div>
  </div>
</x-app-layout>