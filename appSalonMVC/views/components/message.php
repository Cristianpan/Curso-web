<?php
    if (!empty($message)) {
        $content = "<div class='modal ".$message['tipo']."'>";
        $content .= "<p> " . $message['informacion']. "</p>"; 
        $content .= "</div>"; 
        echo $content;
    }
?> 