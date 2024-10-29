<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .card {
            transition: transform 0.3s;
            position: relative;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .btn-delete {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1;
            opacity: 0.8;
        }
        .btn-delete:hover {
            opacity: 1;
        }
        .loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.8);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>

<!-- Loading Spinner -->
<div class="loading" id="loadingSpinner">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Product Management System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Products</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-box-seam"></i> Product List</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="bi bi-plus-lg"></i> Add New Product
        </button>
    </div>
    
    <!-- Search and Filter -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" class="form-control" id="searchInput" placeholder="Search products...">
                <button class="btn btn-outline-secondary" type="button" onclick="searchProducts()">
                    <i class="bi bi-search"></i> Search
                </button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-md-end mt-3 mt-md-0">
                <select class="form-select w-auto" id="sortSelect" onchange="sortProducts()">
                    <option value="newest">Newest First</option>
                    <option value="oldest">Oldest First</option>
                    <option value="price_low">Price: Low to High</option>
                    <option value="price_high">Price: High to Low</option>
                </select>
            </div>
        </div>
    </div>
    
    <!-- Products Grid -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4" id="productContainer">
        <!-- Products will be dynamically loaded here -->
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-plus-circle"></i> Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addProductForm">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" required>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="productDescription" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Price ($)</label>
                        <input type="number" class="form-control" id="productPrice" step="0.01" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="productImage" class="form-label">Image URL</label>
                        <input type="url" class="form-control" id="productImage" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg"></i> Cancel
                </button>
                <button type="button" class="btn btn-primary" onclick="addProduct()">
                    <i class="bi bi-plus-lg"></i> Add Product
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notifications -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <i class="bi bi-check-circle me-2"></i>
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body" id="successToastMessage"></div>
    </div>
    
    <div id="errorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <i class="bi bi-exclamation-circle me-2"></i>
            <strong class="me-auto">Error</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body" id="errorToastMessage"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
const loadingSpinner = document.getElementById('loadingSpinner');
const successToast = new bootstrap.Toast(document.getElementById('successToast'));
const errorToast = new bootstrap.Toast(document.getElementById('errorToast'));

function showLoading() {
    loadingSpinner.style.display = 'flex';
}

function hideLoading() {
    loadingSpinner.style.display = 'none';
}

function showSuccess(message) {
    document.getElementById('successToastMessage').textContent = message;
    successToast.show();
}

function showError(message) {
    document.getElementById('errorToastMessage').textContent = message;
    errorToast.show();
}

// Load products from API
function loadProducts() {
    showLoading();
    fetch('api.php?action=getAll')
        .then(response => response.json())
        .then(products => {
            displayProducts(products);
            hideLoading();
        })
        .catch(error => {
            console.error('Error:', error);
            showError('Failed to load products');
            hideLoading();
        });
}

// Display products in the UI
function displayProducts(products) {
    const container = document.getElementById('productContainer');
    container.innerHTML = '';

    if (products.length === 0) {
        container.innerHTML = `
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> No products found
                </div>
            </div>
        `;
        return;
    }

    products.forEach(product => {
        const productCard = `
            <div class="col">
                <div class="card h-100">
                    <button onclick="deleteProduct(${product.id})" class="btn btn-danger btn-sm btn-delete">
                        <i class="bi bi-trash"></i>
                    </button>
                    <img src="${product.image_url}" class="card-img-top" alt="${product.name}">
                    <div class="card-body">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text">${product.description}</p>
                        <h6 class="card-subtitle mb-2 text-primary">$${parseFloat(product.price).toFixed(2)}</h6>
                        <button class="btn btn-primary">
                            <i class="bi bi-cart-plus"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        `;
        container.innerHTML += productCard;
    });
}

// Add new product
function addProduct() {
    const formData = new FormData();
    formData.append('action', 'add');
    formData.append('name', document.getElementById('productName').value);
    formData.append('description', document.getElementById('productDescription').value);
    formData.append('price', document.getElementById('productPrice').value);
    formData.append('image_url', document.getElementById('productImage').value);

    showLoading();
    fetch('api.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            loadProducts();
            document.getElementById('addProductForm').reset();
            const modal = bootstrap.Modal.getInstance(document.getElementById('addProductModal'));
            modal.hide();
            showSuccess('Product added successfully');
        } else {
            showError(data.message);
        }
        hideLoading();
    })
    .catch(error => {
        console.error('Error:', error);
        showError('Failed to add product');
        hideLoading();
    });
}

// Delete product
function deleteProduct(id) {
    if (confirm('Are you sure you want to delete this product?')) {
        const formData = new FormData();
        formData.append('action', 'delete');
        formData.append('id', id);

        showLoading();
        fetch('api.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                loadProducts();
                showSuccess('Product deleted successfully');
            } else {
                showError(data.message);
            }
            hideLoading();
        })
        .catch(error => {
            console.error('Error:', error);
            showError('Failed to delete product');
            hideLoading();
        });
    }
}

// Search products
function searchProducts() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const products = document.querySelectorAll('.card');
    
    products.forEach(product => {
        const title = product.querySelector('.card-title').textContent.toLowerCase();
        const description = product.querySelector('.card-text').textContent.toLowerCase();
        
        if (title.includes(searchTerm) || description.includes(searchTerm)) {
            product.parentElement.style.display = '';
        } else {
            product.parentElement.style.display = 'none';
        }
    });
}

// Sort products
function sortProducts() {
    const sortType = document.getElementById('sortSelect').value;
    const container = document.getElementById('productContainer');
    const products = Array.from(container.children);
    
    products.sort((a, b) => {
        const priceA = parseFloat(a.querySelector('.text-primary').textContent.replace('$', ''));
        const priceB = parseFloat(b.querySelector('.text-primary').textContent.replace('$', ''));
        
        switch(sortType) {
            case 'price_low':
                return priceA - priceB;
            case 'price_high':
                return priceB - priceA;
            // Add more sorting options as needed
        }
    });
    
    container.innerHTML = '';
    products.forEach(product => container.appendChild(product));
}

// Load products when page loads
document.addEventListener('DOMContentLoaded', loadProducts);
</script>

</body>
</html>