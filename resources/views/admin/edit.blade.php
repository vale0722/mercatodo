<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('buttons.edit').' '.__($user->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="name" :value="__(trans('auth.name'))" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="email" :value="__(trans('auth.email'))" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />
                        </div>
                        <div class="mt-4">
                            <x-label for="role" :value="__(trans('auth.role'))" />
                            <select name="role" id="role" class="block mt-1 w-full" required>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>{{ trans('auth.admin') }}</option>
                                <option value="buyer" {{ $user->role == 'buyer' ? 'selected' : '' }}>{{ trans('auth.buyer') }}</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-label for="disable_at" :value="__(trans('auth.status'))" />
                            <select name="disable_at" id="disable_at" class="block mt-1 w-full" required>
                                <option @if(!$user->disable_at) selected @endif value="0" >{{ trans('auth.enabled') }}</option>
                                <option @if($user->disable_at) selected @endif value="1" >{{ trans('auth.disabled') }}</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __(trans('buttons.save')) }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
