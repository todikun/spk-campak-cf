<form action="{{route('nilai.store')}}" method="POST">
    @csrf

    <h5 class="card-title mb-3">Penyakit</h5>
    <select name="penyakitid" class="form-control mb-3" required>
        <option value="">PILIH</option>
        @foreach ($penyakit as $item)
        <option value="{{$item->id}}">{{$item->nama}}</option>
        @endforeach
    </select>

    <h5 class="card-title mb-3">Gejala</h5>
    <select name="gejalaid" class="form-control mb-3" required>
        <option value="">PILIH</option>
        @foreach ($gejala as $item)
        <option value="{{$item->id}}">{{$item->nama}}</option>
        @endforeach
    </select>

    <h5 class="card-title mb-3">Nilai CF Pakar</h5>
    <input type="text" class="form-control mb-3" name="cf_pakar" required>

    <h5 class="card-title mb-3">Nilai CF Pasien</h5>
    <input type="text" class="form-control mb-3" name="cf_pasien" required>

    <button type="submit" class="btn btn-success my-3">Save</button>
</form>