
<h1>Список новостей в категории <?=$categoriesList[0]['categoryName']?></h1>

<ul>
    <?php foreach ($categoriesList as $category): ?>
        <li>
            <a href="<?=route('news.show', ['id' => $category['news_id']])?>"><?=$category['title']?></a>
        </li>

    <?php endforeach; ?>
</ul>
