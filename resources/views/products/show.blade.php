<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">

            <div class="flexslider mb-auto">
                <ul class="slides">
                    @foreach ($product->images as $image)
                        <li data-thumb="{{Storage::url($image->url)}}">
                            <img src="{{Storage::url($image->url)}}" />
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h1 class="text-xl font-bold text-zinc-700">{{$product->name}}</h1>
                <div class="flex">
                    <p class="text-zinc-700">Marca: <a class="underline capitalize hover:text-orange-500" href="">{{$product->brand->name}}</a></p>
                    <p class="text-zinc-700 ml-6">5 <i class="fas fa-star text-sm text-yellow-400"></i></p>
                    <a class="text-orange-500 hover:text-orange-700 underline" href="">39 Reseñas</a>
                </div>

                <p class="text-2xl font-semibold text-zinc-700 my-4">USD {{$product->price}}</p>

                <div class="bg-white rounded-lg shadow-lg">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-green-500">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>

                        <div class="ml-4">
                            <p class="text-lg font-semibold text-green-500">Se hace envios a todo el Peru.</p>
                            <p>Recibelo el {{Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-1">
                        @if ($product->subcategory->size)

                        @livewire('add-cart-item-size',['product' => $product])

                    @elseif($product->subcategory->color)

                        @livewire('add-cart-item-color',['product' => $product])

                    @else

                        @livewire('add-cart-item',['product' => $product])

                    @endif
                </div>

            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
                });
        </script>
    @endpush
</x-app-layout>
