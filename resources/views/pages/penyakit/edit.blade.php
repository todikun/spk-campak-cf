<form action="{{route('penyakit.update', $penyakit->id)}}" method="POST">
    @csrf
    @method('PUT')

    <h5 class="card-title mb-3">Nama</h5>
    <input type="text" class="form-control mb-3" name="nama" value="{{$penyakit->nama}}" required>

    <h5 class="card-title mb-3">Deskripsi</h5>
    <input type="text" class="form-control mb-3" name="deskripsi" value="{{$penyakit->deskripsi}}" required>

    <h5 class="card-title mb-3">Solusi</h5>
    <input type="text" class="form-control mb-3" name="solusi" value="{{$penyakit->solusi}}" required>

    <button type="submit" class="btn btn-success my-3">Save</button>
</form>