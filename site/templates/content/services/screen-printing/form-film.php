<form name="film">
    <h3>What is your image height?</h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="input-group">
                <input name="height" class="form-control" onfocus="resetvalue()" type="text">
                <div class="input-group-addon">inches</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4>Choose the width of your roll</h4>
            <input value="14&quot;" onClick="filmcalc(1)" type="button" class="btn btn-primary">&nbsp; &nbsp;
            <input value="17&quot;" onClick="filmcalc(2)" type="button" class="btn btn-primary">&nbsp; &nbsp;
            <input value="24&quot;" onClick="filmcalc(3)" type="button" class="btn btn-primary">&nbsp; &nbsp;
            <input value="36&quot;" onClick="filmcalc(4)" type="button" class="btn btn-primary">&nbsp; &nbsp;
            <input value="42&quot;" onClick="filmcalc(5)" type="button" class="btn btn-primary">&nbsp; &nbsp;
        </div>
    </div>


    <h3>Your estimated film cost*:
        <div class="input-group" style="width: 50%;">
            <div class="input-group-addon">$</div>
            <input name="price" size="6" type="text" class="form-control text-right" maxlength="5">
        </div>
    </h3>
    <p>
        <span class="text-danger"><b>*</b></span> The minimum film charge is $10 + $15 OPEN & OUTPUT
        fee, which is included in the above estimate. Ready to print? <a href="mailto:art@nwgraphic.com" class="bg-info">Email</a> your artwork to (art@nwgraphic.com) Northwest Graphic Supply Co.  
    </p>
</form>
