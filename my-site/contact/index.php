<?php
$title = 'Contact Us';
$header = false;
include __DIR__ . '/../parts/top.php';
?>

<section>
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 2rem;">Get in Touch</h2>
        <form action="#" method="post" class="contact-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit" class="btn">Send Message</button>
        </form>
    </div>
</section>

<?php
include __DIR__ . '/../parts/bottom.php';