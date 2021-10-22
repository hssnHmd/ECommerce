<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('categorie') }}
        </h2>
    </x-slot>
    

    <div class="py-12 w-8/12 m-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <div class="w-10/12 bg-blue-200 m-auto p-4">
                    
                        <div class="bg-gray-200 hover:bg-black p-2 mb-3"> 
                         @if ($bool==null)
                                <form action="{{route('categorie')}}" method="post">
                            @csrf                
                                <div class="mb-2">
                                    <Label for="label" class="sr-only">Label</Label>
                                    <input type="text" name="label" id="label" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('label') border-red-400 
                                    @enderror" placeholder="your label">
                                  
                                    @error('label')
                                        <div class="text-red-400 mt-2 text-sm">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    </div>
                                    
                                    <div>
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium"><i class="fa fa-plus" aria-hidden="true"></i> Create </button>
                                    </div>
                            </form>

                         @else

                                <form action="{{route('update_cat',$categ)}}" method="post">
                            @csrf                
                                <div class="mb-2">
                                    <Label for="label" class="sr-only">Label</Label>
                                    <input type="text" name="label" id="label" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('label') border-red-400 
                                    @enderror" placeholder="your label" value="{{$categ->label}}">
                                  
                                    @error('label')
                                        <div class="text-red-400 mt-2 text-sm">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    </div>
                                    
                                    <div>
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium"><i class="fa fa-plus" aria-hidden="true"></i> Update </button>
                                    </div>
                            </form>
                            @endif
                            
                        </div>


       @if ($categorie->count())
            @foreach ($categorie as $item)
                <div class=" w-6/12 bg-blue-100 p-4 mb-3 rounded-lg">
                    <div class="flex justify-between ">
                        
                            <div class="flex justify-start items-center">
                                <i class="fa fa-check mr-1 text-green-400" aria-hidden="true"></i> 
                                <p class="font-semibold">{{$item->label}} </p> 
                            </div>
                     
                            <span class="flex items-end">
                                
                                
                                <form action="{{route('categorie_update',$item->id)}}" method="post" class="mx-2">
                                    @csrf    
                                    
                                     <button ><i class="fa fa-pencil-square-o text-yellow-500" aria-hidden="true"></i></button>
                                </form> 

                                <form action="{{route('destroy',$item)}}" method="post" class="mx-2">
                                    @csrf  
                                    @method('DELETE')
                                    <input type="text" hidden>
                                    <button type="submit"><i class="fa fa-trash text-red-600" aria-hidden="true"></i></button>
                                </form> 
                                <form action="" method="post" class="mx-2">
                                    @csrf  
                                    
                                    <input type="text" hidden>
                                    <button type="submit"><i class="fa fa-list" aria-hidden="true"></i></button>
                                </form>                   
                            </span>
                </div>
                                
                </div>
                @endforeach
          {{$categorie->links()}}
            @else
            no label
            @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>