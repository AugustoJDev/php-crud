function addProducts() {
    event.preventDefault();

    const modal = document.getElementById("prodModal");

    if (modal.hasAttribute("hidden")) {
        modal.removeAttribute("hidden");
    } else {
        modal.setAttribute("hidden", "");
    };
};

async function seeProducts() {
    event.preventDefault();

    const modal = document.getElementById("seeProducts");

    if (modal.hasAttribute("hidden")) {
        modal.removeAttribute("hidden");

        let products = localStorage.getItem('products');

        if(!products) return;

        products = JSON.parse(products);

        function compareValues(a, b) {
            const valueA = a.fval;
            const valueB = b.fval;
        
            return valueA - valueB;
        };

        products.sort(compareValues);

        for (keys in products) {

            let name = await getById(products[keys]._id);

            let data = {
                name: name,
                quantity: products[keys].qtt,
                value: products[keys].fval
            };
            
            async function getById(_id) {
                const endpoint = '/configs/database/getAllProducts.php';
            
                const response = await fetch(endpoint);
                const result = await response.json();
            
                let product = result.find(p => p.id == _id);
                product = `${product.name} ${product.size || ""}`;
            
                return product;
            };
            
            function addToList(data) {
                var table = document.getElementById("seeList").getElementsByTagName('tbody')[0];
                var newRow = table.insertRow(table.length);
                cell1 = newRow.insertCell(0);
                cell1.innerHTML = data.name;
                cell2 = newRow.insertCell(1);
                cell2.innerHTML = data.quantity;
                cell3 = newRow.insertCell(2);
                cell3.innerHTML = data.value;
            }

            addToList(data);
        }
    } else {
        modal.setAttribute("hidden", "");

        var tableBody = document.getElementById("prodList");
            tableBody.innerHTML = "";
    };
};