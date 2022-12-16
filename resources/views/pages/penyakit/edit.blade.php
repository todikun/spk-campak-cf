<form action="{{route('nagari.update', $nagari->id)}}" method="POST">
    @csrf
    @method('PUT')

    <h5 class="card-title mb-3">Kecamatan</h5>
    <select name="kecamatan_id" class="form-control mb-3" required>
        <option value="">PILIH</option>
        @foreach ($kecamatan as $item)
        <option value="{{$item->id}}" {{$item->id == $nagari->kecamatan_id ? 'selected' : ''}}>{{$item->nama}}</option>
        @endforeach
    </select>

    <h5 class="card-title mb-3">Nama</h5>
    <input type="text" class="form-control mb-3" name="nama" value="{{$nagari->nama}}" required>

    <h5 class="card-title mb-3">Jumlah KK</h5>
    <input type="number" class="form-control mb-3" name="jumlah_kk" value="{{$nagari->jumlah_kk}}" required>

    <h5 class="card-title mb-3">Jumlah Jiwa</h5>
    <input type="number" class="form-control mb-3" name="jumlah_jiwa" value="{{$nagari->jumlah_jiwa}}" required>

    <h5 class="card-title my-3">Keterangan</h5>
    <textarea class="form-control" rows="2" placeholder="Keterangan"
        name="keterangan">{{$nagari->keterangan}}</textarea>

    <button type="submit" class="btn btn-success my-3">Save</button>
</form>