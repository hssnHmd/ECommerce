<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('items') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <div class="w-6/12 bg-blue-200 m-auto p-4">
                        <div class="bg-gray-200 hover:bg-black p-2 mb-3"> 
                            <form action="{{route('items')}}" method="post">
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
                                    <div class="mb-2">
                                    <Label for="price" class="sr-only">Label</Label>
                                    <input type="number" name="price" id="price" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('price') border-red-400 
                                    @enderror" placeholder="price">
                                  
                                    @error('price')
                                        <div class="text-red-400 mt-2 text-sm">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    </div>
                                    <select class="w-full border bg-white rounded px-3 py-2 outline-none" name="categorie">
                                        <option selected> choissisez la categorie</option>
                                        @foreach ($categorie as $item)
                                            <option class="py-1" value={{$item->id}}>{{$item->label}}</option>
                                        
                                        @endforeach
                                        
                                    </select>
                                    
                                    <div>
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium"><i class="fa fa-plus" aria-hidden="true"></i> Create </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                                    
                    <div class="flex">
                         @foreach ($categorie as $cat)
                                <form action="{{route('show_cat',$cat)}}" >
                                     @csrf
                                     <button class="mt-8 mb-4 py-2 px-14 rounded-full bg-green-600 text-white tracking-widest hover:bg-green-400 transition duration-200" type="submit">{{$cat->label}}</button>
                                </form>
                        @endforeach
                                        
                    </div>  
                                

                    <div class="w-5/12 flex">
                        @forelse ($items as $item)
                        <div class="mt-16 py-4 px-4  w-72 bg-gray-200 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-110 transition duration-500 mx-auto md:mx-2 relative">
                             <div class="absolute top-0 right-0 pt-2 pr-2"> <small class="text-gray-600">categorie:</small>{{$item->categories->label}}</div>
                            <div class="w-sm ">
                               
                                <div class="mt-4 text-green-600 text-center ">
                                    
                                    <h1 class="text-xl font-bold">{{$item->label}}</h1>
                                    <p class="mt-4 text-gray-600">{{$item->price}} $</p>
                                    <form action="{{route('delete',$item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE');
                                        <button class="mt-8 mb-2 py-2 px-14 rounded-full bg-red-600 text-white tracking-widest hover:bg-red-400 transition duration-200">Delete</button>
                                    </form>
                                    <button class="mt-4 mb-4 py-2 px-14 rounded-full bg-yellow-600 text-white tracking-widest hover:bg-yellow-400 transition duration-200">update</button>
                                
                                </div>
                            </div>
                        </div>
                        @empty
                        <h1 class="text-gray-700 mx-4 p-3">no items in this categorie</h1>
                        @endforelse
                        
                    </div>
                   
                        
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>