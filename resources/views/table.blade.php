@extends('layout.template')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Shafa</td>
                        <td>23/1111</td>
                        <td>B</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Bela</td>
                        <td>23/2222</td>
                        <td>B</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Caca</td>
                        <td>23/3333</td>
                        <td>B</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
