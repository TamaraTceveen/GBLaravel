<h1>Список новостных категорий</h1>
<?php //dd($categoriesList);?>
<ul>
    <?php foreach ($categoriesList as $category): ?>
        <li>
            <a href="<?=route('categories.show', ['id' => $category['id']])?>"><?=$category['categoryName']?></a>
        </li>

    <?php endforeach; ?>
</ul>

