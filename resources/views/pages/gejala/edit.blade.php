<form action="{{route('gejala.update', $gejala->id)}}" method="POST">
    @csrf
    @method('PUT')

    <h5 class="card-title mb-3">Nama</h5>
    <input type="text" class="form-control mb-3" name="nama" value="{{$gejala->nama}}" required>

    <button type="submit" class="btn btn-success my-3">Save</button>
</form>