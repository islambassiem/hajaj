@php
    $size = 'size-10';
@endphp


@switch($type)
    @case('home')
        <x-icons.home :size="$size" />
    @break

    @case('entertainment')
        <x-icons.entertainment :size="$size" />
    @break

    @case('accessories')
        <x-icons.accessories :size="$size" />
    @break

    @case('family')
        <x-icons.family :size="$size" />
    @break

    @case('electronics')
        <x-icons.electronics :size="$size" />
    @break

    @case('hobbies')
        <x-icons.hobbies :size="$size" />
    @break

    @case('vehicles')
        <x-icons.vehicles :size="$size" />
    @break

    @case('others')
        <x-icons.others :size="$size" />
    @break

    @case('tools')
        <x-icons.tools :size="$size" />
    @break

    @case('furniture')
        <x-icons.furniture :size="$size" />
    @break

    @case('household')
        <x-icons.household :size="$size" />
    @break

    @case('garden')
        <x-icons.garden :size="$size" />
    @break

    @case('appliances')
        <x-icons.appliances :size="$size" />
    @break

    @case('games')
        <x-icons.games :size="$size" />
    @break

    @case('books')
        <x-icons.books :size="$size" />
    @break

    @case('movies')
        <x-icons.movies :size="$size" />
    @break

    @case('music')
        <x-icons.music :size="$size" />
    @break

    @case('bags')
        <x-icons.bags :size="$size" />
    @break

    @case('women')
        <x-icons.women :size="$size" />
    @break

    @case('men')
        <x-icons.men :size="$size" />
    @break

    @case('jewelry')
        <x-icons.jewelry :size="$size" />
    @break

    @case('health')
        <x-icons.health :size="$size" />
    @break

    @case('beauty')
        <x-icons.beauty :size="$size" />
    @break

    @case('pets')
        <x-icons.pets :size="$size" />
    @break

    @case('kids')
        <x-icons.kids :size="$size" />
    @break

    @case('toys')
        <x-icons.toys :size="$size" />
    @break

    @case('computers')
        <x-icons.computers :size="$size" />
    @break

    @case('laptops')
        <x-icons.laptops :size="$size" />
    @break

    @case('tablets')
        <x-icons.tablets :size="$size" />
    @break

    @case('phones')
        <x-icons.phones :size="$size" />
    @break

    @case('bicycles')
        <x-icons.bicycles :size="$size" />
    @break

    @case('arts')
        <x-icons.arts :size="$size" />
    @break

    @case('phones')
        <x-icons.phones :size="$size" />
    @break

    @case('sports')
        <x-icons.sports :size="$size" />
    @break

    @case('parts')
        <x-icons.parts :size="$size" />
    @break

    @case('musicals')
        <x-icons.musicals :size="$size" />
    @break

    @case('antiques')
        <x-icons.antiques :size="$size" />
    @break

    @case('motorbikes')
        <x-icons.motorbikes :size="$size" />
    @break

    @case('cars')
        <x-icons.cars :size="$size" />
    @break

    @case('real state')
        <x-icons.real-state :size="$size" />
    @break

    @case('sale')
        <x-icons.sale :size="$size" />
    @break

    @case('rent')
        <x-icons.rent :size="$size" />
    @break

    @default
        <x-icons.other :size="$size" />
@endswitch
