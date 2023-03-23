@extends('adminlte::page')

@section('title', 'Supergiros')

@section('content')
<div class="card">
    <div class="card-body">

        <x-app-layout>        
            <div>
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                       
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.update-password-form')
                        </div>
        
                        <x-jet-section-border />
                    @endif
        
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.logout-other-browser-sessions-form')
                    </div>

                </div>
            </div>
        </x-app-layout>
          
    </div>
</div>

@stop

