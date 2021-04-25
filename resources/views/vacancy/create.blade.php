@extends('layouts.app')
<form enctype="multipart/form-data" method="post" action="{{route('vacancy.store')}}">
    @csrf

    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="input-group mb-3">
                <input type="text" id="title" name="title" class="form-control" placeholder="Должность" aria-label="Title">
            </div>
            <div>
                <div class="mt-1">
                    <textarea id="text_content" name="text_content" rows="3" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Информация"></textarea>
                    @error('text_content')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="px-4 py-3 bg-white text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Опубликовать
            </button>
        </div>

    </div>
</form>
