
<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Payment History</h1>
              <span class="color-text-a">List of all my money transfers</span>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
			<table class="table table-hover">
				<thead style="background-color: #26A356;color:white;">
					<tr>
						<th scope="col">Payment Date</th>
						<th scope="col">House Name</th>
						<th scope="col">Adresse House</th>
						<th scope="col">Money Deposit</th>
						<th scope="col">Facture</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($history as $item) : ?>
						<tr>
						<td scope="row"><?= $item->dateDepot ;?></td>
						<td><?= $item->nomMaison ;?></td>
						<td><?= $item->adresseMaison .", ". $item->villeMaison ." - ". $item->nomPays ;?></td>
						<td><?= $item->depot ;?></td>
						<td>
							<a href="<?= base_url("Client/Facture")?>">
								<button type="button" class="btn btn-outline-warning">Show</button>
							</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
      </div>
    </section><!-- End Property Single-->

  </main><!-- End #main -->

  