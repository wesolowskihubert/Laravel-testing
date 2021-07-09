@include('adminLte/templateTop')
<div class="container">
    <div class="row">
        <div class="form-group">
            <form action="changeAddress" method="POST">
                @csrf
                <label for="exampleInputEmail1">Zmień adres</label>
                <input type="text" name="newAddres" class="form-control" id="exampleInputEmail1" placeholder="Wprowadź nowy adres">
                <div class="mt-3">
                    <button type="submit" class=" btn-primary w-100 btn active" role="button" aria-pressed="true">Zmień adres</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <form action="changePhoneNumber" method="POST">
                @csrf
                <label for="exampleInputEmail1">Numer telefonu</label>
                <input type="number" name="newPhoneNumber" class="form-control" id="number" placeholder="Wprowadź nowy numer telefonu">

                <div class="mt-3">
                    <button type="submit" class=" btn-primary w-100 btn active" role="button" aria-pressed="true">Zmień numer telefonu</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <form action="changePassword" method="POST">
                @csrf
                <label for="newPassword">Zmień hasło</label>
                <input type="password" name="newPassword" class="form-control" id="exampleInputEmail1" placeholder="Wprowadź nowe hasło">
                <div class="mt-3">
                    <button type="submit" class=" btn-primary btn w-100 active" role="button" aria-pressed="true">Zmień hasło</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <form action="deleteAccount" method="POST">
                @csrf
                <div >
                    <label for="newPassword">Usuń konto</label>
                    <button type="submit" class=" btn-danger w-100 btn active " role="button" aria-pressed="true">Usuń konto</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('adminLte/templateBottom')
