let quantity = document.getElementById('productQuantity');

quantity.addEventListener("input", async function() {
    const selectedValue = parseInt(this.value);
    
    let productSelected = document.getElementById("menuSection");

    const endpoint = '/configs/database/getAllProducts.php';
  
    try {
        const response = await fetch(endpoint);
        const result = await response.json();

        let product = result.find(p => p.id == productSelected.value);
            product = product.value;

        let finalValue = product * selectedValue;

        document.getElementById("labelProd").textContent = `Final Value: $${finalValue}`;
    } catch(error) {
        console.log(error);
    };
});