@include('adminLte.templateTop')
<div class="ml-5">
    <p>Numer konta bankowego:</p>
    <strong>{{Auth::user()->bank_number}}</strong>
</div>

@include('adminLte.templateBottom')
