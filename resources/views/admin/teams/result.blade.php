@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold text-white mb-10 text-center">Preview Tim Semifinal</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($teams as $team)
        <div class="bg-slate-800 border border-rginc-gold/30 rounded-xl p-6">
            <h3 class="text-xl font-bold text-rginc-gold mb-4 border-b border-slate-700 pb-2">{{ $team['team_name'] }}</h3>
            <ul class="space-y-2">
                @foreach($team['members'] as $member)
                <li class="text-gray-300 flex justify-between">
                    <span>{{ $member->name }}</span>
                    <span class="text-xs font-mono text-gray-500">{{ $member->scores->first()->score_value ?? 0 }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</div>
@endsection