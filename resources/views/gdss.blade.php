@extends('template.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>SPK dengan Metode GDSS</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Rank DSS</h3>

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
                                <th>Electre</th>
                                <th>Mabac</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $rank = 1;
                        @endphp
                        @foreach ($electreRanking as $key => $value)
                            <tr>
                                <td>{{ $rank++ }}</td>
                                <td>A{{ $key }}</td>
                                <td>A{{ $resultMabac[$rank-2] }}</td>
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
                    <h3 class="card-title">Rank GDSS</h3>

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
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $rank = 1;
                            @endphp
                            @foreach ($gdssRanking as $alternative => $value)
                                <tr>
                                    <td>{{ $rank++ }}</td>
                                    <td>A{{ $alternative }}</td>
                                    <!-- <td>{{ $value }}</td> -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection
