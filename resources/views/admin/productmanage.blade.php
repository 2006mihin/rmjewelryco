<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Products</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-6">

<h1 class="text-2xl font-bold mb-4">Product Management</h1>

<!-- Back to Dashboard Button -->
<a href="/admin/dashboard" class="inline-block mb-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
    &larr; Back to Dashboard
</a>

<form id="productForm" class="mb-6">
    <input type="hidden" id="productId">

    <div class="mb-2">
        <label>Product Name:</label>
        <input type="text" id="productName" class="border p-1 w-full">
    </div>
    <div class="mb-2">
        <label>Price:</label>
        <input type="number" step="0.01" id="price" class="border p-1 w-full">
    </div>
    <div class="mb-2">
        <label>Quantity:</label>
        <input type="number" id="quantity" class="border p-1 w-full">
    </div>
    <div class="mb-2">
        <label>Category:</label>
        <select id="categoryId" class="border p-1 w-full">
            <option value="">Select category</option>
        </select>
    </div>
    <div class="mb-2">
        <label>Image:</label>
        <input type="file" id="image">
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2">Save Product</button>
</form>

<hr class="my-4">

<h2 class="text-xl font-bold mb-2">Product List</h2>
<table class="border w-full">
    <thead>
        <tr class="bg-gray-100">
            <th class="border px-2 py-1">ID</th>
            <th class="border px-2 py-1">Name</th>
            <th class="border px-2 py-1">Image</th>
            <th class="border px-2 py-1">Price</th>
            <th class="border px-2 py-1">Quantity</th>
            <th class="border px-2 py-1">Category</th>
            <th class="border px-2 py-1">Actions</th>
        </tr>
    </thead>
    <tbody id="productList"></tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('productForm');
    const productIdInput = document.getElementById('productId');
    const productNameInput = document.getElementById('productName');
    const priceInput = document.getElementById('price');
    const quantityInput = document.getElementById('quantity');
    const categoryIdSelect = document.getElementById('categoryId');
    const imageInput = document.getElementById('image');
    const productList = document.getElementById('productList');

    // Load categories into dropdown
    axios.get('/api/categories')
        .then(res => {
            res.data.forEach(cat => {
                const option = document.createElement('option');
                option.value = cat.id;
                option.textContent = cat.category_name;
                categoryIdSelect.appendChild(option);
            });
        })
        .catch(err => console.error('Error loading categories:', err));

    // Load products into table
    function loadProducts() {
        axios.get('/api/products')
            .then(res => {
                productList.innerHTML = '';
                res.data.forEach(p => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td class="border px-2 py-1">${p.id}</td>
                        <td class="border px-2 py-1">${p.product_name}</td>
                        <td class="border px-2 py-1">
                            ${p.image ? `<img src="/${p.image}" class="w-12 h-12 object-cover" alt="thumb">` : ''}
                        </td>
                        <td class="border px-2 py-1">${p.price}</td>
                        <td class="border px-2 py-1">${p.quantity}</td>
                        <td class="border px-2 py-1">${p.category?.category_name || ''}</td>
                        <td class="border px-2 py-1">
                            <button onclick="editProduct(${p.id})" class="bg-yellow-400 px-2 py-1">Edit</button>
                            <button onclick="deleteProduct(${p.id})" class="bg-red-500 text-white px-2 py-1">Delete</button>
                        </td>
                    `;
                    productList.appendChild(tr);
                });
            })
            .catch(err => console.error('Error loading products:', err));
    }

    loadProducts();

    // Handle form submit (create/update)
    form.addEventListener('submit', e => {
        e.preventDefault();

        let id = productIdInput.value;
        let formData = new FormData();
        formData.append('product_name', productNameInput.value);
        formData.append('price', parseFloat(priceInput.value));
        formData.append('quantity', parseInt(quantityInput.value));
        formData.append('category_id', parseInt(categoryIdSelect.value));
        formData.append('admin_id', 1); // default admin for now
        if (imageInput.files[0]) formData.append('image', imageInput.files[0]);

        let url = '/api/products' + (id ? `/${id}` : '');
        let params = id ? { _method: 'PUT' } : {};

        axios.post(url, formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
            params: params
        })
        .then(res => {
            alert(id ? 'Product updated' : 'Product saved');
            form.reset();
            productIdInput.value = '';
            loadProducts();
        })
        .catch(err => {
            console.error('Save failed:', err.response.data);
            alert('Failed to save product. Check console for details.');
        });
    });

    // Edit product
    window.editProduct = function(id) {
        axios.get(`/api/products/${id}`)
            .then(res => {
                const p = res.data;
                productIdInput.value = p.id;
                productNameInput.value = p.product_name;
                priceInput.value = p.price;
                quantityInput.value = p.quantity;
                categoryIdSelect.value = p.category_id;
            })
            .catch(err => console.error('Error fetching product:', err));
    }

    // Delete product
    window.deleteProduct = function(id) {
        if(confirm('Are you sure?')) {
            axios.delete(`/api/products/${id}`)
                .then(res => {
                    alert('Product deleted');
                    loadProducts();
                })
                .catch(err => console.error('Error deleting product:', err));
        }
    }
});
</script>
</body>
</html>
