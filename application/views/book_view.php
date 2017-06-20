<p class="menu-label" align='center'><a class="button is-primary" href='/'>Home</a></p>
<div class="container">
    <div class="columns">
        <div class="column">
            <!-- Подробно о книге -->
            <div class="panel">
                <?php
                    $authors = $this->nameFormation($this->book["author"], 'author');
                    $category = $this->nameFormation($this->book["category"], 'category');
                ?>
                <p class="panel-heading">
                    <?=$this->book['name']?>
                </p>

                <span class="panel-block">
                    <ul>
                        <p class="menu-label">Автор:</p> 
                        <?=$authors?>
                    </ul>
                </span>

                <span class="panel-block">
                    <ul>
                        <p class="menu-label">Жанр:</p> 
                        <?=$category?>
                    </ul>
                </span>

                <span class="panel-block">
                    <p class="menu-label">Год:</p>
                    <?=$this->book['pubyear']?>
                </span>

                <span class="panel-block">
                    <p class="menu-label">Цена:</p>
                    <?=$this->book['price']?>
                </span>

                <span class="panel-block">
                    <p class="menu-label">Описание:</p>
                    <?=$this->book['fulldesc']?>
                </span>                          
            </div>
        </div>

        <div class="column">
            <!-- Форма для отправки почты админу -->
            <h2 class="subtitle has-text-centered">Заполните форму для заказа:</h2>
            <form align='center' action='/send/book/id/<?=$this->book['id']?>' method='post'>
                <label class="label">Адрес</label>
                    <input class="input" type='text' maxlength='50' name='address'>
                <label class="label">Ф.И.О</label>
                    <input class="input" type='text' maxlength='40' name='user'>
                <label class="label">Экземпляров</label>
                    <input class="input is-small" type='number' min='1' max='100' value='1' name='count'>
                <br><br><input type='submit' value='Заказать'>
            </form>
        </div>
    </div>
</div>