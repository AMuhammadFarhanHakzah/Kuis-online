@extends('layouts.admin')
@section('content')

<div class="d-flex align-items-center justify-content-between mb-5">
    <h4 class="text-dark">Semua Kuis</h4>
    <a href="{{route('kuis.create')}}" class="btn btn-primary">
        <i class="bx bx-plus"></i> Tambah Baru
    </a>
</div>

<div class="card border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kuis</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $key => $item)
                    <tr class="align-middle">
                        <td> {{ ++$key}} </td>
                        <td> {{ $item->quiz_name }} </td>
                        <td> {{ $item->description }} </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="admin-pertanyaan.html" class="btn btn-sm btn-info text-white">
                                    <i class="bx bx-file"></i> Pertanyaan
                                </a>
                                <a href="{{route('kuis.edit', $item->id)}}" class="btn btn-sm btn-warning text-white">
                                    <i class="bx bx-edit"></i> Edit
                                </a>
                                <form type="submit" action="{{route('kuis.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-light" onclick='return confirm("Apakah anda benar-benar ingin menghapus kuis ini?")'>
                                        <i class="bx bx-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection