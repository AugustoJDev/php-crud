window.onload = async function () {
    const endpoint = '/configs/database/getAllProducts.php';

    GET(endpoint);
    addToTable();
};

async function addToTable() {
    localStorage.clear();

    const url = '/configs/database/getAllUsers.php';

    try {
        const response = await fetch(url);
        const result = await response.json();

        function compareDates(a, b) {
            const dateA = new Date(a.delivery);
            const dateB = new Date(b.delivery);

            return dateA - dateB;
        }

        result.sort(compareDates);

        for (keys in result) {
            addToCell(result[keys]);
        }
    } catch (error) {
        console.log(error);
    };
}

let addButton = document.getElementById("saveBtn");

addButton.addEventListener('click', () => {
    let productSelected = document.getElementById("menuSection").value;
    let productQuantity = document.getElementById("productQuantity").value;
    let finalValue = document.getElementById("labelProd").textContent.split("$")[1];
    let valueInput = document.getElementById("value")

    let product = {
        _id: productSelected,
        qtt: productQuantity,
        fval: finalValue
    };

    let productsLocal = localStorage.getItem("products");

    if (!productsLocal) {
        localStorage.setItem("products", JSON.stringify([product]));

        valueInput.value = product.fval;

        alert("Product added with success! Add new items or close the window to continue.");
    } else {
        productsLocal = JSON.parse(productsLocal);
        productsLocal.push(product);

        let val = 0;

        for (keys in productsLocal) {
            val = Number(productsLocal[keys].fval) + val;
        };

        valueInput.value = val;

        productsLocal = JSON.stringify(productsLocal);
        localStorage.setItem("products", productsLocal);

        alert("Product added with success! Add new items or close the window to continue.");
    };
});

function compareValues(a, b) {
    const valueA = a.value;
    const valueB = b.value;

    return valueA - valueB;
};

async function GET(endpoint) {
    try {
        const response = await fetch(endpoint);
        const result = await response.json();

        result.sort(compareValues);

        for (keys in result) {
            addToList(result[keys]);
        }
    } catch (error) {
        console.log(error);
    };
};

function addToList(item) {
    let section = document.getElementById("menuSection");
    let opt = document.createElement("option");

    if (item.size != null) {
        opt.text = `${item.name} ${item.size}cm | $${item.value} UN`;
    } else {
        opt.text = `${item.name} | $${item.value} UN`;
    };

    opt.value = item.id;

    section.appendChild(opt);
};

function addToCell(data) {

    var table = document.getElementById("employeeList").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
    cell1.innerHTML = data.name;
    cell2 = newRow.insertCell(1);
    cell2.innerHTML = data.contact;
    cell3 = newRow.insertCell(2);
    cell3.innerHTML = data.delivery;
    cell4 = newRow.insertCell(3);
    cell4.innerHTML = data.value;
    cell4 = newRow.insertCell(4);
    cell4.innerHTML = `<a onClick="onEdit(this)"><button class="edit">Edit</button></a>
                       <a onClick="onDelete(this)"><button class="delete">Delete</button></a>
                       <a onClick="onProducts(this)"><button class="products">Products</button></a>`;
}