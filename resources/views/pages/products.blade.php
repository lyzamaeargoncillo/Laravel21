@extends('templates.base')

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-xl">Product List</h1>
        <div class="flex items-center">
            <form hx-get="/api/products"
                  hx-target="#product-list"
                  hx-trigger="submit"
                  class="mr-4"
            >
                <input type="text" name="filter" class="p-2 border border-gray-300 rounded mb-2">
            </form>
            <button type="button" onclick="openModal()" class="bg-blue-500 text-white p-2 rounded">Add Product</button>
        </div>
    </div>
    <hr>
    <div id="product-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 mt-3"
         hx-get="/api/products"
         hx-trigger="load"
         hx-swap="innerHTML">
        <!-- Example of product card -->
        <div class="bg-white p-4 rounded shadow-md">
            <img src="product_image_url" alt="Product Image" class="w-full h-48 object-cover mb-2 rounded">
            <h3 class="text-lg font-semibold mb-2">Product Name</h3>
            <p class="text-gray-700 mb-2">Product Description</p>
            <div class="flex justify-between items-center">
                <span class="text-gray-900 font-bold">$Product Price</span>
                <span class="text-gray-600">Quantity: Product Quantity</span>
            </div>
        </div>
        <!-- Repeat product card as needed -->
    </div>

    <!-- The Modal -->
    <div id="myModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75 hidden">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
            <h2 class="text-lg mb-4">Add New Product</h2>
            <form id="productForm" class="flex flex-col space-y-4" hx-post="/api/products" hx-trigger="submit" hx-swap="none">
                @csrf
                <input type="text" name="name" placeholder="Name" class="p-2 border border-gray-300 rounded" required>
                <textarea name="description" placeholder="Description" class="p-2 border border-gray-300 rounded" required></textarea>
                <input type="number" name="price" placeholder="Price" class="p-2 border border-gray-300 rounded" required>
                <input type="number" name="quantity" placeholder="Quantity" class="p-2 border border-gray-300 rounded" required>
                <input type="url" name="image_url" placeholder="Image URL" class="p-2 border border-gray-300 rounded" required>
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()" class="bg-red-500 text-white p-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Success Message -->
    <div id="successMessage" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75 hidden">
        <div class="bg-white p-6 rounded shadow-lg">
            <p class="text-lg mb-4">The product has been saved</p>
            <div class="flex justify-end">
                <button type="button" onclick="addAnotherProduct()" class="bg-blue-500 text-white p-2 rounded mr-2">Save Another</button>
                <button type="button" onclick="closeSuccessMessage()" class="bg-blue-500 text-white p-2 rounded">Close</button>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('myModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('myModal').classList.add('hidden');
        }

        function closeSuccessMessage() {
            document.getElementById('successMessage').classList.add('hidden');
        }

        function addAnotherProduct() {
            document.getElementById('successMessage').classList.add('hidden');
            openModal();
        }

        document.body.addEventListener('htmx:afterRequest', function (event) {
            if (event.detail.target.id === 'productForm' && event.detail.xhr.status === 200) {
                closeModal();
                document.getElementById('successMessage').classList.remove('hidden');
                document.getElementById('productForm').reset();
                htmx.trigger(document.querySelector('#product-list'), 'load');
            }
        });

        document.body.addEventListener('htmx:responseError', function (event) {
            if (event.detail.target.id === 'productForm') {
                alert('Failed to save product: ' + event.detail.xhr.responseText);
            }
        });
    </script>
@endsection
