@extends('app-modal')

@section('style')
    <link href="{{ asset('/plugins/datatables/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/datatables/dataTables.responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('script')
    <script src="{{ asset('/plugins/datatables/jquery.dataTables-1.10.6.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/language/bahasa-indonesia.js') }}"></script>

@endsection

@section('content-header')
<ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i>Home</a></li>
    <!-- put another before link if exist here -->
    <li class="active">Daftar Order Trucking</li>
</ol>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h1><i class='fa fa-credit-card'></i>Daftar Order Trucking</h1>

            </div>
            <div class="box-body">
            @if ($errors->has())
                @foreach ($errors->all() as $error)
                <div class='bg-danger alert'>{!! $error !!}</div>
                @endforeach
            @endif
			<!-- start -->
            <table class="table table-condensed">
                <tr>
                    <td width="50%">
                    <table class="table table-condensed  table-bordered table-striped table-hover no-margin">
                        <tr><th width="150px">No.SJT</th><td style="font-weight: bold">{{$berangkat->idberangkat}}</td></tr>
                        <tr><th>No.Polisi</th><td>{{$berangkat->nopolisi}}</td></tr>
                        <tr>
                            <th>Supir</th>
                            <td class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle btn btn-sm btn-info">Klik di sini</a>
                                <ul class="dropdown-menu">
                                    <table class="table table-responsive table-striped table-hover">
                                        <tr><th></th><th>Nama</th><th>Telp</th></tr>
                                        <tr><th>Supir 1</th><td>{{$berangkat->supir1}}</td><td>{{$berangkat->telpsup1}}</td></tr>
                                        <tr><th>Supir 2</th><td>{{$berangkat->supir2}}</td><td>{{$berangkat->telpsup2}}</td></tr>
                                    </table>
                                </ul>
                            </td>
                        </tr>
                        <tr><th>Tot.Jml Resi</th><td align="right">{{$berangkat->getJmlResi($berangkat->idberangkat)}} resi</td></tr>
						<tr><th>Tot.Jml Muatan</th><td align="right">{{$berangkat->getJmlKoli($berangkat->idberangkat)}} koli</td></tr>
                        <tr><th>Tot.Nilai Muatan</th><td align="right">{{\App\Helpers::currency($berangkat->getNilaiMuatan($berangkat->idberangkat),2,'id')}}</td></tr>
                        <tr><th>Keterangan</th><td>{{$berangkat->ket}}</td></tr>
                    </table>
                    </td>
                    <td>
                        <table class="table table-condensed table-bordered table-striped table-hover no-margin">
                        	<tr><th>Biaya Sewa Truck</th><td align="right">{{\App\Helpers::currency($berangkat->totongkos)}}</td></tr>
	                        <tr><th>Uang Jalan</th><td align="right">{{\App\Helpers::currency($berangkat->ujln,2,'id')}}</td></tr>
	                        <tr><th>Biaya Operasional</th><td align="right">{{\App\Helpers::currency($berangkat->biayaopr,2,'id')}}</td></tr>
	                        <tr><th>Sisa Biaya Berangkat</th><td align="right">{{\App\Helpers::currency($berangkat->sisabb,2,'id')}}</td></tr>
                        </table>
                    </td>
                </tr>
            </table>			

			<div class="text text-info"><h6><i>* Ketikan semua hal yang ingin dicari</i></h6></div>
			<div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="input-group-btn">
					<button class="btn btn-info">Pencarian <i class="fa fa-search"></i></button>
				</div>
				<input id="cari" type="text" class="form-control"/>
				<div class="input-group-btn">
					<button class="btn btn-info"><i class="fa fa-calendar"></i></button>
				</div>
			</div>&nbsp;
			<div class="text text-info pull-right"><h6><i>* Klik untuk melihat rincian</i></h6></div>
			<div class="panel-group" id="rute" role="tablist">
				@foreach($data as $i=>$d)
				<div class="panel panel-{{$d['rute']->status<3?'danger':'success'}}">
					<div class="panel-heading" id="heading{{$i}}" role="tab">
						<div class="panel-title">
							<a href="#tab{{$i}}" role="button" data-toggle="collapse" data-parent="#rute">
								<b>Asal :</b> {{$d['rute']->cabasal->nama}}
								<i class="fa fa-caret-right"></i>
								<b>Tujuan :</b> {{$d['rute']->cabtujuan->nama}}
								( <b>Isi :</b> {{$d['rute']->getJmlResi($d['rute']->sjt,$d['rute']->id)}} resi / 
										{{$d['rute']->getJmlKoli($d['rute']->sjt,$d['rute']->id)}} koli
								  <b>Nilai Muatan:</b> {{\App\Helpers::currency($d['rute']->getNilaiMuatan($d['rute']->sjt,$d['rute']->id),2,'id')}})
							</a>
							
						</div>
					</div>
					<div id="tab{{$i}}" role="tabpanel" class="panel-collapse collapse">
						<div class="panel-body">
							<table class="table table-responsive table-nowrap table-condensed table-bordered">
								<tr><th width="100">Tgl Berangkat</th><td>{{\App\Helpers::dateFromMySqlSystem($d['rute']->tglbrkt)}}</td></tr>
								<tr><th>Tgl Tiba</th><td>{{\App\Helpers::dateFromMySqlSystem($d['rute']->tgltiba)}}</td></tr>
								<tr><th>Status</th><td>{{$d['rute']->status<3?'Perjalanan':'Complete'}}</td></tr>
							</table>
							<table class="datatable display table-responsive">
								<tbody>
									@foreach($d['resi'] as $r)
									<tr>
										<td>{{$r->noresi}}</td>
										<td>{{\App\Helpers::dateFromMySqlSystem($r->tglresi)}}</td>
										<td>{{$r->pengirim->nama}}</td>
										<td>{{$r->penerima->nama}}</td>
										<td align="right">{{$r->getJmlKoli($r->noresi)}}</td>
										<td align="right">{{\App\Helpers::currency($r->totalbiaya,2)}}</td>
									</tr>
									@endforeach
								</tbody>
								<thead>
									<tr>
										<th>No.Resi</th>
										<th>Tgl.Resi</th>
										<th>Pengirim</th>
										<th>Penerima</th>
										<th align="right">Jml Koli</th>
										<th align="right">Nilai Muatan</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<!-- stop -->
			<div class="well">
				<b><h5>Legend:</h5></b>
				<div class="label label-danger">Belum Tiba</div>
				<div class="label label-success">Sudah Tiba</div>
			</div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
$(document).ready(function(){
	jQuery.fn.dataTableExt.oApi.fnFilterAll = function(oSettings, sInput, iColumn, bRegex, bSmart) {
	    var settings = $.fn.dataTableSettings;

	    for ( var i=0 ; i<settings.length ; i++ ) {
	      settings[i].oInstance.fnFilter( sInput, iColumn, bRegex, bSmart);
	    }
	};

	var table =	$('.datatable').dataTable({
		"dom" : "tp",
		"responsive":true,
		"displayLength":5,
		"aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
		"pagingType":"full",
		"language": language
	});
    $("#cari").keyup( function () {
      // Filter on the column (the index) of this element
      if(this.value){
      	$('.collapse').collapse('show');
      }else{
      	$('.collapse').collapse('hide');
      }
      table.fnFilterAll(this.value);
    } );
})

</script>
@endsection