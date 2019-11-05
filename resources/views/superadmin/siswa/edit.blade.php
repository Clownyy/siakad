<!-- Modal Add -->
<div class="modal fade" id="{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel1">Updating {{$s->nama}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="text-align: left;">
				<form action="{{url('siswa/update')}}" method="POST" enctype="multipart/form-data">
					@csrf
          <input type="hidden" name="id" value="">
					<div class="form-group">
						<label class="form-control-label" for="exampleFormControlInput1">NISN</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="nisn" value="{{$s->nisn}}">
					</div>
					<div class="form-group">
						<label class="form-control-label" for="exampleFormControlInput1">NIS</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="nis" value="{{$s->nis}}">
					</div>
					<div class="form-group">
						<label class="form-control-label" for="exampleFormControlInput1">Nama</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="nama" value="{{$s->nama}}">
					</div>
					<div class="form-group">
						<label class="form-control-label" for="exampleFormControlSelect1" name="jurusan_id">Jurusan</label>
						<select class="form-control" id="exampleFormControlSelect1" name="jurusan_id" value="{{$s->jurusans->nama}}">
							@foreach($jurusans as $j)
							<option value="{{$j->id}}">{{$j->nama}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label class="form-control-label" name="kelas" for="exampleFormControlSelect1">Kelas</label>
						<select class="form-control" id="exampleFormControlSelect1" name="kelas" value="{{$s->kelas}}">
							<option>X</option>
							<option>XI</option>
							<option>XII</option>
						</select>
					</div>
					<div class="form-group">
						<label class="form-control-label" for="exampleFormControlInput1">Tempat Lahir</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="tempat_lahir" value="{{$s->tempat_lahir}}">
					</div>
					<div class="form-group">
						<label class="form-control-label" for="exampleFormControlInput1">Tanggal Lahir</label>
						<input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal_lahir"value="{{$s->tanggal_lahir}}">
					</div>
					<label class="form-control-label">Foto</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="foto" id="dropzoneBasicUpload">
						<label class="custom-file-label" for="dropzoneBasicUpload">Choose file</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end modal -->