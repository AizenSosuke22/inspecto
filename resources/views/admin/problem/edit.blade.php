@extends('layouts.admin')
@section('title')
    Problème
@endsection

@section('sidebar')
    <x-side-nav />
@endsection

@section('topnav')
  <x-admin-top-nav title="Problème" />
@endsection

@section('body')

<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 mx-auto flex-0 lg:w-9/12">
            <div class="relative flex flex-col flex-auto min-w-0 p-4 px-8 mt-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <h6 class="mb-0 dark:text-white">Problème</h6>
                <p class="mb-0 leading-normal text-sm">Modifier le problème</p>
                <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent">
                @if(Session::has('success'))
                    <p class="text-sm w-full px-4 py-3" style="background:#cce5ff; border-radius:6px; color:#004085; border:1px solid #b8daff;">{{ Session::get('success') }}</p>
                @endif
                @if(Session::has('error'))
                    <p class="text-sm w-full px-4 py-3" style="background:#f8d7da; border-radius:6px; color:#721c24; border:1px solid #f5c6cb;">{{ Session::get('error') }}</p>
                @endif
                @if($errors->any())
                    <div class="text-sm w-full px-4 py-3 mb-2" style="background:#f8d7da; border-radius:6px; color:#721c24; border:1px solid #f5c6cb;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('problems.update', $problem->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="name">Icon</label>
                    <input type="file" accept=".svg" id="icon" name="icon" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    <img style="width: 50px; height: 50px;" src="{{ url('images/cars/'.$problem->icon) }}" alt="">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="name">Nom</label>
                    <input type="text" id="name" value="{{ $problem->name }}" name="name" placeholder="" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    <label class="mt-4 inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="type_id">Type</label>
                    <select id="type_id" name="type_id" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                        @foreach($types as $item)
                            @if($item->id == $problem->type->id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <div class="flex justify-end mt-6">
                        <a href="{{ url('/problems') }}" class="inline-block px-6 py-3 m-0 font-bold text-center uppercase align-middle transition-all bg-gray-200 border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 text-slate-800">Annuler</a>
                        <button type="submit" class="inline-block px-6 py-3 m-0 ml-2 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection