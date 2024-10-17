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
    <title>Product Listing</title>
    <link rel="stylesheet" href="css/3187.css">
    <!-- Thêm Font Awesome từ CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="product-listing">
                <div class="top-bar">
                    <p>Showing 1–9 of 12 results</p>
                    <div class="select-wrapper">
                        <select class="sorting">
                            <option>Default sorting</option>
                            <option>Sort by popularity</option>
                            <option>Sort by average rating</option>
                            <option>Sort by latest</option>
                            <option>Sort by price: low to high</option>
                            <option>Sort by price: high to low</option>
                        </select>
                    </div>
                </div>

                <div class="products">
                    <div class="product">
                        <img src="./public/images/red-mix-tea.png" alt="Red Mix Tea">
                        <div class="product-info">
                            <h3>Red Mix Tea</h3>
                            <p class="price">$45.00</p>
                            <span class="add-to-cart">Add to Cart</span> <!-- Thêm nút Add to Cart -->
                        </div>
                        <p>Healthy</p>
                    </div>
                    <div class="product">
                        <img src="./public/images/english-tea.png" alt="English Tea">
                        <div class="product-info">
                            <h3>English Tea</h3>
                            <p class="price">$74.00</p>
                            <span class="add-to-cart">Add to Cart</span>
                        </div>
                        <p>Healthy</p>
                    </div>
                    <div class="product">
                        <img src="./public/images/summer-tea.png" alt="Summer Tea">
                        <div class="product-info">
                            <h3>Summer Tea</h3>
                            <p class="price">$40.00</p>
                            <span class="add-to-cart">Add to Cart</span>
                        </div>
                        <p>Healthy</p>
                    </div>
                </div>

            </div>

            <!-- Sidebar Section -->
            <div class="sidebar">
                <div class="price-filter">
                    <h3>Price Filter</h3>
                    <input type="range" min="40" max="80" value="40" class="slider">
                    <div class="filter-controls">
                        <p>Price: $40 — $80</p>
                        <button class="filter-button">Filter</button>
                    </div>
                </div>

                <div class="featured-products">
                    <h3>Featured Products</h3>
                    <ul>
                        <li>
                            <img src="./public/images/coco-skies.png" alt="Coco Skies">
                            <div class="product-details">
                                <span>Coco Skies</span>
                                <a>$78.00</a>
                            </div>
                        </li>
                        <li>
                            <img src="./public/images/coco-green.png" alt="Coco Green">
                            <div class="product-details">
                                <span>Coco Green</span><del>$70.00</del><a>$50.00</a>
                            </div>
                        </li>
                        <li>
                            <img src="./public/images/scrub.png" alt="Scrub">
                            <div class="product-details">
                                <span>Scrub</span><a>$35.00</a>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </div>
    </div>
</body>

</html>