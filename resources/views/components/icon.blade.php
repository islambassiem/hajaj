@php
    $size = 'size-10';
    $color = 'rgb(99, 102, 241)';
@endphp


@switch($type)
    @case('home')
        <x-icons.home :size="$size" :color="$color" />
    @break

    @case('entertainment')
        <x-icons.entertainment :size="$size" :color="$color" />
    @break

    @case('accessories')
        <x-icons.accessories :size="$size" :color="$color" />
    @break

    @case('family')
        <x-icons.family :size="$size" :color="$color" />
    @break

    @case('electronics')
        <x-icons.electronics :size="$size" :color="$color" />
    @break

    @case('hobbies')
        <x-icons.hobbies :size="$size" :color="$color" />
    @break

    @case('vehicles')
        <x-icons.vehicles :size="$size" :color="$color" />
    @break

    @case('others')
        <x-icons.others :size="$size" :color="$color" />
    @break

    @case('tools')
        <x-icons.tools :size="$size" :color="$color" />
    @break

    @case('furniture')
        <x-icons.furniture :size="$size" :color="$color" />
    @break

    @case('household')
        <x-icons.household :size="$size" :color="$color" />
    @break

    @case('garden')
        <x-icons.garden :size="$size" :color="$color" />
    @break

    @case('appliances')
        <x-icons.appliances :size="$size" :color="$color" />
    @break

    @case('games')
        <x-icons.games :size="$size" :color="$color" />
    @break

    @case('books')
        <x-icons.books :size="$size" :color="$color" />
    @break

    @case('movies')
        <x-icons.movies :size="$size" :color="$color" />
    @break

    @case('music')
        <x-icons.music :size="$size" :color="$color" />
    @break

    @case('bags')
        <x-icons.bags :size="$size" :color="$color" />
    @break

    @case('women')
        <x-icons.women :size="$size" :color="$color" />
    @break

    @case('men')
        <x-icons.men :size="$size" :color="$color" />
    @break

    @case('jewelry')
        <x-icons.jewelry :size="$size" :color="$color" />
    @break

    @case('health')
        <x-icons.health :size="$size" :color="$color" />
    @break

    @case('beauty')
        <x-icons.beauty :size="$size" :color="$color" />
    @break

    @case('pets')
        <x-icons.pets :size="$size" :color="$color"/>
    @break

    @case('kids')
        <x-icons.kids :size="$size" :color="$color"/>
    @break

    @case('toys')
        <x-icons.toys :size="$size" :color="$color"/>
    @break

    @case('computers')
        <x-icons.computers :size="$size" :color="$color"/>
    @break

    @case('laptops')
        <x-icons.laptops :size="$size" :color="$color"/>
    @break

    @case('tablets')
        <x-icons.tablets :size="$size" :color="$color"/>
    @break

    @case('phones')
        <x-icons.phones :size="$size" :color="$color"/>
    @break

    @case('bicycles')
        <x-icons.bicycles :size="$size" :color="$color"/>
    @break

    @case('arts')
        <x-icons.arts :size="$size" :color="$color" />
    @break

    @case('phones')
        <x-icons.phones :size="$size" :color="$color"/>
    @break

    @case('sports')
        <x-icons.sports :size="$size" :color="$color"/>
    @break

    @case('parts')
        <x-icons.parts :size="$size" :color="$color"/>
    @break

    @case('musicals')
        <x-icons.musicals :size="$size" :color="$color"/>
    @break

    @case('antiques')
        <x-icons.antiques :size="$size" :color="$color"/>
    @break

    @case('motorbikes')
        <x-icons.motorbikes :size="$size" :color="$color"/>
    @break

    @case('cars')
        <x-icons.cars :size="$size" :color="$color"/>
    @break

    @case('real state')
        <x-icons.real-state :size="$size" :color="$color"/>
    @break

    @case('sale')
        <x-icons.sale :size="$size" :color="$color"/>
    @break

    @case('rent')
        <x-icons.rent :size="$size" :color="$color"/>
    @break

    @default
        <x-icons.other :size="$size" :color="$color"/>
@endswitch
