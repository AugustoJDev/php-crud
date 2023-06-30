var selectedRow = null;

// This OnLoad get all users of database and lists all in the admin page

window.onload = async function () {
    const url = '/configs/database/getAll.php';

    try {
        const response = await fetch(url);
        const result = await response.json();

        function compareDates(a, b) {
            const dateA = new Date(a.delivery);
            const dateB = new Date(b.delivery);
            
            return dateA - dateB;
        }
          
        result.sort(compareDates);

        for(keys in result) {
            addToList(result[keys]);
        }
    } catch(error) {
        console.log(error);
    };
}

function onFormSubmit() {
    if (validate()) {
        var formData = readFormData();
        if (selectedRow == null)
            insertNewRecord(formData);
        else
            updateRecord(formData);
        resetForm();
    }
}

function readFormData() {
    var formData = {};
    formData["name"] = document.getElementById("name").value;
    formData["contact"] = document.getElementById("contact").value;
    formData["delivery"] = document.getElementById("delivery").value;
    formData["value"] = document.getElementById("value").value;
    return formData;
}

async function insertNewRecord(data) {

    POST('add', data);
    addToList(data);
}

function resetForm() {
    document.getElementById("name").value = "";
    document.getElementById("contact").value = "";
    document.getElementById("delivery").value = "";
    document.getElementById("value").value = "";
    selectedRow = null;
}

function onEdit(td) {

    selectedRow = td.parentElement.parentElement;
    document.getElementById("name").value = selectedRow.cells[0].innerHTML;
    document.getElementById("contact").value = selectedRow.cells[1].innerHTML;
    document.getElementById("delivery").value = selectedRow.cells[2].innerHTML;
    document.getElementById("value").value = selectedRow.cells[3].innerHTML;
}
function updateRecord(formData) {
    selectedRow.cells[0].innerHTML = formData.name;
    selectedRow.cells[1].innerHTML = formData.contact;
    selectedRow.cells[2].innerHTML = formData.delivery;
    selectedRow.cells[3].innerHTML = formData.value;

    POST('edit', formData);
}

async function onDelete(td) {
    if (confirm('Are you sure to delete this user?')) {

        let data = { name: td.parentElement.parentElement.innerText.split("	")[0] };

        POST('delete', data)

        row = td.parentElement.parentElement;
        document.getElementById("employeeList").deleteRow(row.rowIndex);
        resetForm();
    }
}
function validate() {
    isValid = true;

    if (document.getElementById("name").value == "") {
        isValid = false;
        document.getElementById("nameValidationError").classList.remove("hide");
    } else {
        isValid = true;
        if (!document.getElementById("nameValidationError").classList.contains("hide"))
            document.getElementById("nameValidationError").classList.add("hide");
    }
    return isValid;
}

function addToList(data) {
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
                       <a onClick="onDelete(this)"><button class="delete">Delete</button></a>`;
}

// Send a post request to an especify endpoint using the data received, like add an user to list or delete this same user

async function POST(endpoint, data) {
    const url = `/configs/database/${endpoint}.php`;

    const options = {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    };

    try {
        const response = await fetch(url, options);
        const result = await response.json();

        console.log(result);
    } catch(error) {
        console.log(error);
    };
}