@include('adminLte.templateTop')

<div class="container">
    <div class="card card-primary justify-content-md-center">
        <div class="card-header">
            <h3 class="card-title">Wykonaj przelew</h3>
        </div>
        <form action="postTransfer" method="POST">
           @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Imię odbiorcy</label>
                    <input type="text" name="receiver_name" class="form-control" id="exampleInputEmail1" placeholder="Wprowadź imię odbiorcy">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Nazwisko odbiorcy</label>
                    <input type="text" name="receiver_surname" class="form-control" id="exampleInputEmail1" placeholder="Wprowadź nazwisko odbiorcy">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Numer konta bankowego odbiorcy</label>
                    <input type="number"  name="receiver_bank_number" class="form-control" id="exampleInputEmail1" placeholder="Wprowadź numer konta bankowego odbiorcy">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Kwota przelewu</label>
                    <input type="number" step="0.01" name="amount" class="form-control" id="exampleInputEmail1" placeholder="Wprowadź kwotę przelewu">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Opis</label>
                    <input type="text" name="desc" class="form-control" id="exampleInputEmail1" placeholder="Wprowadź opis">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Wykonaj transakcję</button>
            </div>
        </form>
    </div>
</div>
@include('adminLte.templateBottom')
