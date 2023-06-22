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
    <h1>Seja bem-vindo ao painel de usuário: <?php include '../configs/userInfos.php' ?></h1>
	<table>
        <tr>
            <td>
            <form onsubmit="event.preventDefault();onFormSubmit();" autocomplete="off">
                    <div>
                        <label>Name</label><label class="validation-error hide" id="nameValidationError">This field is required.</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div>
                        <label>Contact</label>
                        <input type="text" name="contact" id="contact">
                    </div>
                    <div>
                        <label>Delivery</label>
                        <input type="date" name="delivery" id="delivery">
                    </div>
                    <div>
                        <label>Value</label>
                        <input type="text" name="value" id="value">
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
    <script src="user.js"></script>
</body>
</html>