<main class="container">
		<section class="form-panel" data-animate="fade-up">
			<h1>Edit Note</h1>
			<p class="note-lead">Update date, title, and content for this astronomical note.</p>

			<form class="note-form" method="post" action="<?= self::URL ?>update/<?= $note->id ?>">
				<label class="field">
					<span>Date</span>
					<input type="date" name="date" value="<?= $note->date ?>" required />
				</label>

				<label class="field">
					<span>Title</span>
					<input type="text" name="title" value="<?= $note->title ?>" required />
				</label>

				<label class="field">
					<span>Content</span>
					<textarea name="content" rows="8" required><?= $note->content ?></textarea>
				</label>

				<div class="form-actions">
					<button class="button primary" type="submit">Update Note</button>
					<a class="button ghost" href="<?= self::URL ?>note/<?= $note->id ?>">Cancel</a>
				</div>
			</form>
		</section>
	</main>
