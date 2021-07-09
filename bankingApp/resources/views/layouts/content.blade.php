<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- balance box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <p>Saldo</p>
                        <h3>{{ Auth::user()->balance }}</h3>
                    </div>
                    <a  class="small-box-footer">&nbsp;</a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <p>Numer konta bankowego</p>
                        <h3>{{Auth::user()->bank_number}}</h3>
                    </div>
                    <a class="small-box-footer"> &nbsp;</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning" style="color: white !important;">
                    <div class="inner">
                        <p>Typ konta</p>
                        <h3>{{Auth::user()->account_type}}</h3>
                    </div>
                    <a  class="small-box-footer" style="color: white !important;">&nbsp;</a>
                </div>
            </div>
            <!-- ./col -->
            @if(Auth::user()->account_type=="Konto standard")
                <div class="col-lg-3 col-6">

                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <p>Kredyt</p>
                            <h3>{{Auth::user()->credit}}</h3>
                        </div>
                        <a  class="small-box-footer">&nbsp;</a>
                    </div>
                </div>
            @endif
            <!-- ./col -->
        </div>

    </div><!-- /.container-fluid -->
</section>
