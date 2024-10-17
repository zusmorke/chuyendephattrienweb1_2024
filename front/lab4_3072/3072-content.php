<?php
$url_host = $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';
preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = str_replace('\\', '/', $url_host . $matches[1][0]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="css/3072.css">
</head>

<body>

    <section class="shop-section">
        <h2>Shop</h2>
        <hr class="responsive-hr">

        <div class="showing-sorting">
            <p class="showing-info">Showing 1–9 of 11 results</p>
            <div class="sorting">
                <select>
                    <option>Default sorting</option>
                    <option>Sort by popularity</option>
                    <option>Sort by average rating</option>
                    <option>Sort by latest</option>
                    <option>Sort by price: low to high</option>
                    <option>Sort by price: high to low</option>
                </select>
            </div>
        </div>

        <div class="product-grid">
            <div class="product">
                <span class="sale-badge">Sale!</span>
                <img src="./public/images/flying-ninja.png" alt="Flying Ninja">
                <h3>Flying Ninja</h3>
                <div class="rating">★★★★☆</div>
                <p class="price"><del>£15.00</del><span>£12.00</span></p>
                <button class="add-to-cart">
                    Add to cart
                    <span class="spinner">⚙️</span>
                    <span class="checkmark">✔️</span>
                </button>
            </div>
            <div class="product">
                <img src="./public/images/happy-ninja.png" alt="Happy Ninja">
                <h3>Happy Ninja</h3>
                <div class="rating">★★★☆☆</div>
                <p class="price">£35.00</p>
                <button class="add-to-cart">
                    Add to cart
                    <span class="spinner">⚙️</span>
                    <span class="checkmark">✔️</span>
                </button>
            </div>
            <div class="product">
                <img src="./public/images/ninja-silhouette.png" alt="Ninja Silhouette">
                <h3>Ninja Silhouette</h3>
                <div class="rating">★★★★☆</div>
                <p class="price">£35.00</p>
                <button class="add-to-cart">
                    Add to cart
                    <span class="spinner">⚙️</span>
                    <span class="checkmark">✔️</span>
                </button>
            </div>
        </div>
    </section>
    <script>
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function () {
                const spinner = this.querySelector('.spinner');
                const checkmark = this.querySelector('.checkmark');

                checkmark.style.display = 'none';
                spinner.style.display = 'inline';
                spinner.classList.add('spin');

                setTimeout(() => {
                    spinner.style.display = 'none';
                    checkmark.style.display = 'inline';
                    spinner.classList.remove('spin');

                    if (!this.nextElementSibling || !this.nextElementSibling.classList.contains('view-cart')) {
                        const viewCartButton = document.createElement('button');
                        viewCartButton.textContent = 'View Cart';
                        viewCartButton.classList.add('view-cart');
                        this.after(viewCartButton);
                        viewCartButton.style.display = 'inline';

                        viewCartButton.style.backgroundColor = '#fff';
                        viewCartButton.style.color = '#000';
                        viewCartButton.style.border = '1px solid #e1e1e1';

                        viewCartButton.addEventListener('mouseover', () => {
                            viewCartButton.style.backgroundColor = '#f0f0f0';
                        });

                        viewCartButton.addEventListener('mouseout', () => {
                            viewCartButton.style.backgroundColor = '#fff';
                        });

                        // Redirect to custom cart page
                        viewCartButton.addEventListener('click', () => {
                            window.location.href = '/custom-cart'; // Change URL here
                        });
                    }
                }, 1500);
            });
        });
    </script>
</body>
</html>