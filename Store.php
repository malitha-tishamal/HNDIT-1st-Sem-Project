<?php 
$pageTitle = "Store";
include("includes/header.php"); 
?>

<section class="store-hero">
    <div class="container">
        <h1>Learning Resources</h1>
        <p>Expertly crafted tutorials and course materials to accelerate your learning.</p>
    </div>
</section>

<div class="store-layout">
    <aside class="store-sidebar">
        <div class="cart-preview card glass-card">
            <div class="cart-header">
                <h3><i class="fa fa-shopping-cart"></i> Your Cart</h3>
                <span class="cart-count">0</span>
            </div>
            <div class="cart-items-list">
                <!-- Cart items will be injected here -->
                <p class="empty-msg">Your cart is empty</p>
            </div>
            <div class="cart-footer">
                <div class="total-row">
                    <span>Total:</span>
                    <span class="total-price">Rs. 0</span>
                </div>
                <button class="btn btn-primary full-width" onclick="placeOrder()">Checkout</button>
            </div>
        </div>

        <div class="filter-section card">
            <h3>Categories</h3>
            <div class="filter-options">
                <button class="filter-btn active" onclick="filterSelection('all')">All Resources</button>
                <button class="filter-btn" onclick="filterSelection('full')">Full Courses</button>
                <button class="filter-btn" onclick="filterSelection('java2')">Java Materials</button>
                <button class="filter-btn" onclick="filterSelection('web2')">Web Materials</button>
                <button class="filter-btn" onclick="filterSelection('python2')">Python Materials</button>
                <button class="filter-btn" onclick="filterSelection('tute')">Tutes Only</button>
            </div>
        </div>
    </aside>

    <main class="store-grid-wrapper">
        <div class="shop-grid">
            <?php
            $items = [
                ['cat' => 'all full java2', 'img' => 'javafull.jpg', 'title' => 'Java Programming Full Course', 'price' => 10000],
                ['cat' => 'all full python2', 'img' => 'pythonfull.jpg', 'title' => 'Python Development Full Course', 'price' => 12000],
                ['cat' => 'all full web2', 'img' => 'webfull.jpg', 'title' => 'Web Development Full Course', 'price' => 15000],
                ['cat' => 'all java2', 'img' => 'java1.jpg', 'title' => 'Java Programming Semester 1', 'price' => 1500],
                ['cat' => 'all java2', 'img' => 'java2.jpg', 'title' => 'Java Programming Semester 2', 'price' => 1500],
                ['cat' => 'all java2', 'img' => 'java3.jpg', 'title' => 'Java Programming Semester 3', 'price' => 1500],
                ['cat' => 'all java2', 'img' => 'java4.jpg', 'title' => 'Java Programming Semester 4', 'price' => 1500],
                ['cat' => 'all java2', 'img' => 'java5.jpg', 'title' => 'Java Programming Semester 5', 'price' => 1500],
                ['cat' => 'all java2', 'img' => 'java6.jpg', 'title' => 'Java Programming Semester 6', 'price' => 1500],
                ['cat' => 'all java2 tute', 'img' => 'javat1.jpg', 'title' => 'Java Tute 1 Variables', 'price' => 600],
                ['cat' => 'all java2 tute', 'img' => 'javat2.jpg', 'title' => 'Java Tute 2 Data Types', 'price' => 600],
                ['cat' => 'all web2', 'img' => 'web1.jpg', 'title' => 'Web Development Semester 1', 'price' => 1800],
                ['cat' => 'all web2', 'img' => 'web2.jpg', 'title' => 'Web Development Semester 2', 'price' => 1800],
                ['cat' => 'all web2 tute', 'img' => 'html.jpg', 'title' => 'Web Development Tute - HTML', 'price' => 600],
                ['cat' => 'all python2', 'img' => 'pyth1.jpg', 'title' => 'Python Development Semester 1', 'price' => 2000],
            ];

            foreach ($items as $item) {
                ?>
                <div class="product-card <?php echo $item['cat']; ?>">
                    <div class="product-img">
                        <img src="images/store/<?php echo $item['img']; ?>" alt="<?php echo $item['title']; ?>">
                    </div>
                    <div class="product-info">
                        <h3><?php echo $item['title']; ?></h3>
                        <div class="price-row">
                            <span class="price">Rs. <?php echo number_format($item['price']); ?></span>
                            <button class="add-to-cart-btn" onclick="addToCart('<?php echo addslashes($item['title']); ?>', <?php echo $item['price']; ?>, 'images/store/<?php echo $item['img']; ?>')">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </main>
</div>

<style>
.store-hero {
    padding: 6rem 0 4rem;
    text-align: center;
    background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(15, 23, 42, 0) 100%);
}

