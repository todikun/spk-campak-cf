@extends('layouts.app')

@section('title', 'Hasil Diagnosa')

@section('content')
<div class="container-fluid p-0">

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
        <strong>{{$error}}</strong>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <h1 class="h3 mb-3">Hasil Diagnosa</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('diagnosa.laporan', ['data' => $result])}}" target="_blank"
                        class="btn btn-primary mb-3">Cetak</i>
                    </a>

                    <table class="table">
                        <thead>
                            <tr>
                                <td colspan="1%">#</td>
                                <td>Penyakit</td>
                                <td>Kepercayaan</td>
                                <td width="20%">Action</td>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            @foreach ($result as $item)
                            @if ($item['kepercayaan'] != 0)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item['nama']}}</td>
                                <td>{{$item['kepercayaan']}}%</td>
                                <td>

                                    <a href="{{route('diagnosa.detail', ['id' => $item['id']])}}"
                                        class="btn btn-xs btn-detail btn-secondary">
                                        <i class="align-middle" data-feather="eye"></i>
                                    </a>

                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

<script>
    // event button edit
    $('.btn-edit').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            dataType: 'HTML',
            method: 'GET',
            success: function (result) {
                $('#modal-form').find('#modal-label').html('Edit Diagnosa');
                $('#modal-form').find('.modal-body').html(result);
                $('#modal-form').modal('show');
            },
            error: function (err) {
                console.log(err);
            },
        });
    });

    // event button add
    $('.btn-add').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            dataType: 'HTML',
            method: 'GET',
            success: function (result) {
                $('#modal-form').find('#modal-label').html('Add Diagnosa');
                $('#modal-form').find('.modal-body').html(result);
                $('#modal-form').modal('show');
            },
            error: function (err) {
                console.log(err);
            },
        });
    });

    // event button detail
    $('.btn-detail').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            dataType: 'HTML',
            method: 'GET',
            success: function (result) {
                $('#modal-form').find('#modal-label').html('Detail Diagnosa');
                $('#modal-form').find('.modal-body').html(result);
                $('#modal-form').modal('show');
            },
            error: function (err) {
                console.log(err);
            },
        });
    });
</script>
@endpush