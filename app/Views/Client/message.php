
  <main id="main">

<?php use CodeIgniter\I18n\Time; ;?>

<!-- ======= Intro Single ======= -->
<section class="intro-single" style="margin-top:-80px">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single"><?= $nameGroup ;?></h1>
          <span class="color-text-a">Chat Application</span>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Intro Single-->

<section>

    <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1">
        <div class="box-comments">
            <ul class="list-comments">

                <div id="affichage"></div>

            </ul>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="textMessage">Enter message</label>
                <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45" rows="5" required></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <button type="button" id="send" class="btn btn-a">Send Message</button>
        </div>
    </div>
    
</section>

</main><!-- End #main -->

<script src="<?= base_url("assets/fullCalendar/jquery.min.js") ;?>"></script>
<script src="<?= base_url("assets/fullCalendar/jquery-ui.min.js") ;?>"></script>

<script type="text/javascript">

    let send = document.getElementById("send")
    let msg = document.getElementById("textMessage")

$(document).ready(() => {

    setInterval(() => {
        showMsg()
    }, 500);
        
    function showMsg() {
        $.ajax({
            type:"GET",
            url: "<?= base_url("Client/Message/loadMessage") ?>",
            async: true,
            data : {nameGroup : "<?= $nameGroup ?>", email:"<?= $emailAgence ?>"},
            dataType: 'JSON',
            success: function (data) {
                
                let html = "";

                for (let index = 0; index < data.length; index++) {
                    
                    // alert(data[index].email);

                    if (data[index].email != "<?= $emailClient ?>") {
                        html += "<li>" +
                                            "<div class='comment-avatar'>" +
                                                "<img style='height:auto' src=<?= site_url('assets/img/Agence/') ?>" + data[index].pdpUser + ">" +
                                            "</div>" +
                                            "<div class='comment-details'>" +
                                                "<h5>" + data[index].email + "</h5>" +
                                                "<span>"+ data[index].dateMessage +"</span>" +
                                                "<p class='comment-description'>" +
                                                    data[index].message +
                                                "</p>" +
                                            "</div>" +
                                        "</li>"
                        
                    }

                    else {

                        html += "<li style='margin-left : 300px' class='comment-children'>" +
                                            "<div class='comment-avatar'>" +
                                                "<img style='height:auto' src=<?= site_url('assets/img/User/') ?>" + data[index].pdpUser + ">" +
                                            "</div>" +
                                            "<div class='comment-details'>" +
                                                "<h5>" + data[index].email + "</h5>" +
                                                "<span>"+ data[index].dateMessage +"</span>" +
                                                "<p class='comment-description'>" +
                                                    data[index].message +
                                                "</p>" +
                                            "</div>" +
                                        "</li>"

                    }
                    
                    $("#affichage").html(html)
                    
                }                
            }
        })
    }
        
    send.addEventListener('click',(e) => {
        e.preventDefault();


        $.ajax({
            type:"POST",
            url:"<?= base_url("Client/Message/sendMessagePage") ?>",
            dataType : "JSON",
            data: { message:msg.value, groupName: "<?= $nameGroup ?>" },
            success: (data) => {

                let html = document.getElementById("affichage");

                html.innerHTML += "<li style='margin-left : 300px' class='comment-children'>" +
                                "<div class='comment-avatar'>" +
                                    "<img src='assets/img/author-2.jpg'>" +
                                "</div>" +
                                "<div class='comment-details'>" +
                                    "<h5>" + "<?= $emailClient ?>" + "</h5>" +
                                    "<span>"+ "<?= Time::createFromDate() ?>" +"</span>" +
                                    "<p class='comment-description'>" +
                                        msg.value +
                                    "</p>" +
                                "</div>" +
                            "</li>";
                msg.value = ""
            },
            error: (err) => {
                console.log("Erreur Be");
            }
        })

    })
})
</script>

