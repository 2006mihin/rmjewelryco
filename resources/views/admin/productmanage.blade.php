<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Products</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-6 bg-gray-500">

<div class="container mx-auto px-4 py-8">

    <div class="mb-6">
        <a href="{{ route('admin.dashboard') }}" 
           class="inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
            &larr; Back to Dashboard
        </a>
    </div>

    <h1 class="text-3xl font-bold mb-6 text-center text-gray-1000">Product Management</h1>

    <div class="bg-white p-6 rounded-lg shadow mb-10">
        <form id="productForm" class="space-y-4">
            <input type="hidden" id="productId">

            <div>
                <label class="block font-medium text-gray-700">Product Name:</label>
                <input type="text" id="productName" class="border p-2 w-full rounded">
            </div>

            <div>
                <label class="block font-medium text-gray-700">Price:</label>
                <input type="number" step="0.01" id="price" class="border p-2 w-full rounded">
            </div>

            <div>
                <label class="block font-medium text-gray-700">Quantity:</label>
                <input type="number" id="quantity" class="border p-2 w-full rounded">
            </div>

            <div>
                <label class="block font-medium text-gray-700">Category:</label>
                <select id="categoryId" class="border p-2 w-full rounded">
                    <option value="">Select category</option>
                </select>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Image:</label>
                <input type="file" id="image" class="border p-2 w-full rounded">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                Save Product
            </button>
        </form>
    </div>

    <!-- Products Table -->
    <div class="overflow-x-auto rounded-lg shadow-md bg-white p-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Product List</h2>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Image</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Price</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Quantity</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Category</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody id="productList" class="divide-y divide-gray-200"></tbody>
        </table>
    </div>
</div>

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

    // Load categories
    axios.get('/api/categories')
        .then(res => {
            res.data.forEach(cat => {
                const option = document.createElement('option');
                option.value = cat.id;
                option.textContent = cat.category_name;
                categoryIdSelect.appendChild(option);
            });
        }).catch(err => console.error('Error loading categories:', err));

    // Load products
    function loadProducts() {
        axios.get('/api/products')
            .then(res => {
                productList.innerHTML = '';
                res.data.forEach(p => {
                    const tr = document.createElement('tr');
                    tr.classList.add('hover:bg-gray-50', 'transition');
                    tr.innerHTML = `
                        <td class="px-6 py-3 text-sm text-gray-700">${p.id}</td>
                        <td class="px-6 py-3 text-sm text-gray-700">${p.product_name}</td>
                        <td class="px-6 py-3 text-sm text-gray-700">
                            ${p.image ? `<img src="/${p.image}" class="w-12 h-12 object-cover rounded" alt="thumb">` : ''}
                        </td>
                        <td class="px-6 py-3 text-sm text-gray-700">${p.price}</td>
                        <td class="px-6 py-3 text-sm text-gray-700">${p.quantity}</td>
                        <td class="px-6 py-3 text-sm text-gray-700">${p.category?.category_name || ''}</td>
                        <td class="px-6 py-3 text-sm text-gray-700 space-x-2">
                            <button onclick="editProduct(${p.id})" class="bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500 transition">Edit</button>
                            <button onclick="deleteProduct(${p.id})" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition">Delete</button>
                        </td>
                    `;
                    productList.appendChild(tr);
                });
            }).catch(err => console.error('Error loading products:', err));
    }

    loadProducts();

    // Handle form submit 
    form.addEventListener('submit', e => {
        e.preventDefault();
        let id = productIdInput.value;
        let formData = new FormData();
        formData.append('product_name', productNameInput.value);
        formData.append('price', parseFloat(priceInput.value) || 0);
        formData.append('quantity', parseInt(quantityInput.value) || 0);
        formData.append('category_id', parseInt(categoryIdSelect.value) || null);
        formData.append('admin_id', 1); 
        if(imageInput.files[0]) formData.append('image', imageInput.files[0]);
        if(id) formData.append('_method', 'PUT');

        axios.post('/api/products' + (id ? `/${id}` : ''), formData, {
            headers: {'X-Requested-With': 'XMLHttpRequest'}
        })
        .then(res => {
            alert(id ? 'Product updated' : 'Product saved');
            form.reset(); productIdInput.value = '';
            loadProducts();
        }).catch(err => console.error('Error saving product:', err));
    });

    window.editProduct = function(id) {
        axios.get(`/api/products/${id}`)
            .then(res => {
                const p = res.data;
                productIdInput.value = p.id;
                productNameInput.value = p.product_name;
                priceInput.value = p.price;
                quantityInput.value = p.quantity;
                categoryIdSelect.value = p.category_id;
            }).catch(err => console.error('Error fetching product:', err));
    }

    window.deleteProduct = function(id) {
        if(confirm('Are you sure?')) {
            axios.delete(`/api/products/${id}`)
                .then(res => { loadProducts(); })
                .catch(err => console.error('Error deleting product:', err));
        }
    }
});
</script>
</body>
</html>
