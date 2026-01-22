<?php
$title = 'Trend Analysis';
$header = true;
include __DIR__ . '/../parts/top.php';
?>

<section>
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 2rem;">Current Fashion Trends</h2>
        <div class="trends-list">
            <article class="trend-item">
                <img src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?w=400" alt="Trend 1">
                <div class="trend-content">
                    <h3>Bold Colors</h3>
                    <p>This season is all about embracing bold and vibrant colors to make a statement.</p>
                </div>
            </article>
            
            <article class="trend-item">
                <img src="https://images.unsplash.com/photo-1521334884684-d80222895322?w=400" alt="Trend 2">
                <div class="trend-content">
                    <h3>Sustainable Fashion</h3>
                    <p>Eco-friendly materials and ethical production are becoming a major focus in fashion.</p>
                </div>
            </article>
            
            <article class="trend-item">
                <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?w=400" alt="Trend 3">
                <div class="trend-content">
                    <h3>Vintage Revival</h3>
                    <p>Retro styles from the '70s, '80s, and '90s are making a strong comeback.</p>
                </div>
            </article>
        </div>
    </div>
</section>


<?php
include __DIR__ . '/../parts/bottom.php';