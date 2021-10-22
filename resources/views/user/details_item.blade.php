<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mt-16 py-4 px-4  w-72 bg-gray-200 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-110 transition duration-500 mx-auto md:mx-2 relative">
                        <div class="absolute top-0 right-0 pt-2 pr-2"> <small class="text-gray-600">categorie:</small>{{$item->categorie->label}}</div>
                            <div class="w-sm ">                              
                                <div class="mt-4 text-green-600 text-center ">                                   
                                    <h1 class="text-xl font-bold">{{$item->label}}</h1>
                                    <p class="mt-4 text-gray-600">{{$item->price}} $</p>                                                                       
                                </div>
                                <div class="flex justfy-content-center">
                                  @if (!$item->likedby(auth()->user()))
                                      <form action="{{route('like',$item)}}" method="post" class="mr-3">
                                        @csrf
                                        <button class="text-blue-300"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                                      </form>
                                  @else
                                      <form action="{{route('unlike',$item)}}" method="post" class="mr-3">
                                        @csrf
                                        <button class="text-blue-300 "><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>
                                    </form>
                                  @endif
                                    
                                    {{$item->likes->count()}} {{Str::plural('like',$item->likes->count())}}
                                </div>
                                <div class="mt-2 flex">
                                    <form action="{{route('comment',$item)}}" method="post" class="mt-2 flex">
                                        @csrf
                                    <Label for="comment" class="sr-only">Label</Label>
                                    <input type="text" name="comment" id="comment" class="bg-gray-100 border-2 w-full p-2 rounded-lg @error('comment') border-red-400 
                                    @enderror" placeholder="your comment">
                                  
                                    @error('comment')
                                        <div class="text-red-400 mt-2 text-sm">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium mx-2">Comment</button>
                                    </form>
                                </div>
                                <div class="w-8/12">
                               @foreach ($comments as $it)
                               <div class="flex flex-col bg-gray-300 my-2">
                                   <span class="font-bold">{{auth()->user()->name}}</span>
                                    <span class="ml-3">{{$it->comment}}</span>
                               </div>
                                    
                               @endforeach
                                   
                               
                                    
                               
                                
                                </div>
                            </div>
                      </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    
</x-app-layout>