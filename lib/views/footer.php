<?php
$scripts = $this->getJavaScripts();
$scripts_output = '';
foreach ($scripts as $script) {
    $scripts_output .= "<script type='module' src='/public/js/$script.js'></script>";
}

?>

</main>
<?=$scripts_output?>
</body>
</html>