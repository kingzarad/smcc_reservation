<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .header {
            grid-area: header;
            padding: 30px;
            display: flex;
            justify-content: center;

            text-align: center;
        }

        .header .logo img {
            width: 100px;
            margin-right: 20px;
        }

        .container {
            margin: 20px;
            border: 1px dotted #333;
        }

        /* Style the middle column */
        .middle {
            background: red;
            width: 700px;
            margin: 0 auto;
        }

        .input-group input {
            border: none;

            padding: 5px;
            border-bottom: 1px solid #333;
        }

        .form-group {
            width: 100%;
        }

        .flex {
            display: flex;
            align-items: center;
        }

        .romans-font {
            font-family: "Times New Roman", Times, serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                LOGO
            </div>
            <div class="header-title">
                <h3 class="romans-font">
                    <strong>SAINT MICHAEL COLLEGE OF CARAGA</strong>
                </h3>
                <p>
                    Brgy. 4, Nasipit, Agusan del Norte, Caraga Region <br />
                    Tel. Nos. ( 085 ) 343-3251; ( 085 ) 283-3113
                </p>
                <h3><strong>PROPERTY MANAGMENT OFFICE</strong></h3>
                <h4 class="romans-font">PERMIT TO USE FORM (Requestor's Copy)👈🏻</h4>
            </div>
        </div>

        <div class="left">&nbsp;</div>
        <div class="middle">
            <table>
                <tr>
                    <td>
                        <div class="input-group">
                            <label>DATE FILED:</label>
                            <input type="text" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group">
                            <label>DATE FILED:</label>
                            <input type="text" />
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <label>DATE FILED:</label>
                            <input type="text" />
                        </div>
                    </td>
                </tr>
            </table>
            <div class="form-group">

            </div>
            <div class="form-group flex">
                <div class="form-right">
                    <div class="input-group">
                        <label>NAME:</label>
                        <input style="margin-left: 35px" type="text" />
                    </div>
                </div>
                <div class="form-left">
                    <div class="input-group" style="margin-left: 20px">
                        <label>POSITION: </label>
                        <input style="width: 250px" type="text" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label>DEPT:</label>
                    <input type="text" />
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label>VENUE HERE</label>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label>PURPOSE: </label>
                    <input style="width: 50vw" type="text" />
                </div>
            </div>
            <div class="form-group flex">
                <div class="form-right">
                    <div class="input-group">
                        <label>INSIDE THE SCHOOL</label>

                    </div>
                </div>
                <div class="form-left">
                    <div class="input-group" style="margin-left: 20px">
                        <label>OUTSIDE THE SCHOOL </label>

                    </div>
                </div>
            </div>
            <div class="form-group flex">
                <div class="form-right">
                    <div class="input-group">
                        <label>DATE USAGE:</label>
                        <input style="width: 175px" type="text" />
                    </div>
                </div>
                <div class="form-left">
                    <div class="input-group">
                        <label>TO: </label>
                        <input style="width: 175px" type="text" />
                    </div>
                </div>
                <div class="form-left">
                    <div class="input-group">
                        <label> DATE RETURN</label>
                        <input style="width: 180px" type="text" />
                    </div>
                </div>
            </div>
            <div class="form-group flex">
                <div class="form-right">
                    <div class="input-group">
                        <label>TIME USAGE:</label>
                        <input style="width: 175px" type="text" />
                    </div>
                </div>
                <div class="form-left">
                    <div class="input-group">
                        <label>TO: </label>
                        <input style="width: 175px" type="text" />
                    </div>
                </div>
                <div class="form-left">
                    <div class="input-group">
                        <label> TIME RETURN</label>
                        <input style="width: 180px" type="text" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label>FACILITIES TO BE USED:</label>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label>REMARKS:</label>
                    <input style="width: 50vw" type="text" />
                </div>
            </div>
        </div>
        <div class="right">&nbsp;</div>
    </div>
</body>

</html>
