<main class="container">
    <section class="hero" data-animate="fade-up">
      <h1>Personal Astronomical Notes</h1>
      <p>Quiet observations, tracked across dark skies and colder nights.</p>
      <div class="hero-actions">
        <a class="button primary" href="create.html">Create New Note</a>
        <a class="button ghost" href="note1.html">View Sample</a>
      </div>
    </section>

    <section class="notes" aria-label="Notes list">
      <div class="section-title" data-animate="fade-up">
        <h2>Recent Notes</h2>
        <span><?= count($notes) ?> entries</span>
      </div>

      <div class="note-grid">
        <?php foreach($notes as $note) : ?>

        <article class="note-card" data-animate="fade-up">
          <div class="note-meta"><?= $note['date'] ?></div>
          <h3><?= $note['title'] ?></h3>
            <p><?= implode(' ', array_slice(explode(' ', $note['content']), 0, 17)) ?></p>
          <a class="note-link" href="<?= URL ?>note/<?= $note['id'] ?>">Read note</a>
        </article>

        <?php endforeach ?>

        
      </div>
    </section>
  </main>