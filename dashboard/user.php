<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../css/member.css" type="text/css">
</head>

<body>
    <h1>Welcome to the user panel: <?php include '../configs/userInfos.php' ?></h1>
    <table>
        <tr>
            <td>
                <form onsubmit="event.preventDefault();onFormSubmit();" autocomplete="off">
                    <div>
                        <label><strong>Name</strong></label><label class="validation-error hide"
                            id="nameValidationError-name">This field is required.</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div>
                        <label><strong>Contact</strong></label><label class="validation-error hide"
                            id="nameValidationError-contact">This field is required.</label>
                        <input type="text" name="contact" id="contact">
                    </div>
                    <div>
                        <label><strong>Delivery</strong></label><label class="validation-error hide"
                            id="nameValidationError-delivery">This field is required.</label>
                        <input type="date" class="date-input" name="delivery" id="delivery">
                    </div>
                    <div>
                        <label><strong>Value</strong></label><label class="validation-error hide"
                            id="nameValidationError-value">This field is required.</label>
                        <input type="text" name="value" id="value">
                    </div>
                    <div id="buttonContainer">
                        <div class="frame" id="prodButton" onClick="addProducts();">
                            <button class="configs-btn btn-1">Products</button>
                        </div>
                        <div id="seeButton" title="See all products addeds" onClick="seeProducts();">
                            <img src="https://img.icons8.com/?size=45&id=986&format=png">
                        </div>
                    </div>
                    <div class="form-action-buttons">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </td>
            <td>
                <table class="list" id="employeeList">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Delivery</th>
                            <th>Value</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </td>
        </tr>
    </table>

    <script src="js/manager.js"></script>
    <script src="js/utilities/modalManager.js"></script>

    <div class="modal fade" id="prodModal" role="dialog" hidden>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onClick="addProducts();">&times;</button>
                    <h4 class="modal-title">Add Products</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data">
                        <div class="selectItem">
                            <label class="menu-items">Select an Item:</label>
                            <select id="menuSection" class="productsMenu"></select>
                        </div>
                        <div class="selectQuantity">
                            <label class="item-value">Select Quantity:</label>
                            <input type="number" min="1" name="value" id="productQuantity">
                        </div>
                        <div class="finalValue">
                            <label id="labelProd">Final Value: $0</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="closeBtn" onClick="addProducts();" style="--c:#E95A49">Close</button>
                    <button type="button" class="saveBtn" id="saveBtn">Add</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="seeProducts" role="dialog" hidden>
        <div class="modal-dialog" role="document">
            <div class="modal-header">
                <button type="button" class="close" onClick="seeProducts();">&times;</button>
                <h4 class="modal-title">Your Products</h4>
            </div>
            <div class="modal-content">
                <td>
                    <table class="list" id="seeList">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody id="prodList"></tbody>
                    </table>
                </td>
            </div>
        </div>
    </div>

    <script src="js/products.js"></script>
    <script src="js/utilities/calcProd.js"></script>
</body>

</html>