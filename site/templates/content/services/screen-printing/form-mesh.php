<form name="mesh">
    <div class="row">
        <div class="col-sm-6">
            <h3>Height <input name="height" class="form-control" onfocus="resetvalue()" type="text"></h3>
        </div>
        <div class="col-sm-6">
            <h3>Width <input name="width" class="form-control" onfocus="resetvalue()" type="text"></h3>
        </div>
    </div>
    <?php include ($config->paths->content."services/screen-printing/standard-mesh.php"); ?>
    <br>
    <?php include ($config->paths->content."services/screen-printing/non-standard-mesh.php"); ?>
    



    <h4>Your estimated mesh cost*:
    <div class="input-group" style="width: 50%;">
        <div class="input-group-addon">$</div>
        <input name="price" size="6" type="text" class="form-control text-right">
    </div>
    </h4>
    <p>*This estimate is for monofilament polyester meshes only.</p>
</form>
