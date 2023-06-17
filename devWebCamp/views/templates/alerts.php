<?php
    if (!empty($message)) {
        $content = "<div class='alert ".$message['tipo']."'>";
        $content .= "<p> " . $message['informacion']. "</p>"; 
        $content .= "</div>"; 
        echo $content;
    }
?> 