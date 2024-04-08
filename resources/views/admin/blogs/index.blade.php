@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Blogs</h4>

        <div class="md:flex hidden items-center gap-2.5 text-sm font-semibold">


            <div class="flex items-center gap-2">

                <a href="{{ route('dashboard') }}"
                    class="text-sm font-medium text-slate-700 dark:text-slate-400">Dashboard</a>
            </div>

            <div class="flex items-center gap-2">
                <i class="mgc_right_line text-lg flex-shrink-0 text-slate-400 rtl:rotate-180"></i>
                <a href="{{ route('blogs') }}" class="text-sm font-medium text-slate-700 dark:text-slate-400"
                    aria-current="page">Blogs</a>
            </div>
        </div>
    </div>


    <div class="mt-6">
        <div class="card">
            <div class="flex flex-wrap justify-between items-center gap-2 p-6 ">



                <div class="flex flex-wrap gap-4 ">
                    <a href="javascript:void(0);"
                        class="btn bg-success/20 text-sm font-medium text-success hover:text-white hover:bg-success"
                        data-fc-type="modal"><i class="mgc_add_circle_line me-3"></i> Create
                        Blog</a>




                    <div
                        class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 fc-modal hidden overflow-auto bg-white ">
                        <div
                            class="fc-modal-open:opacity-100 duration-500 h-screen w-screen opacity-0 ease-out transition-all flex flex-col bg-white p-8 dark:bg-slate-800 dark:border-gray-700">
                            <div class="flex justify-between items-center">
                                <h3 class="font-medium text-gray-800 dark:text-white text-2xl">
                                    Create Blog
                                </h3>
                                <button
                                    class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                                    data-fc-dismiss="" type="button">
                                    <span class="material-symbols-rounded">close</span>
                                </button>
                            </div>
                            <form id="createblog" action="{{ route('create-blog') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf <main class="flex-grow p-6 ">



                                    <div class="grid lg:grid-cols-4 gap-6">
                                        <div class="col-span-1 flex flex-col gap-6">
                                            <div class="card p-6">
                                                <div class="flex justify-between items-center mb-4">
                                                    <h4 class="card-title">Add Blog Thumbline</h4>

                                                    <div
                                                        class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">

                                                        <i class="mgc_add_line"></i>
                                                    </div>
                                                </div>



                                                <div class="">
                                                    <input onchange="BlogImage(event)" class="form-control" type="file"
                                                        name="blog_image" value="{{ old('blog_image') }}">
                                                    <img id="blog_imagePreview" src="#" alt="Preview"
                                                        style="display:none; max-width: 100%; max-height: 100px;">
                                                </div>
                                            </div>

                                            <div class="card p-6">
                                                <div class="flex justify-between items-center mb-4">
                                                    <p class="card-title">Blog Category</p>
                                                    <div
                                                        class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                                                        <i class="mgc_compass_line"></i>
                                                    </div>
                                                </div>

                                                <div class="flex flex-col gap-3">
                                                    <div class="">
                                                        <label for="category_id" class="mb-2 block">Catagory</label>
                                                        <select name="category_id" id="category_id" class="form-select">
                                                            @isset($categories)
                                                                @foreach ($categories as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endisset



                                                        </select>
                                                    </div>


                                                </div>



                                            </div>


                                            <div class="card p-6">
                                                <label for="meta_keywords" class="mb-2 block">Meta Keywords
                                                    <span class="text-red-500 text-xs">Please Write With Coma [Example:
                                                        keywords1,keywords2,keywords3]</span></label>
                                                <textarea id="meta_keywords" name="meta_keywords" class="form-input" rows="3">
                                                  
                                                </textarea>
                                            </div>

                                            <div class="card p-6">
                                                <label for="meta_description" class="mb-2 block">Meta Description
                                                </label>
                                                <textarea id="meta_description" name="meta_description" class="form-input" rows="3">
                                                 
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="lg:col-span-3 space-y-6">
                                            <div class="card p-6">


                                                <div class="flex flex-col gap-3">
                                                    <div class="">
                                                        <label for="title" class="mb-2 block">Blog Title <span
                                                                class="text-red-500">*</span></label>
                                                        <input type="text" id="title" value="{{ old('title') }}"
                                                            name="title" class="form-input" placeholder="Enter Title"
                                                            aria-describedby="input-helper-text">
                                                    </div>
                                                    <div class="">
                                                        <label for="slug" class="mb-2 block">Blog Slug <span
                                                                class="text-red-500">*</span></label>
                                                        <input type="text" value="{{ old('slug') }}" id="slug"
                                                            name="slug" class="form-input" placeholder="Enter Slug"
                                                            aria-describedby="input-helper-text">
                                                    </div>
                                                    <div class="">
                                                        <label for="summary" class="mb-2 block">Blog Summary
                                                            <span class="text-red-500">*</span></label>
                                                        <textarea id="summary" name="summary" class="form-input" rows="3">
                                                           {{ old('summary') }}
                                                        </textarea>
                                                    </div>
                                                    <div class="">
                                                        <label for="content" class="mb-2 block">Blog Description
                                                            <span class="text-red-500">*</span></label>
                                                        <div id="editor" style="height: 300px;">
                                                            {!! old('content') !!}
                                                        </div>
                                                        <input type="hidden" name="content" id="content">
                                                    </div>


                                                    {{-- <div class="">
                                                    <label for="product-status" class="mb-2 block">Status <span
                                                            class="text-red-500">*</span></label>
                                                    <div class="flex gap-x-6">


                                                        <div class="flex">
                                                            <input type="radio" name="radio-group" class="form-radio"
                                                                id="private">
                                                            <label for="private"
                                                                class="text-sm text-gray-500 ms-2 dark:text-gray-400">Private</label>
                                                        </div>

                                                    </div>
                                                </div> --}}

                                                    {{-- <div class="grid md:grid-cols-2 gap-3">
                                                    <div class="">
                                                        <label for="start-date" class="mb-2 block">Start Date</label>
                                                        <input type="date" id="start-date" class="form-input">
                                                    </div>

                                                    <div class="">
                                                        <label for="due-date" class="mb-2 block">Due Date</label>
                                                        <input type="date" id="due-date" class="form-input">
                                                    </div>
                                                </div> --}}


                                                </div>
                                            </div>
                                        </div>

                                        <div class="lg:col-span-4 mt-5">
                                            <div class="flex justify-end gap-3">
                                                <button
                                                    class="btn dark:text-gray-200 border border-slate-200 dark:border-slate-700 hover:bg-slate-100 hover:dark:bg-slate-700 transition-all"
                                                    data-fc-dismiss="" type="button">
                                                    Cancle
                                                </button>
                                                <button type="submit"
                                                    class="inline-flex items-center rounded-md border border-transparent bg-green-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </main>
                            </form>


                        </div>
                    </div>
                </div>




            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full divide-y divide-gray-300 dark:divide-gray-700">
                    <thead
                        class="bg-slate-300 bg-opacity-20 border-t dark:bg-slate-800 divide-gray-300 dark:border-gray-700">
                        <tr>

                            <th scope="col"
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">
                                Image</th>
                            <th scope="col"
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">Title
                            </th>
                            <th scope="col"
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">
                                Summary
                            </th>
                            <th scope="col"
                                class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 dark:text-gray-200">
                                Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700 ">
                        @isset($blogs)
                            @foreach ($blogs as $item)
                                <tr>

                                    <td class="whitespace-nowrap px-3 py-4 pe-3 text-sm">
                                        <img width="50" src="{{ asset('storage/app/' . $item->blog_image) }}"
                                            alt="">
                                    </td>
                                    <td
                                        class="whitespace-nowrap py-4 pe-3 text-sm font-medium text-gray-900 dark:text-gray-200">
                                        {{ Str::limit($item->title, 30, $end = '...') }}
                                    </td>
                                    <td
                                        class="whitespace-nowrap py-4 pe-3 text-sm font-medium text-gray-900 dark:text-gray-200">
                                        {{ Str::limit($item->summary, 30, $end = '...') }}
                                    </td>

                                    <td class="whitespace-nowrap py-4 px-3  flex justify-center text-sm font-medium">

                                        <a href="{{ route('update-blog-view', $item->id) }}"><i
                                                class="mgc_edit_fill text-2xl text-primary pe-2"></i></a>


                                        {{-- <button data-fc-target="default-modal" data-fc-type="modal" type="button">
                                        <i class="mgc_delete_2_fill text-xl text-danger"></i>
                                    </button> --}}


                                        <button data-fc-type="modal">
                                            <i class="mgc_delete_fill text-2xl text-danger"></i>
                                        </button>

                                        <div
                                            class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 fc-modal hidden">
                                            <div
                                                class="mt-5 fc-modal-open:scale-100 duration-300 scale-90 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto  bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
                                                <div
                                                    class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">

                                                    <button
                                                        class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                                                        data-fc-dismiss="" type="button">
                                                        <span class="material-symbols-rounded">close</span>
                                                    </button>
                                                </div>
                                                <div class="px-4 py-8 overflow-y-auto text-center">
                                                    <h3 class="font-medium text-danger text-lg">
                                                        Are You Sure Detele

                                                    </h3>
                                                    <i class="mgc_delete_2_fill text-7xl text-danger"></i>
                                                </div>
                                                <div class="flex justify-end items-center gap-4 p-4 ">
                                                    <button
                                                        class="py-2 px-5 inline-flex justify-center items-center gap-2 rounded dark:text-gray-200 border dark:border-slate-700 font-medium hover:bg-slate-100 hover:dark:bg-slate-700 transition-all"
                                                        data-fc-dismiss type="button">Close
                                                    </button>
                                                    <a href="{{ route('delete-blog', $item->id) }}" type="submit"
                                                        class="btn bg-primary text-white ">Submit</a>
                                                </div>

                                            </div>
                                        </div>



                                    </td>
                                </tr>
                            @endforeach
                        @endisset




                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
