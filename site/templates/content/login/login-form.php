<div class="row">
    <div class="col-sm-6 col-md-offset-3">
        <div class="panel panel-default" id="login-panel">
            <div class="panel-heading"><h3 class="panel-title">Sign in</h3>
                <div style="position: relative; top:-10px" class="pull-right">
                	<small><a href="<?php echo $config->pages->password; ?>forgot/">Forgot password?</a></small>
                </div>
            </div>
            <div class="panel-body">
            	<p class="text-center"><img src="<?php echo $config->urls->files; ?>images/logo.png" class="img-responsive" ></p>
                <?php if (!$user->loggedin) : ?>
                    <?php $errormsg = get_login_error_msg(session_id()); ?>
                    <?php if (strlen($errormsg) > 0 ) : ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Warning!</strong> <?php echo $errormsg; ?>
                        </div>
                    <?php else : ?>
                		<br>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="row">
                	<div class="col-xs-1"></div>
                	<div class="col-xs-10">
                		 <form action="<?php echo $config->pages->account; ?>redir/" method="post">
							<input type="hidden" name="action" value="login">
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" class="form-control" name="email" value="" autofocus placeholder="Email">
							</div>
							<div class="input-group form-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
							<p class="text-center"> <button type="submit" class="btn btn-success not-round">Sign in</button> </p>

							<hr>
							<?php if (100 == 1) : ?>
								<div class="form-group">
									<small>Don't have an account! <a href="<?php echo $config->pages->register; ?>"> Sign Up Here </a></small>
								</div>
							<?php endif; ?>

						</form>
                	</div>
                </div>

            </div>
        </div>
    </div>
</div>
