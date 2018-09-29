function btn_load(e){
  var data = new FormData(document.getElementById('uploadForm'));
  var imagefile = document.querySelector('#file');
  data.append('file', imagefile.files[0]);
  

axios.post('/my_profile/change_avatar', data, {
  headers: {
            'Content-Type': 'multipart/form-data',
  },
  method: 'post',
})
.then(function (response) {
  location.reload();
})

};

  