@extends('template.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>SPK dengan Metode Mabac</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Tabel Perbandingan Berpasangan -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Perbandingan Berpasangan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                @foreach (array_keys(reset($matriks_keputusan)) as $criteria)
                                    <th>K{{ $criteria + 1 }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matriks_keputusan as $alternative => $criteriaValues)
                                <tr>
                                    <th>A{{ $alternative }}</th> <!-- Add 'a' here -->
                                    @foreach ($criteriaValues as $value)
                                        <td>{{ $value }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tabel Normalisasi -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Normalisasi</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                @foreach (array_keys(reset($matrix_normalisasi)) as $criteria)
                                    <th>K{{ $criteria + 1 }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matrix_normalisasi as $alternative => $criteriaValues)
                                <tr>
                                    <th>A{{ $alternative }}</th> <!-- Add 'a' here -->
                                    @foreach ($criteriaValues as $value)
                                        <td>{{ $value }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tabel Retimbang -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Retimbang</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                @foreach (array_keys(reset($matrik_retimbang)) as $criteria)
                                    <th>K{{ $criteria + 1 }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matrik_retimbang as $alternative => $criteriaValues)
                                <tr>
                                    <th>A{{ $alternative }}</th> <!-- Add 'a' here -->
                                    @foreach ($criteriaValues as $value)
                                        <td>{{ $value }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tabel Perbatasan -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Perbatasan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <!-- Add your table header if needed -->
                            </thead>
                            <tbody>
                                @foreach ($matrik_perbatasan as $alternative => $value)
                                    <tr>
                                        <th>A{{ $alternative }}</th>
                                        <td>{{ $value }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>

            <!-- Tabel Q Matrix -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Q Matrix</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                @foreach (array_keys(reset($matrik_Q)) as $criteria)
                                    <th>K{{ $criteria + 1 }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matrik_Q as $alternative => $criteriaValues)
                                <tr>
                                    <th>A{{ $alternative }}</th> <!-- Add 'a' here -->
                                    @foreach ($criteriaValues as $value)
                                        <td>{{ $value }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tabel Rangking -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Rangking</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Alternatif</th>
                                <th>Total Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $rank = 1;
                            @endphp
                            @foreach ($matrik_rangking as $alternative => $value)
                                <tr>
                                    <td>{{ $rank++ }}</td>
                                    <td>A{{ $alternative }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
