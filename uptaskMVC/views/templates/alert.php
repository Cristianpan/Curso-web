<?php
    if (!empty($message)) {
        $content = "<div class='alert ".$message['tipo']."'>";
        $content .= "<p> " . $message['info']. "</p>"; 
        $content .= "</div>"; 
        echo $content;
    }
?> 