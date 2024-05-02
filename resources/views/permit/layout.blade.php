<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        .container {
            width: 100%;
        }

        .header-main {
            margin: 0 20% 20%;
            width: 500px;

        }

        .content-main {
            margin: 0 auto;
            width: 800px;

        }

        .header {
            float: left;
            padding: 15px;

        }

        .content {
            margin-top: -60px;
            float: left;
            padding: 15px;
        }

        .header-logo {
            margin-top: 10%;
            margin-right: 5px;
        }

        .header-logo img {
            background: red;
        }

        .header-content {
            text-align: center;
            width: 500px;
        }

        .input-group input {
            margin-bottom: -5px;
            padding: 10px;
            border: none;
            border-bottom: 1px solid #333;
        }

        .flex-container {
            margin: 0px;
        }

        .flex {
            float: left;
        }


        .flex-container1 {
            margin: 0px;
        }

        .flex1 {
            float: left;
        }
        .romans-font {
            font-family: "Times New Roman", Times, serif;
            padding: 0px;
            margin: 3px;
        }
    </style>
</head>

<body>
    <div class="header-main">
        <div class="header header-logo">
            LOGO
            <img src="" alt="LOGO">
        </div>
        <div class="header header-content">
            <h3 class="romans-font">
                <strong>SAINT MICHAEL COLLEGE OF CARAGA</strong>
            </h3>
            <p style="padding: 0px; margin:0px">
                Brgy. 4, Nasipit, Agusan del Norte, Caraga Region <br />
                Tel. Nos. ( 085 ) 343-3251; ( 085 ) 283-3113
            </p>
            <h4 style="padding: 0px; margin:5px"><strong>PROPERTY MANAGMENT OFFICE</strong></h4>
            <h4 class="romans-font">PERMIT TO USE FORM (Requestor's Copy)👈🏻</h4>
        </div>
    </div>
    <div class="content-main">
        <div class="content">
            <div class="input-group" style="margin-bottom: 7px">
                <label>DATE FILLED:</label>
                <input type="text">
            </div>
            <div class="flex-container" style="margin-bottom: 7px">
                <div class=" flex input-group">
                    <label>NAME:</label>
                    <input type="text">
                </div>
                <div class=" flex input-group">
                    <label>POSITION:</label>
                    <input type="text">
                </div>
            </div>
            <div class="input-group" style="margin-bottom: 7px">
                <label>DEPT:</label>
                <input type="text">
            </div>
            <div class="input-group">
                <label>PURPOSE:</label>
                <input type="text">
            </div>
            <div class="flex-container1" style="margin-bottom: 7px">
                <div class=" flex1 input-group">
                    <label>NAME:</label>
                    <input type="text">
                </div>
                <div class=" flex input-group">
                    <label>POSITION:</label>
                    <input type="text">
                </div>
                <div class=" flex input-group">
                    <label>POSITION:</label>
                    <input type="text">
                </div>
            </div>
        </div>
    </div>
</body>

</html>
