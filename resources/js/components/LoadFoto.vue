<template>
    <div class="container">
    
        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Download your avatar : </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                       <form id="uploadForm" method="post">

                        <div class="modal-body">
                            <input class="btn btn-primary" id="file" type="file" name="image">
                        </div>
      
                        <div class="modal-footer">
                            <button id="load_foto" type="submit" class="btn btn-primary" onclick="btn_load();">Load</button>
                        </div>
                    </form>
    </div>
</template>

<script>
    window.onload = function(){
        const app = new Vue({
        el: '#app',
        });
    }
</script>
