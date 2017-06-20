<p class="menu-label" align='center'><a class="button is-primary" href='/'>Home</a></p>
<p class="menu-label" align='center'><a class="button is-primary" href='/admin/addbook'>Add Book</a></p>
<div class="container">
    <div class="columns">
        <div class="column">
            <!-- Список всех книг -->
            <h2 class="subtitle has-text-centered">Все книги каталога:</h2>
            <table border="1" cellpadding="5" cellspacing="0" width="100%" class="table is-striped">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Автор</th>
                <th>Жанр</th>
                <th>Год</th>
                <th>Цена</th>
                <th>О чем</th>
                <th>Изменить</th>
            </tr>
            <?=$this->tabFormation($this->db->catalog, 'admin')?>
            </table>
        </div>
    </div>
</div>