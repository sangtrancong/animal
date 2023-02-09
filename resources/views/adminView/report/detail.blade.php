@extends('layout.admin')

@section('content')
<table id="visitTable" class="display">
    <thead>
        <tr>

            <th>Ngày</th>
            <th>Số lượng truy cập</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{date('y/m/d', strtotime($item->date));}}</td>
                <td>{{$item->count}}</td>
            </tr>
        @endforeach


    </tbody>

</table>

@endsection

