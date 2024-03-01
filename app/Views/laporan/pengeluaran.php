<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				    <div class="d-flex justify-content-between align-items-center mb-3">
				        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target=".bd-example-modal-lg">
						<i class="ti-solid ti-plus"></i> Tambah
					</button>
</div>

					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-xl">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Apakah anda yakin ingin menambah data pengeluaran?</h4>
									<button type="button" class="btn-close" data-dismiss="modal"></button>
								</div>
								<form id="imageForm" class="form-horizontal form-label-left" action="<?= base_url('laporan/tambah_pengeluaran')?>" method="post">
									<div class="modal-body">
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label">Tujuan Pengeluaran<span style="color: black;"> :</span></label>
												<input type="text" id="tujuan_pengeluaran" name="tujuan_pengeluaran" class="form-control text-capitalize" placeholder="Tujuan Pengeluaran" autocomplete="on">
											</div>
											
											<div class="mb-3 col-md-6">
													<label class="form-label">Jumlah Pengeluaran<span style="color: black;"> :</span></label>    
													<div class="input-group mb-3 input-basic">
														<span class="input-group-text">Rp</span>
														<input type="text" id="jumlah_pengeluaran" name="jumlah_pengeluaran" class="form-control text-capitalize" placeholder="Jumlah Pengeluaran" oninput="validateNumberInput(this)" autocomplete="on">
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
										<button type="button" class="btn btn-danger light" data-dismiss="modal">Kembali</button>
										<button type="submit" class="btn btn-success">Iya, Tambah</button>
									</div>
								</form>
							</div>
						</div>
					</div>


				<!-- Reset Password Modal -->
				<div class="modal fade" id="reset_password_modal" tabindex="-1" role="dialog" aria-labelledby="resetPasswordLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="resetPasswordLabel">Reset Password</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<p>Apakah anda yakin ingin mereset password pada data ini?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<a id="reset_password_link" href="#" class="btn btn-primary">Reset Password</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Delete Confirmation Modal -->
				<div class="modal fade" id="delete_confirmation_modal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="deleteConfirmationLabel">Delete Confirmation</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<p>Apakah anda yakin ingin menghapus data ini?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<a id="delete_link" href="#" class="btn btn-danger">Hapus</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Table -->
				<table id="bootstrap-data-table" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th style="text-align: center;" width="100px">No.</th>
							<th style="text-align: center;" width="100000px">Tujuan Pengeluaran</th>
							<th style="text-align: center;" width="100000px">Jumlah Pengeluaran</th>
                            <th style="text-align: center;" width="100000px">Tanggal Pengeluaran</th>
                            <th style="text-align: center;" width="100000px">Maker</th>
							<th style="text-align: center;" width="100000px">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php $noo = 1;?>
						<?php foreach ($data as $dataa): ?>
						<tr>
							
							<td style="text-align: center;" class="text-capitalize"><?= $noo++ ?></td>
							<td style="text-align: center;" class="text-capitalize"><?= $dataa->tujuan_pengeluaran ?></td>
							<td style="text-align: center;" class="text-capitalize">Rp <?= number_format($dataa->jumlah_pengeluaran) ?></td>
                            <td style="text-align: center;" class="text-capitalize"><?= $dataa->tanggal_pengeluaran ?></td>
                            <td style="text-align: center;" class="text-capitalize"><?= $dataa->nama_pegawai ?></td>
							<td>
								<div class="text-center mb-1">
									
									
									<button type="button" class="btn btn-danger" onclick="openDeleteModal('<?= base_url('/laporan/hapus_pengeluaran/'.$dataa->id_pengeluaran)?>')">
										Delete
									</button>
								</div>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

				<!-- JavaScript to Handle Modals -->
				<script>
					function openResetModal(resetLink) {
						document.getElementById('reset_password_link').href = resetLink;
						$('#reset_password_modal').modal('show');
					}

					function openDeleteModal(deleteLink) {
						document.getElementById('delete_link').href = deleteLink;
						$('#delete_confirmation_modal').modal('show');
					}
				</script>

		</div>
	</div>
</div>
