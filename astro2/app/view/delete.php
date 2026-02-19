<main class="container">
	<section class="form-panel delete-panel" data-animate="fade-up">
		<div class="note-meta">Delete Confirmation</div>
		<h1>Delete this note?</h1>
		<p class="note-lead">This action is permanent and cannot be undone.</p>

		<div class="delete-preview">
			<div class="note-meta"><?= $note->date ?></div>
			<h2><?= $note->title ?></h2>
			<p><?= implode(' ', array_slice(explode(' ', $note->content), 0, 22)) ?></p>
		</div>

		<form method="post" action="<?= self::URL ?>destroy/<?= $note->id ?>" class="note-form">
			<div class="form-actions">
				<button class="button danger" type="submit">Yes, Delete Note</button>
				<a class="button ghost" href="<?= self::URL ?>note/<?= $note->id ?>">Cancel</a>
			</div>
		</form>
	</section>
</main>