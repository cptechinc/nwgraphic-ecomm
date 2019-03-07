<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default not-round" id="login-panel">
                        <div class="panel-heading not-round"><h3 class="panel-title"><strong>Sign in </strong></h3>
                            <div style="position: relative; top:-10px" class="pull-right">
                                <small><a href="<?php echo $config->pages->password; ?>forgot/">Forgot password?</a></small>
                            </div>
                        </div>
                        <div class="panel-body"> 
                            <?php if (!$user->loggedin) : ?>
                                <?php $errormsg = get_login_error_msg(session_id()); ?>
                                <?php if (strlen($errormsg) > 0 ) : ?>
                                    <div class="alert alert-danger alert-dismissible not-round" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <strong>Warning!</strong> <?php echo $errormsg; ?>
                                    </div>
                                <?php else : ?>
                                    <br>
                                <?php endif; ?>
                            <?php endif; ?>

                            <form action="<?php echo $config->pages->account; ?>redir/" method="post">
                                <input type="hidden" name="action" value="login-return">
                                <input type="hidden" name="page" value="<?php echo $config->filename; ?>">
                                <div class="input-group form-group">
                                    <span class="input-group-addon "><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="email" value="" autofocus placeholder="Email">
                                </div>
                                <div class="input-group form-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" class="form-control input-lg " name="password" placeholder="Password">
                                </div>
                                <p class="text-center"> <button type="submit" class="btn btn-success btn-lg not-round">Sign in</button> </p>

                                <hr>
                                <div class="form-group">
                                    <small>Don't have an account! <a href="<?php echo $config->pages->register; ?>"> Sign Up Here </a></small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
