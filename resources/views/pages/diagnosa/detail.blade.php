<form action="#">

    <h5 class="card-title mb-3">Kode</h5>
    <input type="text" class="form-control mb-3" name="kode" value="{{$penyakit->kode}}" required>

    <h5 class="card-title mb-3">Nama</h5>
    <input type="text" class="form-control mb-3" name="nama" value="{{$penyakit->nama}}" required>

    <h5 class="card-title my-3">Deskripsi</h5>
    <textarea class="form-control" rows="2" placeholder="deskripsi" name="deskripsi">{{$penyakit->deskripsi}}</textarea>

    <h5 class="card-title my-3">Solusi</h5>
    <textarea class="form-control" rows="2" placeholder="solusi" name="solusi">{{$penyakit->solusi}}</textarea>

</form>