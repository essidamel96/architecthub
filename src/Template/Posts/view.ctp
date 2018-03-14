<!-- File: src/Template/Posts/view.ctp -->

<p><?= h($post->content) ?></p>
 <p><small>Created: <?= $post->created->format(DATE_RFC850) ?></small></p>
