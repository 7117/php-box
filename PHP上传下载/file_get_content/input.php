<?php
// name=tom&age=22&file=bug.docx
$content = file_get_contents("php://input");
echo $content;