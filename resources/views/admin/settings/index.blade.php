@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Settings</h4>

        <div class="md:flex hidden items-center gap-2.5 text-sm font-semibold">


            <div class="flex items-center gap-2">

                <a href="{{ route('dashboard') }}"
                    class="text-sm font-medium text-slate-700 dark:text-slate-400">Dashboard</a>
            </div>

            <div class="flex items-center gap-2">
                <i class="mgc_right_line text-lg flex-shrink-0 text-slate-400 rtl:rotate-180"></i>
                <a href="{{ route('settings') }}" class="text-sm font-medium text-slate-700 dark:text-slate-400"
                    aria-current="page">Settings</a>
            </div>
        </div>
    </div>
    <h2 class="bg-primary text-white p-3 text-center text-lg mb-5">Settings</h2>
    <div class="card mb-5">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <img width="100" src="{{ asset('storage/app/' . $settings->icon) }}" alt="work-thumbnail"
                    class="rounded-lg">
                <h5 class="card-title">{{ $settings->name }}</h5>
                <img width="100" src="{{ asset('storage/app/' . $settings->logo) }}" alt="work-thumbnail"
                    class="rounded-lg">

                {{-- <div class="bg-success text-xs text-white rounded-md py-1 px-1.5 font-medium" role="alert">
                    <span>Complated</span>
                </div> --}}
            </div>
        </div>
        <div class="flex justify-between items-center">
            <div class="py-3 px-6">
                <h5 class="my-2"><a class="text-slate-900 dark:text-slate-200">Site About:</a></h5>
                <p class="text-gray-500 text-sm mb-9">{{ $settings->about }}</p>
            </div>
            <div class="py-3 px-6">
                <h5 class="my-2"><a class="text-slate-900 dark:text-slate-200">Email:</a></h5>
                <p class="text-gray-500 text-sm mb-9">{{ $settings->email }}</p>
            </div>
            <div class="py-3 px-6">
                <h5 class="my-2"><a class="text-slate-900 dark:text-slate-200">Phone:</a></h5>
                <p class="text-gray-500 text-sm mb-9">{{ $settings->phone }}</p>
            </div>
            <div class="py-3 px-6">
                <h5 class="my-2"><a class="text-slate-900 dark:text-slate-200">Address:</a></h5>
                <p class="text-gray-500 text-sm mb-9">{{ $settings->address }}</p>
            </div>
        </div>
    </div>
    @isset($settings->id)
        <form class="m-5 card p-5" method="POST" action="{{ route('update-settings', $settings->id) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                <div>
                    <label for="logo" class="text-gray-800 text-sm font-medium inline-block mb-2">Site Logo</label>
                    <div class="">
                        <input onchange="LogoImage(event)" class="form-control" type="file" name="logo"
                            value="{{ $settings->logo }}">
                        <img id="logoPreview" src="#" alt="Preview"
                            style="display:none; max-width: 100%; max-height: 100px;">
                    </div>
                </div>
                <div>
                    <label for="icon" class="text-gray-800 text-sm font-medium inline-block mb-2">Site Icon</label>
                    <div class="">
                        <input onchange="IconImage(event)" class="form-control" type="file" name="icon"
                            value="{{ $settings->icon }}">
                        <img id="iconPreview" src="#" alt="Preview"
                            style="display:none; max-width: 100%; max-height: 100px;">
                    </div>
                </div>
                <div>
                    <label for="inputAddress2" class="text-gray-800 text-sm font-medium inline-block mb-2">Site Name</label>
                    <input type="text" name="name" value="{{ $settings->name }}" class="form-input" id="inputAddress2"
                        placeholder="Enter name">
                </div>
                <div>
                    <label for="inputAddress2" class="text-gray-800 text-sm font-medium inline-block mb-2">Site About</label>
                    <input type="text" name="about" value="{{ $settings->about }}" class="form-input" id="inputAddress2"
                        placeholder="Enter about">
                </div>
                <div class="lg:col-span-2">
                    <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Site Address</label>
                    <input type="text" value="{{ $settings->address }}" class="form-input" name="address" id="inputAddress"
                        placeholder="1234 Main St">
                </div>



                <div>
                    <label for="email" class="text-gray-800 text-sm font-medium inline-block mb-2">Email</label>
                    <input type="email" value="{{ $settings->email }}" name="email" class="form-input" id="email">
                </div>

                <div>
                    <label for="phone" class="text-gray-800 text-sm font-medium inline-block mb-2">Phone</label>
                    <input type="text" class="form-input" value="{{ $settings->phone }}" id="phone" name="phone">
                </div>

                <div class="lg:col-span-2">
                    <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Meta Keywords<span
                            class="text-red-500 text-xs ml-2"> (Please Write With Coma [Example:
                            keywords1,keywords2,keywords3])</span></label>
                    <textarea id="meta_keywords" name="meta_keywords" class="form-input" rows="3">{{ $settings->meta_keywords }}</textarea>
                </div>

            </div>

            <div class="lg:col-span-2 mt-2">
                <label for="meta_description" class="mb-2 block">Meta Description
                </label>
                <textarea id="meta_description" name="meta_description" class="form-input" rows="3">{{ $settings->meta_description }}</textarea>
            </div>

            <button type="submit" class="btn bg-primary text-white mt-5">Save</button>
        </form>
    @endisset
@endsection
