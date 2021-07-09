@include('adminLte.templateTop')
<div class="ml-5">
    <p>Numer karty kredytowej:</p>
    <strong>{{Auth::user()->credit_card_number}}</strong>
</div>

@include('adminLte.templateBottom')
