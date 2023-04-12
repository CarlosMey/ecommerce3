<div class="flex-1 relative" x-data>

    <form action="{{ route('search') }}" autocomplete="off">
        <x-input name="name" wire:model="search" type="text" class="w-full" placeholder="Estas buscando algun producto ?" />

    </form>
    <div class="absolute w-full">

        <div class="bg-white rounded-lg shadow mt-1 hidden" :class="{ 'hidden' : !$wire.open}" @click.away="$wire.open = false">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)

                    <a href="{{route ('products.show', $product)}}" class="flex">
                        <img class="w-16 h-12 object-cover" src="{{ Storage::url($product->images->first()->url) }}" alt="">

                        <div class="ml-4 text-gray-700">
                            <p class="text-lg font-semibold leading-5">{{$product->name}}</p>
                            <p class="">Categoria: {{$product->subcategory->category->name}}</p>
                        </div>
                    </a>
                @empty
                <p class="text-lg leading-5">No hay registro</p>
                @endforelse
            </div>
        </div>
    </div>

</div>
