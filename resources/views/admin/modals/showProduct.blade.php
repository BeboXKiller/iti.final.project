<div class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 opacity-0 pointer-events-none" id="view-product-modal">
    <div class="bg-white rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-heading font-bold">Product Details</h2>
        </div>
        <div class="p-6">
            <div class="flex flex-col md:flex-row gap-6 mb-6">
                <div class="w-full md:w-1/3">
                    <img alt=" " class="w-full h-48 bg-gray-200 rounded-lg" id="product-img">
                </div>
                <div class="w-full md:w-2/3">
                    <h3 class="text-2xl font-heading font-bold mb-2" id="product-name"></h3>
                    
                    <p class="text-gray-600 mb-4" id="product-description"></p>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Product ID</p>
                            <p class="font-medium" id="product-id"></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Price</p>
                            <p class="font-medium" id="product-price"></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Category</p>
                            <p class="font-medium" id="product-category"></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Stock</p>
                            <p class="font-medium" id="product-quantity"></p>
                        </div>
                        <div>
                            <p class="text-sm  text-gray-500">Status</p>
                            <p class="flex" id="product-status"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="p-6 border-t border-gray-200 flex justify-end">
            <button class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-accent" onclick="closeModal('view-product-modal')">Close</button>
        </div>
    </div>
</div>


