<?php require('../functions.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php _e("AGERANGE_ADD_HTMLTITLE"); ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <?php if(isset($_GET['success'])): ?>
            <div class="row">&nbsp;</div>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php _e("AGERANGE_ADD_SUCCESS"); ?>
            </div>
        <?php endif; ?>
        <h2 class="text-center"><?php _e("AGERANGE_ADD_HTMLTITLE"); ?></h2>
        <hr>
        <form class="form-horizontal" role="form" action="../formHandler.php" method="post">
            <div class="form-group">
                <label class="control-label col-sm-3" for="agerange[title]"><?php _e("AGERANGE_ADD_TITLE"); ?></label>
                <div class="col-sm-6">
                    <input class="form-control" name="agerange[title]" type="text" size="30">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="agerange[years_from]"><?php _e("AGERANGE_ADD_FROM"); ?></label>
                <div class="col-sm-6">
                    <input class="form-control" name="agerange[years_from]" type="text" size="128" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="agerange[years_to]"><?php _e("AGERANGE_ADD_TO"); ?></label>
                <div class="col-sm-6">
                    <input class="form-control" name="agerange[years_to]" type="number" size="4" required>
                </div>
            </div>            
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default"><?php _e("ALL_TABLES_ADD_SUBMIT"); ?></button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
