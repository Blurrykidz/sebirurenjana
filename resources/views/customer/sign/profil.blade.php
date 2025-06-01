@extends('customers.layout.main')

@section('container')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">



                <div class="col-md-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            @if ($pemohon->nik!=null)
                            <div class="ml-1">
                                <p> Anda sudah melengkapi profil, silahkan ambil antrian pada tombol dibawah ini</p>
                                <div class="form-group row">
                                    <div class="ml-1">
                                        <a href="/pemohon/ambil-antrian" class="btn btn-success">Ambil Antrian</a>
                                     </div>
                                 </div>
                             </div>
                             @else
                             {{-- <div class="ml-3">
                                 <p style="color: red"> Harap Lengkapi Form dibawah ini</p>
                             </div> --}}
                             @endif
                            <h3 class="card-title">Data Diri</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ url('pemohon/profil/update') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            placeholder="Nama" required value="{{ $pemohon->nama }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nik" class="col-sm-2 col-form-label">NIK/Passport</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nik" id="nik"
                                            placeholder="Nomor Identitas" value="{{ $pemohon->nik }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-sm-2 col-form-label">NO HP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                                            placeholder="Nomor HP" value="{{ $pemohon->phone_number }}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                            required value="{{ $pemohon->tanggal_lahir }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                                            <option value="">--Pilih Jenis Kelamin--</option>
                                            <option {{ $pemohon->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}
                                                value="Laki-laki">Laki-laki</option>
                                            <option {{ $pemohon->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}
                                                value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                                    <div class="col-sm-10">
                                        <select id="pendidikan" name="pendidikan" class="form-control" required>
                                            <option value="">--Pilih Pendidikan Terakhir--</option>
                                            <option {{ $pemohon->pendidikan == 'Sekolah Dasar' ? 'selected' : '' }}
                                                value="Sekolah Dasar">Sekolah Dasar (SD)</option>
                                            <option
                                                {{ $pemohon->pendidikan == 'Sekolah Menengah Pertama' ? 'selected' : '' }}
                                                value="Sekolah Menengah Pertama">Sekolah Menengah Pertama (SMP)</option>
                                            <option {{ $pemohon->pendidikan == 'Sekolah Menengah Atas' ? 'selected' : '' }}
                                                value="Sekolah Menengah Atas">Sekolah Menengah Atas (SMA)</option>
                                            <option {{ $pemohon->pendidikan == 'Diploma' ? 'selected' : '' }}
                                                value="Diploma">Diploma </option>
                                            <option {{ $pemohon->pendidikan == 'Strata 1' ? 'selected' : '' }}
                                                value="Strata 1">Strata 1 (S1)</option>
                                            <option {{ $pemohon->pendidikan == 'Strata 2' ? 'selected' : '' }}
                                                value="Strata 2">Strata 2 (S2)</option>
                                            <option {{ $pemohon->pendidikan == 'Strata 3' ? 'selected' : '' }}
                                                value="Strata 3">Strata 3 (S3)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <select id="pekerjaan" name="pekerjaan" class="form-control" required>
                                            <option value="">--Pilih pekerjaan--</option>
                                            @foreach ($listPekerjaan as $item)
                                                <option value="{{ $item }}"
                                                    {{ $pemohon->pekerjaan == $item ? 'selected' : '' }}>
                                                    {{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat">{{ $pemohon->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ $pemohon->avatar() }}"
                                    alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ $pemohon->nama }}</h3>
                            <p class="text-muted text-center">
                                {{ $pemohon->jenis_kelamin . ' (' . $pemohon->umur() . ' Tahun)' }}
                            </p>
                            {{-- <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">1,322</a>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Akun</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ url('pemohon/change-password') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="Email" required
                                            value="{{ $pemohon->email }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-4 col-form-label">Ganti Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="password" placeholder="Password" required>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-4 col-form-label">Konfirmasi
                                        Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" placeholder="Konfirmasi Password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--/. container-fluid -->
    </section>
@endsection
