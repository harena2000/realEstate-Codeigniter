
<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?= $nameGroup ;?></h1>
              <span class="color-text-a">Add members to the group</span>
            </div>
            <a href="<?= base_url("Agence/Message/index/$nameGroup/$emailAgence") ?>">
              <button type="button" class="btn btn-danger">Return</button>
            </a>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Full Name</th>
						<th scope="col">Email</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($client as $item) : ?>
						<tr>
						<td scope="row"><?= $item->nomClient . " " . $item->prenomClient ;?></td>
						<td><?= $item->emailClient ;?></td>
                        <td>
                            <a href="<?= base_url("Agence/Ajoutermembre/ajouter/$item->emailClient/$nameGroup") ?>">
                                <button type="button" class="btn btn-outline-primary"><i class="fas fa-user-plus" aria-hidden="true"></i> Add</button>
                            </a>
                        </td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
      </div>
    </section><!-- End Property Single-->

  </main><!-- End #main -->

  