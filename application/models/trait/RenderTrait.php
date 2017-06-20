<?php
trait RenderTrait
{
    /*Представление через буфер*/
    public function render($file) 
    {
    ob_start();
    ?>
    <html>
        <head>
            <link rel="stylesheet" href="/css/bulma.css">
        </head>
        <body>
            <?=include($file)?>
       </body> 
    </html>
    <?php
    return ob_get_clean();
    }
}