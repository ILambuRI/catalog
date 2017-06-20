<p class="menu-label" align='center'><a class="button is-primary" href='/'>Home</a></p>
<p class="menu-label" align='center'><a class="button is-primary" href='/admin/books'>Admin Panel</a></p>
<?php
    /*Ошибка или подтверждение о записи в БД*/
    if($this->error)
    {
        $error = "<div class='notification is-info'>" . $this->error . "</div>";
        echo $error;
        exit();
    }
    if($this->info)
    {
        $info = "<div class='notification is-info'>" . $this->info . "</div>";
        echo $info;
    }
?>
<!-- Форма на запись в БД книги -->
<div class="container">
    <form align='left' action='/admin/addbook' method='post'>
        <h2 class="subtitle has-text-centered">Заполните форму для внесения в базу:</h2>
        <label class="label">Название</label>
            <input class="input" type='text' maxlength='50' name='name'>
        <label class="label">Автор</label>
            <label class="checkbox">
                <?=$this->checkboxFormation('author')?>
            </label>
        <label class="label">Жанр</label>
            <label class="checkbox">
                <?=$this->checkboxFormation('category')?>
            </label>
        <label class="label">Год</label>
            <input class="input" type='number' min='1900' max='2017' value='1900' name='pubyear'>
        <label class="label">Цена</label>
            <input class="input" type='number' min='1' max='1000' value='1' name='price'>
        <label class="label">Краткое описание</label>
            <textarea class="textarea" maxlength='100' name="shortdesc" rows="2" cols="30">
            </textarea>
        <label class="label">Полное описание</label>
            <textarea class="textarea" name="fulldesc" rows="5" cols="30">
            </textarea>
        <br><input type='submit' value='Добавить'>
    </form>
</div>