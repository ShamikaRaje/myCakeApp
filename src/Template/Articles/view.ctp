<!-- File: src/Template/Articles/view.ctp -->
<div class="article-view">
	<h3><?= h($article->title) ?></h3>
	<p><?= h($article->body) ?></p>
	<p>Created: <?= $article->created->format(DATE_RFC850) ?></p>
</div>
