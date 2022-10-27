<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  ">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{route('notes.store')}}" method="POST">

                    {{csrf_field()}}
                
                    <label  class="form-label">Title</label>
                    <x-text-input name="title" type="text" class="w-full"  placeholder="title"></x-text-input>
                  
                  
                    <label  class="form-label">Text</label>
                    <x-textarea name="text" class="form-control" cols="30" rows="10"></x-textarea>

                    

                    <button style="color: dodgerblue !important ;" type="submit" class="mt-3 btn btn-primary">Save Note</button>
                    
                  
                  
                </form> 
            </div>
            
           
        </div>
    </div>
</x-app-layout>
