@include('adminLte/templateTop')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <a href="inTransferHistory" class=" btn-primary btn active" role="button" aria-pressed="true">Historia operacji przychodzących</a>
                        </div>
                        <div class="col-3">
                            <a href="outTransferHistory" class=" btn-primary btn active" role="button" aria-pressed="true">Historia operacji wychodzących</a>
                        </div>
                    </div>
                </div>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Imie odbiorcy</th>
                        <th>Nazwisko odbiorcy</th>
                        <th>Numer konta odbiorcy</th>
                        <th>Kwota</th>
                        <th>Opis</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($history as $transferHistory)
                        <tr>
                            <td>{{$transferHistory->transfer_date}}</td>
                            <td>{{$transferHistory->receiver_name}}</td>
                            <td>{{$transferHistory->receiver_surname}}</td>
                            <td>{{$transferHistory->receiver_bank_number}}</td>
                            <td>{{$transferHistory->amount}}</td>
                            <td>{{$transferHistory->desc}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@include('adminLte/templateBottom')
