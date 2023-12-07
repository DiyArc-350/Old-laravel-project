// sweetalert

const swal = $('.swal').data('swal');
if(swal){
    Swal.fire({
        title : 'Berhasil',
        text : swal,
        icon : success
    })
}

$(document).on('click', '#del-btn',function(e){
    // hentikan default action
    e.preventDefault();
    const href = $(this).attr('href');

    let title = $(this).data('title');   
    let text = $(this).data('text');   
    let icon = $(this).data('icon');

    $("#popup-btn").val("title");
    $("#popup-btn").val("text");
    $("#popup-btn").val("icon");

    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = href;
        }
      })
})



$(document).on('click', '#conf-btn',function(e){
  // hentikan default action
  e.preventDefault();
  const href = $(this).attr('href');

  let title = $(this).data('title');   
  let text = $(this).data('text');   
  let icon = $(this).data('icon');

  $("#popup-btn").val("title");
  $("#popup-btn").val("text");
  $("#popup-btn").val("icon");

  Swal.fire({
      title: title,
      text: text,
      icon: icon,
      showCancelButton: true,
      confirmButtonColor: '#00C851',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Proceed'
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = href;
      }
    })
})

// search select

$(document).ready(function() {
  $('.search-select').selectpicker();
} );



// data tabless

$(document).ready(function() {
  $('#report_app').DataTable({
    "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
    "ordering": false,
    // "info":     false
  });
} );

$(document).ready(function() {
  $('#more_data').DataTable({
    "lengthMenu": [[10, 15, 20, -1], [10, 15, 20, "All"]],
    "ordering": false,
    // "info":     false
  });
} );


$(document).ready(function() {
  $('#example').DataTable();
} );


// edit modal menu
$(document).on("click", "#btnedit",function(){
  let id = $(this).data('id');
  let jenis = $(this).data('jenis');
  let nama = $(this).data('nama');
  let harga = $(this).data('harga');

  $('.modal-body #id_menu').val(id);
  $('.modal-body #jenis').val(jenis);
  $('.modal-body #nama').val(nama);
  $('.modal-body #harga').val(harga);
});



