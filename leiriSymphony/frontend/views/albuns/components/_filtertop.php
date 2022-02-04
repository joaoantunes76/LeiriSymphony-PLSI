<?php

/* @var $page */

?>

<div class="row">
    <div class="col">
        <form>
        <label for="albumNome">Album</label>
        <input type="search" class="form-control" id="albumNome" name="albumNome">
        </form>
    </div>
    <div class="col">
        <form>
        <label for="artistaNome">Artista</label>
        <input type="search" class="form-control" id="artistaNome" name="artistaNome">
        </form>
    </div>
    <div>
        <br>
        <a href="#"><button onclick="filtrar()" class="btn btn-primary mt-2 pl-5 pr-5"  id="filtrarbtn">Filtrar</button></a>
    </div>
</div>

<script>

    function filtrar(){
        var album = document.getElementById("albumNome").value;
        var artista = document.getElementById("artistaNome").value;
        var link = "";

        let path = window.location.href.split('?')[0]

        if(album === "" && artista === ""){
            link = path;
        }
        else {
            if (album !== "") {
                link += "?albumNome=" + album;
            }
            if (artista !== "") {
                if (album !== "") {
                    link += "&artistaNome=" + artista
                } else {
                    link += "?artistaNome=" + artista
                }
            }
        }
        window.location = link;
    }
</script>
