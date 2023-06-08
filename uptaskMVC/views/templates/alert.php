<?php
    if (!empty($message)) {
        $content = "<div class='modal ".$message['tipo']."'>";
        $content .= "<p> " . $message['info']. "</p>"; 
        $content .= "</div>"; 
        echo $content;
    }
?> 