@extends('template.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>SPK dengan Metode ELECTRE</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
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
                                @foreach (array_keys(reset($array)) as $criteria)
                                    <th>K{{ $criteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($array as $alternative => $criteriaValues)
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
                <!-- /.card-body -->

            </div>
            <!-- /.card -->

            <!-- Default box -->
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
                                @foreach (array_keys(reset($normalized)) as $criteria)
                                    <th>K{{ $criteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($normalized as $alternative => $criteriaValues)
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
                <!-- /.card-body -->

                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

            <!-- Default box -->
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">Bobot Kriteria</h3>

                    <div class="card-tools ">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kriteria</th>
                                @foreach (array_keys(reset($normalized)) as $criteria)
                                    <th>K{{ $criteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Weight</th>
                                @foreach ($weight as $criteriaWeight => $criteriaValues)
                                    @foreach ($criteriaValues as $value)
                                        <td>{{ $value }}</td>
                                    @endforeach
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Preferensi</h3>

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
                                @foreach (array_keys(reset($preferensi)) as $criteria)
                                    <th>K{{ $criteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preferensi as $alternative => $criteriaValues)
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
                <!-- /.card-body -->

                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Concordance Index</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                        </thead>
                        <tbody>
                            @foreach ($concordanceIndex as $alternative => $criteriaValues)
                                <tr>
                                    @foreach ($criteriaValues as $v => $value)
                                        @if (is_array($value))
                                <tr>
                                    <td>C {{ $alternative }}, {{ $v }}</td>
                                    <td>
                                        @foreach ($value as $item)
                                            {{ $item }}
                                        @endforeach
                                    </td>
                                </tr>
                            @else
                                <td>{{ $value }}</td>
                            @endif
                            @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Discordance Index</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                        </thead>
                        <tbody>
                            @foreach ($discordanceIndex as $alternative => $criteriaValues)
                                <tr>
                                    @foreach ($criteriaValues as $v => $value)
                                        @if (is_array($value))
                                <tr>
                                    <td>C {{ $alternative }}, {{ $v }}</td>
                                    <td>
                                        @foreach ($value as $item)
                                            {{ $item }}
                                        @endforeach
                                    </td>
                                </tr>
                            @else
                                <td>{{ $value }}</td>
                            @endif
                            @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Concordance Matriks</h3>

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
                                @foreach (array_keys(reset($concordanceMatrix)) as $criteria)
                                    <th>K{{ $criteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($concordanceMatrix as $alternative => $criteriaValues)
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
                <!-- /.card-body -->

                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Discordance Matriks</h3>

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
                                @foreach (array_keys(reset($discordanceMatrix)) as $criteria)
                                    <th>K{{ $criteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($discordanceMatrix as $alternative => $criteriaValues)
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
                <!-- /.card-body -->

                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Threshold</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                <th>Concordance</th>
                                <th>{{ $concordanceThreshold }}</th>
                            </tr>
                            <tr>
                                <th>Discordance</th>
                                <th>{{ $discordanceThreshold }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Concordance Dominance</h3>

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
                                @foreach (array_keys(reset($concordanceDominance)) as $criteria)
                                    <th>K{{ $criteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($concordanceDominance as $alternative => $criteriaValues)
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
                <!-- /.card-body -->

                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Discordance Dominance</h3>

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
                                @foreach (array_keys(reset($discordanceDominance)) as $criteria)
                                    <th>K{{ $criteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($discordanceDominance as $alternative => $criteriaValues)
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
                <!-- /.card-body -->

                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Aggregate Dominance</h3>

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
                                @foreach (array_keys(reset($aggregateDominance)) as $criteria)
                                    <th>K{{ $criteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aggregateDominance as $alternative => $criteriaValues)
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
                <!-- /.card-body -->

                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Aggregate Dominance</h3>

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
                                <th>Alternative</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ranking as $alternative => $rank)
                                <tr>
                                    <td>{{ $rank }}</td>
                                    <td>A{{ $alternative }}</td>
                                    <td>{{ $aggregateRanking[$alternative] }}</td> <!-- Menampilkan jumlah angka satu -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
