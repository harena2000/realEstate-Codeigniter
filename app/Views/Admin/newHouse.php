
  
<main id="main">

<?php $validation =  \Config\Services::validation() ;?>

<!-- ======= Intro Single ======= -->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">Add new House</h1>
          <span class="color-text-a">All information is important</span>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Intro Single -->

<!-- ======= Information about the User ======= -->
<section class="agent-single">
  <div class="container">
    <div class="row" >

      <form id="form" action="<?= base_url("Admin/Newhouse/ouvrir");?>" method="post"> 
          
          <div class="row">

                <!-- Name -->
              <div class="col">
                <label for="">Name of the house</label>
                <input type="text" name="nomMaison" class="name form-control" placeholder="The House name"
                autofocus>
              </div>

              <div class="col">
                <label for="">House Address</label>
                <input type="text" name="adresseMaison" class="adresse form-control" placeholder="The house adresse"
                autofocus>
              </div>

                <!-- Ville -->
              <div class="col">
              <label for="">City of House</label>
                <input type="text" name="villeMaison" class="ville form-control" placeholder="The City of the House"
                autofocus>
              </div>

                <!-- Pays -->
              <div class="col">
                <label for="">House Country</label>
                <input type="text" name="paysMaison" class="pays form-control" placeholder="From what Country"
                autofocus>
              </div>
          </div>
            <br>
          <div class="row">
            
              <!-- Profession -->
              <div class="col">
                <label for="">Color</label>
                <input type="text" name="couleur" class="color form-control" placeholder="The house color"
                autofocus>
              </div>

              <!-- Contact -->
              <div class="col">
                <label for="">Bedroom numbrer</label>
                <input type="number" name="chambre" class="chambre form-control" placeholder="How many Rooms"
                autofocus>
              </div>

              <div class="col">
                <label for="">Bathroom number</label>
                <input type="number" name="douche" class="douche form-control" placeholder="How many Bathroom"
                autofocus>
              </div>

              <div class="col">
                <label for="">Garage number</label>
                <input type="number" name="garage" class="garage form-control" placeholder="How many Garage"
                autofocus>
              </div>
            
          </div>

          <br> 
            
          <div class="row">

              <div class="col">
                <label for="">House Area</label>
                <input type="number" name="area" class="area form-control" placeholder="How much does the house cost"
                autofocus>
              </div>

              <div class="col">
                <label for="">The price</label>
                <input type="number" name="prix" class="prix form-control" placeholder="How much does the house cost"
                autofocus>
              </div>
            
            </div>
            <br>
            <div class="row">
              <div class="col">
                <label for="">Description</label>
                <textarea name="description" class="description form-control" rows="10"></textarea>
              </div>
            </div>
          
          </div>

          <br>
            <button class="button btn btn-lg btn-success" name="save" type="submit">
            <i class="fas fa-registered" aria-hidden="true"></i>
              Register</button>

          </form>

          <br><br>

    </div>
  </div>

  <script>  

        // Input Variable
        document.querySelector('.button').onclick = function(){
          var name = document.querySelector('.name').value,
              adresse = document.querySelector('.adresse').value,
              ville = document.querySelector('.ville').value,
              pays = document.querySelector('.pays').value,
              color = document.querySelector('.color').value,
              chambre = document.querySelector('.chambre').value,
              douche = document.querySelector('.douche').value,
              garage = document.querySelector('.garage').value,
              area = document.querySelector('.area').value,
              prix = document.querySelector('.prix').value;
           
              // Name Validation
              if (name == "") {
                $(document).ready(function () {
                  alertify.set('notifier','position','top-right')
                  alertify.error('You forgot to give the House name')
                });
                return false
              } 
              
              // Adresse Validation
              else if (adresse == "") {
                $(document).ready(function () {
                  alertify.set('notifier','position','top-right')
                  alertify.error('Needed the Home adresse')
                });                
                return false
              } 

              // Ville Validation
              else if (ville == "") {
                $(document).ready(function () {
                  alertify.set('notifier','position','top-right')
                  alertify.error('City name is required')
                });                
                return false
              } 

              // Pays Validation
              else if (pays == "") {
                $(document).ready(function () {
                  alertify.set('notifier','position','top-right')
                  alertify.error('Nation name is required')
                });                
                return false
              } 

              // color Validation
              else if (color == "") {
                $(document).ready(function () {
                  alertify.set('notifier','position','top-right')
                  alertify.error('House color is needed')
                });                
                return false
              } 

              // chambre Validation
              else if (chambre < 0) {
                $(document).ready(function () {
                  alertify.set('notifier','position','top-right')
                  alertify.error('A bedroom number is required')
                });                
                return false
              } 

              // douche Validation empty
              else if (douche <= 0) {
                $(document).ready(function () {
                  alertify.set('notifier','position','top-right')
                  alertify.error('Bathroom number value invalid')
                });                
                return false
              } 
              // garage Validation Length
              else if (garage < 0) {
                $(document).ready(function () {
                  alertify.set('notifier','position','top-right')
                  alertify.error('Garage number value invalid')
                });                
                return false
              }

              // area Required
              else if (area < 0) {
                $(document).ready(function () {
                  alertify.set('notifier','position','top-right')
                  alertify.error('Area number value invalid')
                });                
                return false
              } 

              else if (prix <= 0) {
                $(document).ready(function () {
                  alertify.set('notifier','position','top-right')
                  alertify.error('Price number value invalid')
                });                
                return false
              }
              return true
          }

      </script>

</section><!-- End Agent Single -->
</main><!-- End #main -->