<?php
/**
 * Created by PhpStorm.
 * User: Vlad Chebotarev
 * Date: 24.12.2017
 * Time: 17:39
 */


require __DIR__ . '/vendor/autoload.php';

use Src\Optimizer;


if (isset($_POST['submit'])) {

    $optObj = new Optimizer();
    $optObj->setRequestString($_POST['text']);
    $optObj->optimize();

}

?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
      integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<div class="container">
    <form action="" method="post">
        <textarea class="form-control" name="text" id="" cols="30" rows="10">A B B C C D D D E E</textarea>
        <input class="btn btn-success" type="submit" name="submit">
    </form>
</div>