.store-layout {
    max-width: 1300px;
    margin: 0 auto 6rem;
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: 3rem;
    padding: 0 1.5rem;
}

.store-sidebar {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    position: sticky;
    top: 100px;
    height: fit-content;
}

.card {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 20px;
    padding: 1.5rem;
}

.cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.cart-count {
    background: var(--primary);
    color: white;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 700;
}

.cart-items-list {
    max-height: 400px;
    overflow-y: auto;
    margin-bottom: 1.5rem;
}

.cart-item {
    display: flex;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid var(--border-color);
}

.cart-item img {
    width: 50px;
    height: 50px;
    border-radius: 8px;
    object-fit: cover;
}

.cart-item-info h4 {
    font-size: 0.85rem;
    margin-bottom: 0.25rem;
}

.cart-item-info span {
    font-size: 0.8rem;
    color: var(--primary);
    font-weight: 600;
}

.empty-msg {
    text-align: center;
    color: var(--text-muted);
    padding: 2rem 0;
}

.total-row {
    display: flex;
    justify-content: space-between;
    font-weight: 700;
    margin-bottom: 1.5rem;
}

.filter-options {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    margin-top: 1rem;
}

.filter-btn {
    text-align: left;
    background: transparent;
    border: none;
    color: var(--text-muted);
    padding: 0.75rem 1rem;
    border-radius: 10px;
    cursor: pointer;
    transition: var(--transition);
    font-weight: 500;
}

.filter-btn:hover, .filter-btn.active {
    background: rgba(255, 255, 255, 0.05);
    color: var(--text-main);
}

.filter-btn.active {
    background: rgba(99, 102, 241, 0.1);
    color: var(--primary);
}

.shop-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 2rem;
}

.product-card {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 20px;
    overflow: hidden;
    transition: var(--transition);
}

.product-card:hover {
    transform: translateY(-8px);
    border-color: var(--primary);
}

.product-img {
    height: 200px;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
}

.product-img img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.product-info {
    padding: 1.5rem;
}

.product-info h3 {
    font-size: 1rem;
    margin-bottom: 1rem;
    height: 2.4rem;
    overflow: hidden;
}

.price-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.price {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--accent);
}

.add-to-cart-btn {
    background: var(--primary);
    color: white;
    border: none;
    width: 36px;
    height: 36px;
    border-radius: 10px;
    cursor: pointer;
    transition: var(--transition);
}

.add-to-cart-btn:hover {
    transform: scale(1.1);
}

@media (max-width: 900px) {
    .store-layout {
        grid-template-columns: 1fr;
    }
    .store-sidebar {
        position: static;
    }
}
</style>

<script>
let cart = [];

function addToCart(title, price, img) {
    const existing = cart.find(i => i.title === title);
    if (!existing) {
        cart.push({title, price, img});
        updateCartUI();
    }
}

function removeFromCart(title) {
    cart = cart.filter(i => i.title !== title);
    updateCartUI();
}

function updateCartUI() {
    const list = document.querySelector('.cart-items-list');
    const count = document.querySelector('.cart-count');
    const total = document.querySelector('.total-price');
    
    count.textContent = cart.length;
    
    if (cart.length === 0) {
        list.innerHTML = '<p class="empty-msg">Your cart is empty</p>';
        total.textContent = 'Rs. 0';
        return;
    }
    
    list.innerHTML = cart.map(item => `
        <div class="cart-item">
            <img src="${item.img}" alt="${item.title}">
            <div class="cart-item-info">
                <h4>${item.title}</h4>
                <span>Rs. ${item.price.toLocaleString()}</span>
            </div>
            <button onclick="removeFromCart('${item.title.replace("'", "\\'")}')" style="background:none; border:none; color: #ef4444; margin-left:auto; cursor:pointer">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    `).join('');
    
    const sum = cart.reduce((a, b) => a + b.price, 0);
    total.textContent = 'Rs. ' + sum.toLocaleString();
}

function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("product-card");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
        if (x[i].className.indexOf(c) > -1) {
            x[i].style.display = "block";
        }
    }
    
    // Update active filter btn
    const btns = document.querySelectorAll('.filter-btn');
    btns.forEach(b => b.classList.remove('active'));
    event.target.classList.add('active');
}

function placeOrder() {
    if (cart.length === 0) {
        alert("Your cart is empty!");
        return;
    }
    alert("Thank you for your order! In a real system, this would proceed to payment.");
    cart = [];
    updateCartUI();
}
</script>

<?php include("includes/footer.php"); ?>