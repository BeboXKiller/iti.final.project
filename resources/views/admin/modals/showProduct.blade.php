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
                        <h3 class="text-2xl font-heading font-bold mb-2" id="product-name">

                        </h3>
                        
                        <p class="text-gray-600 mb-4" id="product-description"></p>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                            <p class="text-sm text-gray-500">Product ID</p>
                            <p class="font-medium" id="product-id"></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500" >Price</p>
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
                                <p class="text-sm text-gray-500" >Status</p>
                                
                                    <p id="product-status"></p>
                                   
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="border-t border-gray-200 pt-4">
                    <h4 class="font-medium mb-2">Product Details</h4>
                    <ul class="list-disc pl-5 space-y-1 text-gray-600">
                        <li>Lightweight, breathable fabric</li>
                        <li>Elastic waist for comfort</li>
                        <li>A-line silhouette</li>
                        <li>Machine washable</li>
                        <li>Imported</li>
                    </ul>
                </div> --}}
            </div>
            <div class="p-6 border-t border-gray-200 flex justify-end">
                <button class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-accent" onclick="closeModal('view-product-modal')">Close</button>
            </div>
        </div>
    </div>
<script>
function openProductModal(id, name, description, price, quantity, category ,imgPath) {
    // Populate modal with student data
    document.getElementById('product-name').textContent = name;
    document.getElementById('product-description').textContent = description;
    document.getElementById('product-price').textContent = '$' + price;
    document.getElementById('product-quantity').textContent = quantity;
    document.getElementById('product-category').textContent = category;
    document.getElementById('product-id').textContent = id;
    document.getElementById('product-img').src = imgPath;

    if (quantity == 0){
        document.getElementById('product-status').innerHTML = '<p class=" py-1 text-red-800 text-l rounded-full">Out of Stock</p>'
    } 
    if(quantity >= 30){
        document.getElementById('product-status').innerHTML = '<p class=" py-1 text-green-800 text-l rounded-full">Active</p>' 
    }
    if(quantity <= 30) {
        document.getElementById('product-status').innerHTML = '<p class=" py-1 text-yellow-800 text-l rounded-full">Low Stock</p>'
    }
    openModal('view-product-modal');
    
}
</script>