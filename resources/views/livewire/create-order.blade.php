<div class="container py-8 grid grid-cols-5 gap-6">
    <div class="col-span-3">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <x-label value="Nombre de contacto"/>
                <x-input type="text" wire:model.defer="contact" placeholder="Ingrese el nombre de la persona que recibira el producta" class="w-full"/>
                <x-input-error for="contact"/>
            </div>
            <div>
                <x-label value="Telefono de contacto"/>
                <x-input type="text" wire:model.defer="phone" placeholder="Ingrese un numero de telefono de contacto" class="w-full"/>
                <x-input-error for="phone"/>
            </div>
        </div>

        <div x-data="{envio_type: @entangle('envio_type')}">
            <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">Envios</p>

            <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4">
                <input x-model="envio_type" type="radio" value="1" name="envio_type" class="text-gray-700">
                <span class="ml-2 text-gray-700">
                    Recojo en tienda (Calle Falsa 123)
                </span>
                <span class="font-semibold text-gray-700 ml-auto">
                    Gratis
                </span>
            </label>

            <div class="bg-white rounded-lg shadow">
                <label class="px-6 py-4 flex items-center">
                    <input x-model="envio_type" type="radio" value="2" name="envio_type" class="text-gray-700">
                    <span class="ml-2 text-gray-700">
                        Envio a domicilio
                    </span>
                </label>

                <div class="px-6 pb-6 grid grid-cols-2 gap-6 hidden" :class="{ 'hidden': envio_type != 2}">
                    {{-- Departamentos --}}
                    <div>
                        <x-label value="Departamento" />
                        <select class="form-control  w-full" wire:model="department_id">
                            <option value="" disabled selected>Seleccione un Departamento</option>

                            @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error for="department_id"/>
                    </div>

                    {{-- Ciudades --}}
                    <div>
                        <x-label value="Ciudad" />
                        <select class="form-control w-full" wire:model="city_id">
                            <option value="" disabled selected>Seleccione una Ciudad</option>

                            @foreach ($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error for="city_id"/>
                    </div>

                    {{-- Distritos --}}
                    <div>
                        <x-label value="Distrito" />
                        <select class="form-control w-full" wire:model="district_id">
                            <option value="" disabled selected>Seleccione un Distrito</option>

                            @foreach ($districts as $district)
                                <option value="{{$district->id}}">{{$district->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error for="district_id"/>
                    </div>

                    <div>
                        <x-label value="Direccion"/>
                        <x-input class="w-full" wire:model="address" type="text"/>
                        <x-input-error for="address"/>
                    </div>
                    <div class="col-span-2">
                        <x-label value="Referencias"/>
                        <x-input class="w-full" wire:model="references" type="text"/>
                        <x-input-error for="references"/>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <x-button wire:loading.attr="disabled" wire:target="create_order" class="mt-6 mb-4" wire:click="create_order">
                Continuar con la compra
            </x-button>
            <hr>
            <p class="text-sm text-gray-700 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur facilis animi laborum sint sit numquam, reiciendis ducimus eveniet aliquam, velit voluptas odio, facere corporis! Porro repellat ea esse fugiat quam. <a href="" class="font-semibold text-orange-500 hover:border-b hover:border-orange-500">Politicas y privacidad</a></p>
        </div>

    </div>
    <div class="col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">

                        <article class="flex-1">
                            <h1 class="font-bold">{{$item->name}}</h1>

                            <div class="flex">
                                <p>Cant: {{$item->qty}}</p>
                                @isset($item->options['color'])
                                    <p class="mx-2"> - Color: {{$item->options['color']}}</p>
                                @endisset

                                @isset($item->options['size'])
                                    <p>{{$item->options['size']}}</p>
                                @endisset
                            </div>

                            <p>USD {{$item->price}}</p>
                        </article>
                    </li>
                @empty
                <li class="py-6 px-4">
                    <p class="text-center text-gray-700">
                        No tiene agregado ningun item en el carrito
                    </p>
                </li>
                @endforelse
            </ul>

            <hr class="mt-4 mb-3">

            <div class="text-gray-700">
                <p class="flex justify-between item-center">
                    Subtotal
                    <span class="font-semibold">{{Cart::subtotal()}} USD</span>
                </p>
                <p class="flex justify-between item-center">
                    Envio
                    <span class="font-semibold">
                        @if ($envio_type == 1 || $shipping_cost == 0)
                            Gratis
                        @else
                            {{$shipping_cost}} USD
                        @endif
                    </span>
                </p>

                <hr class="mt-4 mb-3">

                <p class="flex justify-between item-center font-semibold">
                    <span class="text-lg">Total</span>
                    @if ($envio_type == 1 )
                        {{Cart::subtotal()}} USD
                    @else
                        {{Cart::subtotal() + $shipping_cost}} USD
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
