<main class="container">
    <section class="form-panel" data-animate="fade-up">
      <h1>Create a New Note</h1>
      <p class="note-lead">Log your observations with date, title, and a full session summary.</p>

      <form class="note-form" method="post" action="<?= URL ?>store">
        <label class="field">
          <span>Date</span>
          <input type="date" name="date" required />
        </label>

        <label class="field">
          <span>Title</span>
          <input type="text" name="title" placeholder="e.g. Saturn ring shadow" required />
        </label>

        <label class="field">
          <span>Content</span>
          <textarea name="content" rows="8" placeholder="Write the observing session details..." required></textarea>
        </label>

        <div class="form-actions">
          <button class="button primary" type="submit">Save Note</button>
          <button class="button ghost" type="reset">Clear</button>
        </div>
      </form>
    </section>
  </main>