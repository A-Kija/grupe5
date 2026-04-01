@component('mail::message')
# New Truck Created

A new truck has been added to the system.

## Truck Details

@component('mail::panel')
**Truck ID:** {{ $truck->id }}

**Color:** {{ $truck->color }}

**Power:** {{ $truck->power }}

**Year:** {{ $truck->year }}
@endcomponent

@component('mail::button', ['url' => route('trucks-show', $truck->id)])
View Truck
@endcomponent

Thanks,
Driver Beaver
@endcomponent