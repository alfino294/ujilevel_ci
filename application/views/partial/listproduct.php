<!-- DataTales Example -->
<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary text-center">Product</h6>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered" id="dataTable" width="100%"
												cellspacing="0">
                                                <thead>
										<tr>
											<th>ID Makanan</th>
											<th>Image</th>
											<th>Nama Makanan</th>
											<th>Harga</th>
											<th>Status masakan</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
									foreach ($masakan as $data) {
									?>
										<tr>
											<td><?= $data->id_masakan?></td>
											<td class="text-center"><img src="<?php echo base_url('assets/product/').$data->gambar;?>" width="100"></td>
											<td><?= $data->nama_masakan?></td>
											<td><?= $data->harga?></td>
											<td><?= $data->status_masakan?></td>
											
														<td class="text-center">
															<button type="button" class="btn btn-success"
																onclick="buyproduct('<?php echo $data->id_masakan?>', '<?php echo $data->nama_masakan?>', '<?php echo $data->harga?>', '<?php echo $data->gambar?>')">Buy</button>
														</td>
													</tr>
													<?php
									}
										?>
												</tbody>
											</table>
										</div>
									</div>
								</div>