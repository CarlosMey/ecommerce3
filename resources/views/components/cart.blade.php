@props(['size' => 35, 'color' => 'gray'])

@php
    switch ($color){
        case 'gray':
            $col = "#374151";
        break;

        case 'white':
            $col = "#ffffff";
        break;

        default:
            $col = "#374151";
        break;
    }
@endphp

<i class="fa-regular fa-cart-shopping-fast" style="color:{{$col}}"></i>
