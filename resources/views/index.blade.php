@extends('layout')

@section('content')
<div class="container d-flex justify-content-center mt-100 mb-100">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Plants Report<br><small class="text-muted">all of plants report</small>
                        </h4>
                        <div>
                            <a href="{{route('plants.create')}}" class="btn btn-primary">Create</a>
                        </div>
                    </div>
                    @if (session('add'))
                        <div class="alert alert-success">
                            {{ session('add') }}
                        </div>
                    @endif
                    @if (session('update'))
                        <div class="alert alert-success">
                            {{ session('update') }}
                        </div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-warning">
                            {{ session('delete') }}
                        </div>
                    @endif
                </div>
                <div class="bg-light p-20">
                    <div class="d-flex">
                        <div class="align-self-center">
                            <h3 class="m-b-0">Total plants</h3>
                        </div>
                        <div class="ml-auto align-self-center">
                            <h2 class="text-success">{{$plants->count()}}</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover earning-box">
                            <thead>
                                <tr>
                                    <th colspan="2">Kode & Name</th>
                                    <th>Type</th>
                                    <th>Growth</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plants as $plant)
                                    <tr>
                                        <td><a href="{{route('plants.edit', $plant['id'])}}"
                                                class="round round-success">{{$plant['kode_plant']}}</a></td>
                                        <td>
                                            <h6>{{$plant['name']}}</h6><small
                                                class="text-muted">{{$plant['additional']}}</small>
                                        </td>
                                        <td><span class="label label-primary">{{$plant['type']}}</span></td>
                                        <td>
                                            @if ($plant['growth'] != NULL)
                                                @foreach (json_decode($plant['growth'], true) as $item)
                                                    {{$item['growth']}} : {{$item['tanggal']}}<br>
                                                @endforeach
                                            @else
                                                -
                                            @endif

                                        </td>

                                        <td class="d-flex">
                                            <div class="mr-2">
                                                <a href="{{route('plants.edit', $plant['id'])}}"
                                                    class="fa-solid fa-file-pen text-primary"></a>
                                            </div>
                                            <form action="{{route('plants.destroy', $plant['id'])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="fa-solid fa-trash text-danger btn btn-outline-none"
                                                    style="padding:  0 !important"></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection