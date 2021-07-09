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

            <form action="creditTake" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="takeCredit">Weź kredyt</label>
                        <input type="number" name="takeCredit" class="form-control" id="takeCredit" placeholder="Wprowadź kwotę">
                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Weź kredyt</button>
                </div>
            </form>

        </div>
        <!-- /.card -->
    </div>
</div>
@include('adminLte/templateBottom')
