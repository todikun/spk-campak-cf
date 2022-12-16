@extends('layouts.app')

@section('title', 'Penyakit')

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

    <h1 class="h3 mb-3">Semua Data Penyakit</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('penyakit.create')}}" class="btn btn-primary mb-3 btn-add">
                        <i class="align-middle" data-feather="plus"></i>
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <td colspan="1%">#</td>
                                <td>Kode</td>
                                <td>Nama</td>
                                <td>Deskripsi</td>
                                <td>Solusi</td>
                                <td width="15%">Action</td>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            @forelse ($penyakit as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->kode}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->deskripsi}}</td>
                                <td>{{$item->solusi}}</td>
                                <td>

                                    <a href="{{route('penyakit.edit', $item->id)}}"
                                        class="btn btn-xs btn-edit btn-warning">
                                        <i class="align-middle" data-feather="edit"></i>
                                    </a>

                                    <form action="{{route('penyakit.destroy', $item->id)}}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger"
                                            onclick="return confirm('Apakah data ini akan dihapus?')">
                                            <i class="align-middle" data-feather="trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <td colspan="50%" class="text-center">No data</td>
                            @endforelse
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
                $('#modal-form').find('#modal-label').html('Edit Nagari');
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
                $('#modal-form').find('#modal-label').html('Add Nagari');
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
                $('#modal-form').find('#modal-label').html('Detail Nagari');
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