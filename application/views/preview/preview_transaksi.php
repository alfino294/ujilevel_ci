<!-- DataTales Example -->
<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h2 class="m-0 font-weight-bold text-primary text-center">Data transaksi</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
									<thead>
										<tr>
											<th>ID Transaksi</th>
											<th>ID_User</th>
											<th>ID_Order</th>
											<th>Tanggal</th>
                                            <th>Total Bayar</th>
										</tr>
									</thead>
									<tbody>
										<?php
									foreach ($transaksi as $data) {
									?>
										<tr>
											<td><?= $data->id_transaksi?></td>
											<td><?= $data->id_user?></td>
											<td><?= $data->id_order?></td>
											<td><?= $data->tanggal?></td>
                                            <td><?= $data->total_bayar?></td>
										</tr>
										<?php
									}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>