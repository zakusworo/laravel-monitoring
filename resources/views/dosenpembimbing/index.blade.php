@extends('layouts.layout_master')

@section('main_content2')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- TABLE HOVER -->
                    @if(session('sukses'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <i class="fa fa-check-circle"></i> {{ session('sukses') }}
                        </div>
                    @endif
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Dosen Pembimbing</h3>
                            <div class="right">
                                <button type="button" class="btn" data-toggle="modal" data-target="#tambahdatadosen">
                                    <i class="lnr lnr-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover mydatatable" id="mydatatable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIDN</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_dosen as $dosen)
                                        <tr>
                                            <td>{{ $dosen->gelar_depan.' '.$dosen->nama.' '.$dosen->gelar_belakang }}
                                            </td>
                                            <td>{{ $dosen->nidn }}</td>
                                            <td>{{ $dosen->email }}</td>
                                            <td><a href="/dosenpembimbing/{{ $dosen->id }}/detail"
                                                    class="btn btn-info btn-xs"><i class="lnr lnr-magnifier"></i></a>
                                                <a href="/dosenpembimbing/{{ $dosen->id }}/edit"
                                                    class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></a>
                                                <a href="/dosenpembimbing/{{ $dosen->id }}/delete"
                                                    class="btn btn-danger btn-xs"
                                                    onclick="return confirm('Yakin data dengan nama {{ $dosen->nama }} akan dihapus?')"><i
                                                        class="lnr lnr-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END TABLE HOVER -->
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambahdatadosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dosen Pembimbing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dosenpembimbing/create" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Lengkap"
                                value="{{ old('nama') }}">
                            @if($errors->has('nama'))
                                <p class="text-danger">{{ $errors->first('nama') }}</p>
                            @endif
                        </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="gelar_depan">Gelar Depan</label>
                            <input type="text" class="form-control" name="gelar_depan" placeholder="Masukan Gelar Depan"
                                value="{{ old('gelar_depan') }}">
                            @if($errors->has('gelar_depan'))
                                <p class="text-danger">{{ $errors->first('gelar_depan') }}</p>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gelar_belakang">Gelar Belakang</label>
                            <input type="text" class="form-control" name="gelar_belakang"
                                placeholder="Masukan Nama Belakang"
                                value="{{ old('gelar_belakang') }}">
                            @if($errors->has('gelar_belakang'))
                                <p class="text-danger">{{ $errors->first('gelar_belakang') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIDN</label>
                        <input type="number" class="form-control" name="nidn" placeholder="Masukan NIDN"
                            value="{{ old('nidn') }}">
                        @if($errors->has('nidn'))
                            <p class="text-danger">{{ $errors->first('nidn') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukan Email"
                            value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <option value="Laki-Laki"
                                {{ old('jk') == 'Laki-Laki' ? ' selected' : '' }}>
                                Laki - Laki</option>
                            <option value="Perempuan"
                                {{ old('jk') == 'Perempuan' ? ' selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Foto</label>
                        <input type="file" class="form-control" name="avatar">
                        @if($errors->has('avatar'))
                            <p class="text-danger">{{ $errors->first('avatar') }}</p>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $('#subPages').addClass('in').prev().addClass('active').removeClass('collapsed');
        $('#dosenpembimbing').addClass('active')
    </script>
@endpush
