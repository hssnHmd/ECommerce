<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex ">
                        @foreach ($items as $item)
                        <div class="mt-16 py-4 px-4  w-72 bg-gray-200 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-110 transition duration-500 mx-auto md:mx-2 relative">
                             <div class="absolute top-0 right-0 pt-2 pr-2"> <small class="text-gray-600">categorie:</small>{{$item->categories->label}}</div>
                            <div class="w-sm ">
                               
                                <div class="mt-4 text-green-600 text-center ">
                                    
                                    <h1 class="text-xl font-bold">{{$item->label}}</h1>
                                    <p class="mt-4 text-gray-600">{{$item->price}} $</p>
                                    <form action="{{route('details',$item->id)}}" >
                                        @csrf
                                       
                                        <button class="mt-8 mb-2 py-2 px-14 rounded-full bg-red-600 text-white tracking-widest hover:bg-red-400 transition duration-200">details</button>
                                    </form>
                                    <form action="{{route('stripe',$item)}}">
                                        <button class="mt-4 mb-4 py-2 px-14 rounded-full bg-yellow-600 text-white tracking-widest hover:bg-yellow-400 transition duration-200">Achat</button>
                                    </form>
                                     <form action="{{route('panier',$item)}}" method="post">
                                        @csrf
                                        <button class="mt-4 mb-4 py-2 px-14 rounded-full bg-yellow-600 text-white tracking-widest hover:bg-yellow-400 transition duration-200">ajouter au panier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                       
                        
                        @endforeach
    
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>