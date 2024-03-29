@props(['category'])


<div class="grid grid-cols-4 p-4">
    <div>
        <p class="text-lg font-bold text-center text-zinc-600 mb-3">Subcategorias</p>

        <ul>
            @foreach ($category->subcategories as $subcategory)
                <li>
                    <a href="" class="text-zinc-600 inline-block font-semibold py-1 hover:text-orange-500">{{$subcategory->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-span-3">
        <img class="h-64 w-full object-cover object-center" src="{{Storage::url($category->image)}}" alt="">
    </div>
</div>
