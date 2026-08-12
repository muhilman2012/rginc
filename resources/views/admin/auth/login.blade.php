@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto px-4 py-20">
    <div class="bg-slate-800 border border-rginc-gold/30 rounded-2xl p-8 shadow-2xl backdrop-blur-sm">
        
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-white uppercase tracking-wider">Admin Login</h1>
            <p class="text-xs text-rginc-gold mt-1">RGinc M81 Competition Management</p>
        </div>

        @if($errors->any())
            <div class="bg-red-500/20 border border-red-500 text-red-300 p-3 rounded-lg mb-6 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Email Admin</label>
                <input type="email" name="email" value="{{ old('email') }}" required 
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:border-rginc-gold focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                <input type="password" name="password" required 
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg px-4 py-3 text-white focus:border-rginc-gold focus:outline-none">
            </div>

            <button type="submit" class="w-full bg-rginc-gold text-rginc-navy font-bold py-3 rounded-lg hover:bg-yellow-500 transition shadow-lg shadow-rginc-gold/20">
                MASUK KE PANEL ADMIN
            </button>
        </form>

    </div>
</div>
@endsection