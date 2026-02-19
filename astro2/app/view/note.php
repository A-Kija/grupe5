  <main class="container">
    <article class="note-detail" data-animate="fade-up">
      <div class="note-meta"><?= $note->date ?></div>
      <h1><?= $note->title ?></h1>

      <div class="note-content">
        <p><?= nl2br($note->content) ?></p>
      </div>

      <div class="note-actions">
        <a class="button ghost" href="<?= self::URL ?>">Back to Home</a>
        <a class="button primary" href="<?= self::URL ?>create">Create New Note</a>
        <a class="button ghost" href="<?= self::URL ?>edit/<?= $note->id ?>">Edit Note</a>
        <a class="button danger" href="<?= self::URL ?>delete/<?= $note->id ?>">Delete Note</a>
      </div>
    </article>
  </main>