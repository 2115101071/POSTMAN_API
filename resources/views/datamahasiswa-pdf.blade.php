<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #A0C3D2;
  color: white;
}
</style>
</head>
<body>

<h1 class="text-center">Data Mahasiswa</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Jenis Kelamin</th>
    <th>Status</th>
    <th>IPK</th>
  </tr>
  
  @php
    $no = 1;
  @endphp
  @foreach($data as $row)

  <tr>
  <td>{{$no++}}</td>
  <td>{{$row->nama}}</td>
  <td>{{$row->nim}}</td>
  <td>{{$row->jenis_kelamin}}</td>
  <td>{{$row->status}}</td>
  <td>{{$row->ipk}}</td>
  @endforeach
  </tr>
</table>
</body>
</html>
