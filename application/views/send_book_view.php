<div class="container">
    <p class="menu-label" align='center'><a class="button is-primary" href='/'>Home</a></p>
    <div class="notification is-info">
        <?=$this->error?>
        <?php
            if(!$this->error)
            {
        ?>
                <p align='center'> 
                Человек <?=$this->user?>, 
                мы приняли ваш заказ на "<?=$this->book_name?>"
                в количестве <?=$this->cnt?> штук,
                он прибудет по адресу <?=$this->address?>!
                </p>
        <?php
            }
        ?>
    </div>
</div>