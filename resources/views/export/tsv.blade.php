<?php
$file_url = public_path() . '/bp.tsv';
header('Content-Type: text/tab-separated-values');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
readfile($file_url);
unlink($file_url);
