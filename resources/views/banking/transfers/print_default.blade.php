<x-layouts.print>
    <x-slot name="title">
        {{ trans_choice('general.transfers', 1) }}
    </x-slot>

    <x-slot name="content">
        <x-transfers.template.default :model="$transfer" />
    </x-slot>
</x-layouts.print>
