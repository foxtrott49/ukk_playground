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

						<?php  if(session()->get('level')== 1){ ?>
						<a  href="<?= base_url('/Playground/pajak_pembelian_tiket' )?>" class="mx-2">
							        <button type="button" class="btn btn-warning">
							            Pajak
							        </button>
							    </a>
								<?php  }else{}?>

				        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
				            <div class="modal-dialog modal-xl">
				                <div class="modal-content">
				                    <div class="modal-header">
				                        <h4 class="modal-title">Apakah anda yakin ingin menambah data ini?</h4>
				                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				                    </div>
									<form id="imageForm" class="form-horizontal form-label-left" action="<?= base_url('Playground/tambah_pembelian_tiket')?>" method="post">
									    <div class="modal-body">
									        <div class="row">
									            <div class="mb-3 col-md-6">
									                <label class="form-label">Nama Permainan<span style="color: black;"> :</span></label>
									                <select name="id_permainan" class="form-control text-capitalize" id="id_permainan" required autocomplete="on" onchange="updateTotalHarga()">
									                    <option disabled selected>Pilih Nama Permainan</option>
									                    <?php foreach ($p as $permainan) {?>
									                        <option class="text-capitalize" value="<?php echo $permainan->id_permainan ?>" data-harga="<?php echo $permainan->harga_permainan ?>"><?php echo $permainan->nama_permainan ?> - Rp <?php echo $permainan->harga_permainan ?>,00</option>
									                    <?php } ?>
									                </select>
									            </div>
									            <div class="mb-3 col-md-6">
									                <label class="form-label">Nama Anak<span style="color: black;"> :</span></label>
									                <input type="text" id="nama_anak" name="nama_anak" class="form-control text-capitalize" placeholder="Nama Anak" autocomplete="on">
									            </div>
												<div class="mb-3 col-md-6">
									                <label class="form-label">Nama Orang Tua<span style="color: black;"> :</span></label>
									                <input type="text" id="nama_ortu" name="nama_ortu" class="form-control text-capitalize" placeholder="Nama Orang Tua" autocomplete="on">
									            </div>
									            <div class="mb-3 col-md-6">
									                <label class="form-label">Durasi<span style="color: black;"> :</span></label>
									                <input type="text" id="durasi" name="durasi" class="form-control text-capitalize" placeholder="Durasi" oninput="Durasi(this); updateTotalHarga()" autocomplete="on">
									            </div>
												<div class="mb-3 col-md-6">
									                <label class="form-label">Pajak<span style="color: black;"> :</span></label>
									                <div class="input-group mb-3 input-basic">
									                    <input readonly type="text" id="pajak" name="pajak" class="form-control text-capitalize" placeholder="Pajak" value="<?= $pajak->persen_pajak?>" autocomplete="on">
									                    <span class="input-group-text">%</span>
									                </div>
									            </div>
									            <div class="mb-3 col-md-6">
									                <label class="form-label">Total Harga<span style="color: black;"> :</span></label>
									                <div class="input-group mb-3 input-basic">
									                    <span class="input-group-text">Rp</span>
									                    <input readonly type="text" id="total_harga" name="total_harga" class="form-control text-capitalize" placeholder="Total Harga" autocomplete="on">
									                    <span class="input-group-text">,00</span>
									                </div>
									            </div>
									        </div>
									        <div class="modal-footer">
									            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Kembali</button>
									            <button type="submit" class="btn btn-success">Iya, Tambah</button>
									        </div>
									    </div>
									</form>
									<script>
								    function Durasi(input) {
									    let value = input.value.replace(/\D/g, '');
									    value = value.substring(0, 2);
									    input.value = value !== '' ? value : '';
									    updateTotalHarga();
									}

								    function updateTotalHarga() {
								        var selectedOption = document.getElementById('id_permainan');
								        var selectedOptionIndex = selectedOption.selectedIndex;

								        var durationInput = document.getElementById('durasi');
								        var durationValue = durationInput.value.replace(/\D/g, '');

										var tax = document.getElementById('pajak').value;

										

								        if (selectedOptionIndex !== -1 && durationValue !== '' && tax !=='') {
								            var hargaPermainan = selectedOption.options[selectedOptionIndex].getAttribute('data-harga');

											var percent = parseInt(tax) / 100;

											var totalHarga = parseInt(hargaPermainan) * parseInt(durationValue);

											var jumlahPajak = totalHarga * percent;

											var total = totalHarga + jumlahPajak;
											console.log(totalHarga);
								            var totalHargaInput = document.getElementById('total_harga');
								            totalHargaInput.value = total;
											console.log(durationValue);
											console.log(hargaPermainan);
											console.log(percent);
											console.log(jumlahPajak);
											
								        } else {
								            var totalHargaInput = document.getElementById('total_harga');
								            totalHargaInput.value = '';
								        }
								    }

								    function formatCurrency(amount) {
										return new Intl.NumberFormat('id-ID', { maximumFractionDigits: 0 }).format(Number(amount));

									}
									</script>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>

				<table id="bootstrap-data-table" class="table table-striped table-bordered">					<thead>
						<tr>
							<th style="text-align: center;" width="1000px">No.</th>
							<th style="text-align: center;" width="1000px">Nama Permainan</th>
							<th style="text-align: center;" width="1000px">Nama Anak</th>
							<th style="text-align: center;" width="1000px">Nama Orang Tua</th>
							<th style="text-align: center;" width="1000px">Durasi</th>
							<th style="text-align: center;" width="1000px">Total Harga</th>
							<th style="text-align: center;" width="1000px">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
                    $no=1;
                    foreach ($data as $dataa){?>
						<tr>
							<td style="text-align: center;" class="text-capitalize"><?php echo $no++ ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_permainan ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_anak ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_ortu ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->durasi ?> Jam</td>
							<td style="text-align: center;" class="text-capitalize">Rp <?php echo number_format($dataa->total_harga) ?></td>
							<td>
							<div class="text-center mb-1">
							<a target="_blank" href="<?= base_url('/Playground/print_pembelian_tiket/'.$dataa->id_playground )?>" class="mx-2">
							        <button type="button" class="btn btn-warning">
							            <i class="ti-solid ti-receipt"></i>
							        </button>
							    </a>
							    <a onclick="openDeleteModal('<?= base_url('/Playground/hapus_pembelian_tiket/'.$dataa->id_playground )?>')" class="mx-2">
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
