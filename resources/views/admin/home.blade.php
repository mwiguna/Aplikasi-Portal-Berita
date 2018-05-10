@extends('layouts.admin')
@section('content')

	<div class="col-10 col-lg-8 main-admin">
		<div class="title-admin">Visitor</div>
		<table class="col-6" style="margin-bottom: 19%" border="1px">
			<tr>
				<td width="50%">Hari ini</td>
				<td>{{ $hari }}</td>
			</tr>
			<tr>
				<td>Bulan ini</td>
				<td>{{ $bulan }}</td>
			</tr>
			<tr>
				<td>Total</td>
				<td>{{ $total }}</td>
			</tr>
		</table>
	</div>

@endsection