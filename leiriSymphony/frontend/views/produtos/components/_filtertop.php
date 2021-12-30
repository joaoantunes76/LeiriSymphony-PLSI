<?php
/* @var $marcas common\models\Marcas */
/* @var $categorias common\models\Categorias */
/* @var $subcategorias common\models\Subcategorias */

use yii\helpers\Url;

?>
<div class="row">
    <div class="col">
        <label for="selectMarcas">Marcas</label>
        <select name="Marca" class="form-control" id="selectMarcas">
            <option value="-1">Marca...</option>
            <?php
            foreach ($marcas as $marca) {
                if(isset($_GET["Marca"])){
                    $marcaGet = $_GET["Marca"];
                }
                else {
                    $marcaGet = -1;
                }
                ?>
                <option <?= $marcaGet == $marca->id ? "selected" : ""  ?> value="<?= $marca->id ?>"><?= $marca->nome ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="col">
        <label for="selectCategorias">Categorias</label>
        <select name="Categoria" class="form-control" id="selectCategorias">
            <option value="-1">Categorias...</option>
            <?php
            foreach ($categorias as $categoria) {
                if(isset($_GET["Categoria"])){
                    $categoriasGet = $_GET["Categoria"];
                }
                else {
                    $categoriasGet = -1;
                }
                ?>
                <option <?= $categoriasGet == $categoria->id ? "selected" : ""  ?> value="<?= $categoria->id ?>"><?= $categoria->nome ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="col">
        <label for="selectSubcategorias">Subcategorias</label>
        <select name="Subcategoria" class="form-control" id="selectSubcategorias">
        <option value="-1">Subcategorias...</option>
            <?php
            foreach ($subcategorias as $subcategoria) {
                if(isset($_GET["Subcategoria"])){
                    $subcategoriasGet = $_GET["Subcategoria"];
                }
                else {
                    $subcategoriasGet = -1;
                }
                ?>
                ?>
                <option <?= $subcategoriasGet == $subcategoria->id ? "selected" : ""  ?> value="<?= $subcategoria->id ?>"><?= $subcategoria->nome ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div>
        <br>
        <button onclick="filtrar()" class="btn btn-primary mt-2 pl-5 pr-5" >Filtrar</button>
    </div>
</div>

<script>
    function filtrar(){
        var marca = document.getElementById("selectMarcas").value;
        var categoria = document.getElementById("selectCategorias").value;
        var subcategoria = document.getElementById("selectSubcategorias").value;

        var link = "";

        if(marca == -1 && categoria == -1 && subcategoria == -1){
            window.history.pushState({}, document.title, "/" + "produtos/index");
        }
        else {
            if (marca > -1) {
                link += "?Marca=" + marca;
            }
            if (categoria > -1) {
                if (link != "") {
                    link += "&Categoria=" + categoria
                } else {
                    link += "?Categoria=" + categoria
                }
            }
            if (subcategoria > -1) {
                if (link != "") {
                    link += "&Subcategoria=" + subcategoria
                } else {
                    link += "?Subcategoria=" + subcategoria
                }
            }
        }

        window.location = link;
    }
</script>
