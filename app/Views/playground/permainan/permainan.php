<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<div class="container mt-4">
				    <div class="d-flex justify-content-between align-items-center mb-3">
				        <h1></h1>
				        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
							<i class="ti-solid ti-plus"></i> Tambah
						</button>

						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-xl">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Apakah anda yakin ingin menambah data ini?</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
									</div>
									<form id="imageForm" class="form-horizontal form-label-left" action="<?= base_url('Playground/tambah_permainan')?>" method="post">
										<div class="modal-body">
											<div class="row">
												<div class="mb-3 col-md-6">
													<label class="form-label">Nama Permainan<span style="color: black;"> :</span></label>
													<input type="text" id="nama_permainan" name="nama_permainan" class="form-control text-capitalize" placeholder="Nama Permainan" autocomplete="on">
												</div>
												<div class="mb-3 col-md-6">
													<label class="form-label">Harga Permainan /Jam<span style="color: black;"> :</span></label>    
													<div class="input-group mb-3 input-basic">
														<span class="input-group-text">Rp</span>
														<input type="text" id="harga_permainan" name="harga_permainan" class="form-control text-capitalize" placeholder="Harga Permainan /Jam" oninput="validateNumberInput(this)" autocomplete="on">
													</div>
												</div>
												<script>
													function validateNumberInput(input) {
														let value = input.value.replace(/\D/g, '');

														let formattedValue = newIntl.NumberFormat('id-ID', { maximumFractionDigits: 0 }).format(Number(value));

														input.value = formattedValue;
													}
												</script>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Kembali</button>
											<button type="submit" class="btn btn-success">Iya, Tambah</button>
										</div>
									</form>
								</div>
							</div>
						</div>

				    </div>
				</div>

				<table id="bootstrap-data-table" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th style="text-align: center;" width="100px">No.</th>
							<th style="text-align: center;" width="10000px">Nama Permainan</th>
							<th style="text-align: center;" width="10000px">Harga Permainan</th>
							<th style="text-align: center;" width="10000px">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
                    $no=1;
                    foreach ($data as $dataa){?>
						<tr>
							<td style="text-align: center;" class="text-capitalize"><?php echo $no++ ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_permainan ?></td>
							<td style="text-align: center;" class="text-capitalize">Rp <?php echo number_format($dataa->harga_permainan)?>/Jam</td>
							<td>
							<div class="text-center mb-1">
							    <a href="<?= base_url('/Playground/edit_permainan/'.$dataa->id_permainan )?>" class="mx-2">
							        <button class="btn btn-warning">
							            <i class="ti-regular ti-pencil-alt"></i>
							        </button>
							    </a>
							    <a onclick="openDeleteModal('<?= base_url('/Playground/hapus_permainan/'.$dataa->id_permainan )?>')" class="mx-2">
							        <button type="button" class="btn btn-danger">
							            <i class="ti-solid ti-trash"></i>
							        </button>
							    </a>
							</div>
                            </td>
							<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                            <div class="modal fade" id="delete_petugas" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
							    <div class="modal-dialog modal-dialog-centered" role="document">
							        <div class="modal-content">
							            <div class="modal-header">
							                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
							            </div>
							            <div class="modal-body text-center">
							                <i class="ti-solid ti-triangle-exclamation" style="font-size: 80px; color: #FFA500;"></i>
							                <h1></h1><br>
							                <h5>Apakah anda yakin ingin menghapus data ini?</h5>
							            </div>
							            <div class="modal-footer">
							                <button type="button" class="btn btn-secondary light" data-bs-dismiss="modal">Kembali</button>
							                <a id="deleteLinkPetugas" href="#">
							                    <button type="button" class="btn btn-danger">Iya, Hapus</button>
							                </a>
							            </div>
							        </div>
							    </div>
							</div>
							<script>
							    function openDeleteModal(deleteLink) {
							        document.getElementById('deleteLinkPetugas').href = deleteLink;
							        $('#delete_petugas').modal('show');
							    }
							</script>
						</tr>
                    <?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
