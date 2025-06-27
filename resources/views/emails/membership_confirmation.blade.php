@component('mail::message')
# CHWRA Membership Application Received

Dear {{ $membership->title }} {{ $membership->last_name }},

Thank you for applying for CHWRA membership. We've received your application with the following details:

**Name:** {{ $membership->first_name }} {{ $membership->last_name }}  
**Address:**  
{{ $membership->house_no }} {{ $membership->street_text }}  
@if($membership->line3){{ $membership->line3 }}<br>@endif
{{ $membership->post_code }}

**Membership Fee:** £3

@component('mail::button', ['url' => 'https://buy.stripe.com/8x27sNaVfdpP0V35odbMQ00'])
Pay Membership Fee Now
@endcomponent

Please complete your membership by making the payment at your earliest convenience.

Thank you,  
The CHWRA Team
@endcomponent