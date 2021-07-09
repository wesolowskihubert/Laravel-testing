@include('adminLte/templateTop')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <a href="takeCredit" class=" btn-primary btn active" role="button" aria-pressed="true">Weź kredyt</a>
                        </div>
                        <div class="col-3">
                            <a href="refundCredit" class=" btn-primary btn active" role="button" aria-pressed="true">Spłać kredyt</a>
                        </div>
                    </div>
                </div>
            </div>

            <form action="refundCredit" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="refundCredit">Spłać kredyt</label> <br>
                        <label for="refundCredit">Pozostała kwota do spłaty: {{Auth::user()->credit}}</label>
                        <input type="number" step=".01" name="refundCredit" class="form-control" id="refundCredit" placeholder="Wprowadź kwotę">
                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Spłać kredyt</button>
                </div>
            </form>

        </div>
        <!-- /.card -->
    </div>
</div>
@include('adminLte/templateBottom')
