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
                    <div class="frame" id="prodButton" onClick="modalManager();">
                        <button class="configs-btn btn-1">Products</button>
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

    <script src="js/manager.js"></script>

    <script>
        function modalManager() {

            const baseUrl = window.location.href;

            console.log(baseUrl);

            if(!baseUrl.includes('?prodModal=')) {
                window.location.href = `${baseUrl}?prodModal=true`
            } else if (baseUrl.includes('?prodModal=true')) {
                window.location.href = baseUrl.replace("true", "false")
            } else if (baseUrl.includes('?prodModal=false')) {
                window.location.href = baseUrl.replace("false", "true")
            }
        }
    </script>

    <?php if(isset($_GET['prodModal']) && $_GET['prodModal'] === 'true'): ?>

        <script>
            (function() {
                $('#prodModal').modal('show');
            });
        </script>

        <div class="modal fade" id="prodModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Data</h4>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data"><?php $message ?></div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="modalManager();">Close</button>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>
    <?php if(isset($_GET['prodModal']) && $_GET['prodModal'] === 'false'): ?>
        <script>
            (function() {
                $('#myModal').modal('hide');
            });
        </script>
    <?php endif; ?>
</body>
</html>