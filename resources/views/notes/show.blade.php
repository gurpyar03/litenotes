<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  ">
            <div>
                @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                  </div>
                    
                @endif
            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <div class="flex justify-content-between">
                <div class="flex">
                    <p class="opacity-70"><strong>Created at:</strong>{{$note->created_at->diffforhumans()}}</p>
                    <p class="opacity-70 ml-2"><strong>Updated at:</strong>{{$note->updated_at->diffforhumans()}}</p>
                </div>
                <div class="d-flex">
                    <a href="{{route('notes.edit',$note)}}" class="btn  btn-primary ml-auto">Edit Note</a>
                    <form action="{{route('notes.destroy',$note)}}" method="post">
                        @method('delete')
                        @csrf
                        <button style="background:red !important"type="submit" class=" ml-2 btn btn-danger" onclick="return confirm('Are you sure to delete this note?')">Delete Note</button>
                    </form>
                    
                </div>
                
            </div>
             
            
            <h1>{{$note->title}}</h1>
            <p class="mt-3">{{$note->text}}</p>
           
            </div>
           
        </div>
    </div>
</x-app-layout>
