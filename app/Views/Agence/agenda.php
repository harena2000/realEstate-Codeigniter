
<link rel="stylesheet" href="<?= base_url("assets/fullCalendar/all.css") ;?>">
<link rel="stylesheet" href="<?// base_url("assets/fullCalendar/bootstrap.css") ;?>">
<link rel="stylesheet" href="<?= base_url("assets/fullCalendar/fullcalendar.css") ;?>">

<main id="main">

    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Agenda</h1>
              <span class="color-text-a">Full calendar</span>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
            <div id="calendar"></div>
        </div>
      </div>

<script src="<?= base_url("assets/fullCalendar/jquery.min.js") ;?>"></script>
<script src="<?= base_url("assets/fullCalendar/jquery-ui.min.js") ;?>"></script>
<script src="<?= base_url("assets/fullCalendar/moment.min.js") ;?>"></script>

<script src="<?= base_url("assets/fullCalendar/fullcalendar.min.js") ;?>"></script>

<script type="text/javascript">
    
    let calendar = $('#calendar').fullCalendar({
        themeSystem : "bootstrap",
        editable:true,
        eventTextColor:"white",
        style:"red",
        header:{
            rigth:'prev,next,today',
            center:'title',
            left: 'month,agendaWeek,agendaDay,listMonth'
        },
        events:"<?= site_url("Agence/Agenda/load")?>",
        selectable:true,
        selectHelper:true,
        select:function (start, end, allDay) {
            Swal.fire({
                title: 'Add event Description',
                input: 'textarea',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Save',
                showLoaderOnConfirm: true,
                preConfirm: (title) => {
                    if (title) {
                        let getStartValue = moment(start, 'DD.MM.YYYY HH.mm.ss').format('YYYY-MM-DD HH:mm:ss')
                        let getEndValue = moment(end, 'DD.MM.YYYY HH.mm.ss').format('YYYY-MM-DD HH:mm:ss')

                        $.ajax({
                            url:"<?= base_url("Agence/Agenda/insert") ?>",
                            type:'POST',
                            data:{ title:title, start:getStartValue, end:getEndValue },
                            success:function(data) {
                                calendar.fullCalendar("refetchEvents")
                            }
                        })
                    }
                },

                allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                        icon: 'success',
                        title: 'Added in successfully'
                        })
                    }
                })
        },
        editable:true,
        eventResize:function(event)
        {
            let getStartValue = moment(event.start, 'DD.MM.YYYY HH.mm.ss').format('YYYY-MM-DD HH:mm:ss')
            let getEndValue = moment(event.end, 'DD.MM.YYYY HH.mm.ss').format('YYYY-MM-DD HH:mm:ss')

            let title = event.title;
            let id = event.id;

            $.ajax({
                url:"<?= base_url("Agence/Agenda/update") ?>",
                type:"POST",
                data:{title:title, start:getStartValue, end:getEndValue, id:id},
                success:function(data)
                {
                    calendar.fullCalendar('refetchEvents');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: 'Updated in successfully'
                    })
                }
            })
        },
        eventDrop:function(event)
        {
            let getStartValue = moment(event.start, 'DD-MM-YYYY HH.mm.ss').format('YYYY-MM-DD HH:mm:ss')
            let getEndValue = moment(event.end, 'DD-MM-YYYY HH.mm.ss').format('YYYY-MM-DD HH:mm:ss')

            let title = event.title;
            let id = event.id;

            $.ajax({
                url:"<?= base_url("Agence/Agenda/update") ?>",
                type:"POST",
                data:{title:title, start:getStartValue, end:getEndValue, id:id},
                success:function(data)
                {
                    calendar.fullCalendar('refetchEvents');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: 'Updated in successfully'
                    })
                }
            })
        },
        eventClick:function(event){
                
            Swal.fire({
                    title: 'Action Event!',
                    text: "What do you like to do?",
                    icon: 'question',
                    showCancelButton: true,
                    showDenyButton:true,
                    confirmButtonColor:"#d33",
                    cancelButtonColor: 'gray',
                    denyButtonColor:"#3085d6",
                    denyButtonText: '<i class="fas fa-edit"></i> Update',
                    confirmButtonText: '<i class="fas fa-trash"></i>',
            }).then((result) => {

                // If User Choose to delete his Information
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((res) => {
                        if (res.isConfirmed) {
                            let id = event.id;
                            $.ajax({
                                url:"<?= base_url("Agence/Agenda/delete") ?>",
                                type:"POST",
                                data:{id:id},
                                success:function()
                                {
                                    calendar.fullCalendar('refetchEvents');
                                    const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                        }
                                    })
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Event is deleted!'
                                    })
                                }
                            })
                        }
                    })
                }

                // If User Choose to Update his Information
                else if(result.isDenied){
                    Swal.fire({
                        title: 'Update event Description',
                        input: 'text',
                        inputAttributes: {
                            autocapitalize: 'off'
                        },
                        inputValue: event.title,
                        showCancelButton: true,
                        confirmButtonText: 'Save',
                        showLoaderOnConfirm: true,
                        preConfirm: (title) => {
                            if (title) {
                                let getStartValue = moment(event.start, 'DD.MM.YYYY HH.mm.ss').format('YYYY-MM-DD HH:mm:ss')
                                let getEndValue = moment(event.end, 'DD.MM.YYYY HH.mm.ss').format('YYYY-MM-DD HH:mm:ss')
                                let id = event.id
                                $.ajax({
                                    url:"<?= base_url("Agence/Agenda/update") ?>",
                                    type:'POST',
                                    data:{ title:title, start:getStartValue, end:getEndValue, id:id },
                                    success:function(data) {
                                        calendar.fullCalendar("refetchEvents")
                                    }
                                })
                            }
                        },

                        allowOutsideClick: () => !Swal.isLoading()
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                        }
                                })
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Updated in successfully'
                                })
                            }
                        })
                }
            })
        }
    });

    
</script>

</main>