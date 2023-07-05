<?php date_default_timezone_set('America/Sao_Paulo'); ?>

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
                        <label><strong>Name</strong></label><label class="validation-error hide" id="nameValidationError">This field is required.</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div>
                        <label><strong>Contact</strong></label>
                        <input type="text" name="contact" id="contact">
                    </div>
                    <div>
                        <label><strong>Delivery</strong></label>
                        <input type="date" class="date-input" name="delivery" id="delivery">
                    </div>
                    <div>
                        <label><strong>Value</strong></label>
                        <input type="text" name="value" id="value">
                    </div>
                    <div class="modalBtn">
                        <button id="openModalBtn">Products</button>
                    </div>
                    <div  class="form-action-buttons">
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
    <div id="prodModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Modal Title</h2>
            <p>Modal content goes here...</p>
        </div>
    </div>
    <script src="js/manager.js"></script>
    <script src="js/modal.js"></script>
</body>
</html>