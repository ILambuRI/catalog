<div class="container">
    <div class="columns">
        <div class="column is-one-quarter">
            <aside class="menu">
                <p class="menu-label"><a class="button is-primary" href='/admin/books'>Admin Panel</a></p>
                <p class="menu-label">Жанры:</p>
                <!-- Список всех жанров -->
                <ul class="menu-list">
                    <?=$this->listFormation('category', '/genre/list/id/')?>
                </ul>
                <p class="menu-label">Авторы:</p>
                <!-- Список всех авторов -->
                <ul class="menu-list">
                    <?=$this->listFormation('author', '/author/list/id/')?>
                </ul>
            </aside>
        </div>

        <div class="column">
            <!-- Список всех книг базы -->
            <h2 class="subtitle has-text-centered">Все книги каталога:</h2>
            <table border="1" cellpadding="5" cellspacing="0" width="100%" class="table is-striped">
            <tr>
                <th>Название</th>
                <th>Автор</th>
                <th>Жанр</th>
                <th>Год</th>
                <th>Цена</th>
                <th>О чем</th>
                <th>Подробнее</th>
            </tr>
            <?=$this->tabFormation($this->db->catalog)?>
            </table>
        </div>
    </div>
</div>