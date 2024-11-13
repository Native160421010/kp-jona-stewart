@extends('layouts.kaiadmin')

@section('content')
    <div class="container">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Daftar Chart of Account (COA)</h3>
            </div>
        </div>

        @if (@session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <a class="btn btn-success" href="#modalCreate" data-toggle="modal" onclick="getCreateForm()">+ Coa</a>

        {{-- <a class="btn btn-warning" data-toggle="modal" href="#disclaimer">Disclaimer</a> --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Kode Rekening</th>
                    <th>Nama Akun</th>
                    <th>Tipe Akun</th>
                    <th>Saldo Normal</th>
                    <th>Saldo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coa as $c)
                    <tr>
                        <td>{{ $c->code }}</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->coa_types }}</td>
                        <td>{{ $c->saldo_normal }}</td>
                        <td>{{ $c->saldo_total }}</td>
                        <td><a href="#modalEdit" data-toggle="modal" class="btn btn-success"
                                onclick="getEditForm({{ $c->id }})">Edit</a></td>
                        <td>Delete</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
            <div class="modal-content">
                <div class="modal-body" id="modalCreateContent">
                    <img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" alt="Loading..."
                        style="width: 100px;">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
            <div class="modal-content">
                <div class="modal-body" id="modalEditContent">
                    <img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" alt="Loading..."
                        style="width: 100px;">
                </div>
            </div>
        </div>
    </div>

    <script>
        function getCreateForm() {
            $.ajax({
                type: 'GET',
                url: '{{ route('coa.create') }}',
                success: function(data) {
                    $('#modalCreateContent').html(data.msg.html);
                }
            });
        }


        function getEditForm(coa_id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('coa.editForm') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': coa_id
                },
                success: function(data) {
                    $('#modalEditContent').html(data.msg)
                }
            });
        }
    </script>
@endsection
