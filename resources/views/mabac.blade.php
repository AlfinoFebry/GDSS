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
                    <!-- Similar structure to previous tables, adjust accordingly -->
                    <!-- Use $bobot_alternatif and adjust variable names as needed -->
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
                    <!-- Similar structure to previous tables, adjust accordingly -->
                    <!-- Use $matrix_normalisasi and adjust variable names as needed -->
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
                    <!-- Similar structure to previous tables, adjust accordingly -->
                    <!-- Use $matrik_retimbang and adjust variable names as needed -->
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
                    <!-- Similar structure to previous tables, adjust accordingly -->
                    <!-- Use $matrik_perbatasan and adjust variable names as needed -->
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
                    <!-- Similar structure to previous tables, adjust accordingly -->
                    <!-- Use $matrik_Q and adjust variable names as needed -->
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
                    <!-- Similar structure to previous tables, adjust accordingly -->
                    <!-- Use $matrik_rangking and adjust variable names as needed -->
                </table>
            </div>
        </div>

    </section>
</div>
<!-- /.content-wrapper -->
@endsection
