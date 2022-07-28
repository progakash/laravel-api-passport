<h1>People List</h1>

<table style="width:300px;border:1px solid #ccc;">
    <tr>
        <th>Name</th>
        <th>Address</th>
    </tr>
@foreach ($people as $data)


    <tr>
        <td style="border:1px solid #ccc; text-align:center">Mr. {{ $data->name }}</td>
        <td style="border:1px solid #ccc; text-align:center">{{ $data->address }}</td>
    </tr>


@endforeach
</table>