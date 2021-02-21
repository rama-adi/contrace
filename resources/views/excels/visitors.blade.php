<table>
    <thead>
    <tr>
        <th>Waktu kunjungan</th>
        <th>Nama</th>
        <th>Nomor telepon</th>
        <th>Pendamping</th>
        <th>Lokasi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($visitors as $visitor)
        <tr>
            <td>{{$visitor->created_at}}</td>
            <td>{{$visitor->name}}</td>
            <td>(+62){{$visitor->phone_no}}</td>
            <td>{{$visitor->people_amount < 2 ? "Sendiri" : $visitor->people_amount}}</td>
            <td>{{$visitor->pos_lat}},{{$visitor->pos_long}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
