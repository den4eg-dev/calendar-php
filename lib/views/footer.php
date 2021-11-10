<?php
$scripts = $this->getJavaScripts();
?>

</main>
<?php foreach ($scripts as $script) {
    echo "<script type='module' src='/public/js/$script.js'></script>";
} ?>
</body>
</html>