<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div id="error-msg">
            <?php $errors = get_billing_form_error(session_id()); ?>
            <?php if (strlen(trim($errors)) > 0) : ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo $errors; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div id="error"></div>
    </div>
</div>