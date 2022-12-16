@extends('layouts.app')

@section('title', 'Diagnosa')

@section('content')

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Pilih Gejala</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('diagnosa.store')}}" method="POST">
                        @foreach ($gejala as $item)
                        @csrf
                        <div class="mb-3">
                            <input type="checkbox" name="gejala[]" value="{{$item->id}}">
                            {{$item->kode. ' - '
                            .$item->nama}} <br>
                        </div>

                        @endforeach
                        <button type="submit" class="btn btn-success my-3">Proses</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection