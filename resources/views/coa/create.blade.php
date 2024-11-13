@extends('layouts.modal')

@section('content')
    <form method="POST" action="{{ route('coa.store') }}">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="form-group">
                <label for="code">Kode Rekening</label>
                <input type="text" name="code" id="code" aria-describedby="code" placeholder="Kode Rekening">
            </div>

            <div class="form-group">
                <label for="name">Nama Akun</label>
                <input type="text" name="name" id="name" aria-describedby="name" placeholder="Nama Akun">
            </div>

            <div class="form-group">
                <label for="coa_types">Tipe Akun</label>
                <select class="form-control" name="coa_types">
                    {{-- ENUM('Aset', 'Kewajiban', 'Ekuitas', 'Pendapatan', 'Biaya') --}}
                    <option value="Aset" selected>Aset</option>
                    <option value="Kewajiban">Kewajiban</option>
                    <option value="Ekuitas">Ekuitas</option>
                    <option value="Pendapatan">Pendapatan</option>
                    <option value="Biaya">Biaya</option>
                </select>
            </div>

            <div class="form-group">
                <label for="coa_types">Saldo Normal</label>
                <select class="form-control" name="coa_types">
                    {{-- ENUM('Debit', 'Kredit') --}}
                    <option value="Debit" selected>Debit</option>
                    <option value="Kredit">Kredit</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
