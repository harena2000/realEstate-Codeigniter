
<main id="main">

<script href="<?= base_url("assets/crop/bootstrap.min.js") ;?>" rel="stylesheet"></script>
<link rel="stylesheet" href="<?= base_url("assets/crop/croppie.css") ;?>">
<script src="<?= base_url("assets/crop/jquery-3.5.1.slim.min.js") ;?>"></script>  
<script src="<?= base_url("assets/crop/jquery-3.5.1.min.js") ;?>"></script>  
<script src="<?= base_url("assets/crop/croppie.js") ;?>"></script>
  

<!-- ======= Intro Single ======= -->
<section style="margin-top:-100px" class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">Add Picture Information</h1>
          <span class="color-text-a">Add Picture in every Room</span>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Intro Single -->

<!-- ======= Information about the User ======= -->
<section style="margin-top:-50px" class="agent-single">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-5">
                <a href="<?= base_url("Agence/House/index/$idMaison") ?>">
                    <button class="btn btn-danger upload-result btn-lg">Return</button>  
                </a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <strong>Select Image:</strong><br>
                <input class="form-control" type="file" id="upload">
            </div>
            <div class="col">
                <strong for="">Choose Room</strong>
                <select onchange="getRoomValue()" id="roomValue" name="paysMaison" class="pays form-control">
                    <option style="color: black;" value="empty" selected>Room Name Image</option>

                    <?php if ($roomCount->chambre > $roomBedroom->countRoom) : ?>
                        <option style="color: black;" value="Bedroom" >Bedroom</option>
                    <?php endif ?> 
                    <?php if ($roomCount->cuisine > $roomKitchen->countRoom) : ?>
                        <option style="color: black;" value="Kitchen">Kitchen</option>
                    <?php endif ?>
                    <?php if ($roomCount->douche > $roomBathroom->countRoom) : ?>
                        <option style="color: black;" value="Bathroom">Bathroom</option>
                    <?php endif ?>
                    <?php if ($roomCount->garage > $roomGarage->countRoom) : ?>
                        <option style="color: black;" value="Garage">Garage</option>
                    <?php endif ?> 

                </select>
                <!-- <input class="form-control" type="text" name="roomValue" id="roomValue"> -->
            </div>
            <div class="col">
                <div class="col">
                    <br>
                    <button id="uploadButton" class="btn btn-success upload-result btn-lg" disabled><i class="fas fa-plus"></i> Save Information</button>
                </div>
                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="row">
                <div class="col text-center">
                    <div id="upload-input" style="width:1100px; height: 550px;"></div>
                </div>
            </div>
        </div>

    </div>

</section><!-- End Agent Single -->

<script type="text/javascript">

let roomValue = document.getElementById("roomValue")
let uploadButton = document.getElementById("uploadButton")

let roomName = ""

let activateButton = true

$uploadCrop = $('#upload-input').croppie({
    enableExif: true,
    viewport: {
        width: 800,
        height: 500,
        type: 'square'
    },
    boundary: {
        width: 900,
        height: 600
    }
});

let fileTypes = ['jpg', 'jpeg', 'png'];

$('#upload').on('change', function () { 

    let reader = new FileReader();
    let file = this.files[0]; 
    let fileExt = file.type.split('/')[1]; 

    if (fileTypes.indexOf(fileExt) !== -1) {
        activateButton = true
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
    } else {
        activateButton = false
        uploadButton.disabled = true
        Swal.fire({
            icon: "error",
            title: 'File not supported! ',
            text: "Choose a correct File, [ .jpg, .jpeg, .png ]"
        })
    }
  
});


function getRoomValue() {
    if (roomValue.value == "empty" || roomValue.value == null) {
        console.log("Empty Data");
        uploadButton.disabled = true
    }
    else{
        if (activateButton == false) {
            uploadButton.disabled = true
        }
        else 
        {
            uploadButton.disabled = false
            roomName = roomValue.value
            console.log(roomValue.value);
        }
    }
}

console.log(roomName);

$('.upload-result').on('click', function (ev) {
	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (response) {
		$.ajax({
            url: "<?= base_url("Agence/Addpicture/saveImage") ;?>",
            type: "POST",
            data: { "image" : response, "roomName" : roomName, "idMaison" : <?= $idMaison ?>, "lastIdImage" : <?= $lastIdImage ?>},
            success: function (data) {
                if (data.success) {
                    Swal.fire({
                        icon: data.icon,
                        title: 'Update Profil!',
                        text: data.msg
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = "<?= base_url("Agence/Addpicture/index/$idMaison") ?>"
                        }
                    })
                }
            }
		});
	});
});
</script>

</main><!-- End #main -->

