<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  ">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{route('notes.update',$note)}}" method="post">
                     @method('put')
                    {{csrf_field()}}
                
                    <label  class="form-label">Title</label>
                    <x-text-input name="title" type="text" class="w-full"  placeholder="title" value="{{$note->title}}"></x-text-input>
                  
                  
                    <label  class="form-label">Text</label>
                    {{-- <x-textarea name="text" class="form-control" cols="30" rows="10" ><h1>hallo</h1> </x-textarea> --}}
                    <div class="form-floating">
                        <textarea class="form-control" name="text" placeholder="write a note here" style="height: 100px"  >{{$note->text}}</textarea>
                        
                      </div>

                    

                    <button style="background: dodgerblue !important ;" type="submit" class="mt-3 btn btn-primary">Update Note</button>
                    
                  
                  
                </form> 
            </div>
            
           
        </div>
    </div>
</x-app-layout>
