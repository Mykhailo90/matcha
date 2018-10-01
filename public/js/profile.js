function btn_load(e){
  var data = new FormData(document.getElementById('uploadForm'));
  var imagefile = document.querySelector('#file');
  var csrf = $('meta[name="csrf-token"]').attr('content');
  data.file = imagefile.files[0];

  $.ajax({
      url: '/my_profile/change_avatar',
      type: 'POST',
      success: function( data ) {
        setTimeout(function() {window.location.reload();}, 1000);
  
      }       
  })
 
  

// axios.post('/my_profile/change_avatar', data, {
//   headers: {
//             'Content-Type': 'multipart/form-data',
//   }
// })
// .then(function (response) {
//   console.log(response);
//   // alert(response.data);
// })

};

  