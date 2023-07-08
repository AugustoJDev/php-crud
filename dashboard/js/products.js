window.onload = async function () {
    const endpoint = '/configs/database/getAllProducts.php';

    try {
        const response = await fetch(endpoint);
        const result = await response.json();
          
        result.sort(compareValues);

        for(keys in result) {
            addToList(result[keys]);
        }
    } catch(error) {
        console.log(error);
    };
};

function addToList(item) {
    let section = document.getElementById("menuSection");
    let opt = document.createElement("option");

    if(item.size != null) {
        opt.text = `${item.name} ${item.size}cm | $${item.value} UN`;
    } else {
        opt.text = `${item.name} | $${item.value} UN`;
    };

    opt.value = item.id;

    section.appendChild(opt);
}

function compareValues(a, b) {
    const valueA = a.value;
    const valueB = b.value;
    
    return valueA - valueB;
}

async function POST(endpoint) {

    const options = {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json',
        },
        body: JSON.stringify({ table: "products" })
    };

    try {
        const response = await fetch(endpoint, options);
        const result = await response.json();

        console.log(result);
    } catch(error) {
        console.log(error);
    };
};