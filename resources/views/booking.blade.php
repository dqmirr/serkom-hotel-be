@extends('landing')
@section('content')
<div>
    <h2 class="text-center mt-2">Buat Pemesanan</h2>
    <div class="card m-5">
        <div class="card-header">
            Pemesanan
        </div>
        <div class="card-body">
            <form action="{{ route('simpan') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ old('nama') }}" style="width:80%" required>
                        @error('nama') <label class="text-danger">{{ $message }}</label> @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="jenis_kelamin" class="form-select col-md-2" style="width: 80%" required>
                            <option value="Laki-laki" @if (old('jenis_kelamin') == "1" ) selected @endif>Laki-laki</option>
                            <option value="Perempuan" @if (old('jenis_kelamin') == "2" ) selected @endif>Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <label class="text-danger">{{ $message }}</label> @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nomor_hp" class="col-sm-2 col-form-label" >Nomor Identitas</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="no_identitas" placeholder="Nomor Identitas" style="width: 80%" value="{{ old('no_identitas') }}" required>
                        @error('no_identitas') <label class="text-danger">{{ $message }}</label> @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tipe_kamar" class="col-sm-2 col-form-label">Jenis Kamar</label>
                    <select name="tipe_kamar" class="form-select col-md-4 " style="width: 80%" required>
                        <option value="Standar" @if (old('tipe_kamar') == "Standar" ) selected @endif>Standar</option>
                        <option value="Deluxe" @if (old('tipe_kamar') == "Deluxe" ) selected @endif>Deluxe</option>
                        <option value="Family" @if (old('tipe_kamar') == "Family" ) selected @endif>Family</option>
                    </select>
                    @error('tipe_kamar') <label class="text-danger">{{ $message }}</label> @enderror
                </div>
                <div class="mb-3 row">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <p>{{
                            $harga
                            }}</p> 
                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tanggal_pesan" class="col-sm-2 col-form-label">Tanggal pesan</label>
                    <input name="tanggal_pesan" type="date" class="form-control col-md-2 m-2" value="{{old('tanggal_pesan')}}"style="width: 80%" required>
                    @error('tanggal_pesan') <label class="text-danger">{{ $message }}</label> @enderror
                </div>
                <div class="mb-3 row">
                    <label for="durasi" class="col-sm-2 col-form-label">Durasi Menginap</label>
                    {{-- <div class="col"> --}}
                        <input name="durasi" type="number" class="form-control col-md-2 m-2" value="{{old('durasi')}}"style="width: 80%" required> 
                        <p>hari</p>
                    {{-- </div> --}}
                        @error('durasi') <label class="text-danger">{{ $message }}</label> @enderror
                </div>
                <div class="mb-4 row">
                    <label for="breakfast" class="col-sm-2 col-form-label">Termasuk Breakfast</label>
                    <input name="breakfast" type="checkbox" class="form-check-input" value="{{old('breakfast')}}">
                    @error('tanggal_pesan') <label class="text-danger">{{ $message }}</label> @enderror
                </div>
                <div class="mb-3 row">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" step="0.01" class="form-control" name="harga" value=
                        {{-- @if($breakfast == true)
                        $total = $harga-($harga/100*10)
                        @endif --}}
                        {{$total}}
                         readonly required>
                    </div>
                </div>
                <div class="mb-3 text-center align-content-center ">
                    <a href={{ route("hitung") }} class="form-control btn btn-primary text-center" style="width: 250px">Hitung</a>
                    <input type="submit" value="Simpan" class="form-control btn btn-primary text-center" style="width: 250px"/>
                    <a href="{{ route("booking") }}" class="btn btn-danger text-center" style="width: 250px">Batal</a>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted">
            
        </div>
  </div>
</div>
@endsection
