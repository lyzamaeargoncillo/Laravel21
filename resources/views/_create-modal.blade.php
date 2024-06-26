<div id="createProductModal" class="fixed inset-0 bg-gray-500 bg-opacity-80 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Create Product
                    </h3>
                    <div class="mt-2">
                        <form id="createProductForm"
                            hx-trigger="submit"
                            hx-post="/api/products"
                            hx-target="#product-list"
                            hx-swap="innerHTML"
                            class="w-full">
                            <div class="mb-3 flex flex-col">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="rounded border border-gray-400 p-2 w-full">
                            </div>
                            <div class="mb-3 flex flex-col">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="rounded border border-gray-400 p-2 w-full"></textarea>
                            </div>
                            <div class="mb-3 flex flex-col">
                                <label for="price">Price</label>
                                <input type="number" id="price" name="price" class="rounded border border-gray-400 p-2 w-full">
                            </div>
                            <div class="mb-3 flex flex-col">
                                <label for="quantity">Quantity</label>
                                <input type="number" id="quantity" name="quantity" class="rounded border border-gray-400 p-2 w-full">
                            </div>
                            <div class="mb-3 flex flex-col">
                                <label for="image_url">Image URL</label>
                                <input type="text" id="image_url" name="image_url" class="rounded border border-gray-400 p-2 w-full">
                            </div>

                        <div class="flex justify-between">
                            <button class="bg-blue-600 px-4 py-2 text-white rounded">Save Product</button>
                            <button class="bg-red-600 text-white px-4 py-2 rounded"
                                    onclick="document.getElementById('creatProductModal').classList.add('')"></button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>