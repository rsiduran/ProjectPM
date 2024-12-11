    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="style.css">
        
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Responsive Regisration Form </title>
    </head>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    body{
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #dddddd;
    }
    .container{
        position: relative;
        max-width: 900px;
        width: 100%;
        border-radius: 6px;
        padding: 30px;
        margin: 0 15px;
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    }
    .container header{
        position: relative;
        font-size: 20px;
        font-weight: 600;
        color: #333;
    }
    .container header::before{
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        height: 3px;
        width: 27px;
        border-radius: 8px;
        background-color: #4070f4;
    }
    .container form{
        position: relative;
        margin-top: 16px;
        min-height: 590px;
        background-color: #fff;
        overflow: hidden;
    }
    .container form .form{
        position: absolute;
        background-color: #fff;
        transition: 0.3s ease;
    }
    .container form .form.second{
        opacity: 0;
        pointer-events: none;
        transform: translateX(100%);
    }
    form.secActive .form.second{
        opacity: 1;
        pointer-events: auto;
        transform: translateX(0);
    }
    form.secActive .form.first{
        opacity: 0;
        pointer-events: none;
        transform: translateX(-100%);
    }
    .container form .title{
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
        font-weight: 500;
        margin: 6px 0;
        color: #333;
    }
    .container form .fields{
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    form .fields .input-field{
        display: flex;
        width: calc(100% / 3 - 15px);
        flex-direction: column;
        margin: 4px 0;
    }
    .input-field label{
        font-size: 12px;
        font-weight: 500;
        color: #2e2e2e;
    }
    .input-field input, select{
        outline: none;
        font-size: 14px;
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding: 0 15px;
        height: 42px;
        margin: 8px 0;
    }
    .input-field input :focus,
    .input-field select:focus{
        box-shadow: 0 3px 6px rgba(0,0,0,0.13);
    }
    .input-field select,
    .input-field input[type="date"]{
        color: #707070;
    }
    .input-field input[type="date"]:valid{
        color: #333;
    }
    .container form button, .backBtn{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 45px;
        max-width: 200px;
        width: 100%;
        border: none;
        outline: none;
        color: #fff;
        border-radius: 5px;
        margin: 25px 0;
        background-color: #4070f4;
        transition: all 0.3s linear;
        cursor: pointer;
    }
    .container form .btnText{
        font-size: 14px;
        font-weight: 400;
    }
    form button:hover{
        background-color: #265df2;
    }
    form button i,
    form .backBtn i{
        margin: 0 6px;
    }
    form .backBtn i{
        transform: rotate(180deg);
    }
    form .buttons{
        display: flex;
        align-items: center;
    }
    form .buttons button , .backBtn{
        margin-right: 14px;
    }

    @media (max-width: 750px) {
        .container form{
            overflow-y: scroll;
        }
        .container form::-webkit-scrollbar{
        display: none;
        }
        form .fields .input-field{
            width: calc(100% / 2 - 15px);
        }
    }

    @media (max-width: 550px) {
        form .fields .input-field{
            width: 100%;
        }
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 40px;
        background: transparent;
        border: none;
        font-size: 70px;
        color: #333;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .close-btn:hover {
        color: #f00; 
    }
    .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4); /* Black with transparency */
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            border-radius: 8px;
        }
    </style>
    <body>
        <div class="container">    
        <button class="close-btn" id="closeButton">&times;</button>
            <header>Detainee Personal Record</header>

            <form action="#">
                <div class="form first">
                    <div class="details personal">
                        <span class="title">Personal Details</span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Full Name</label>
                                <input type="text">
                            </div>

                            <div class="input-field">
                                <label>Date of Capture</label>
                                <input type="date"> 
                            </div>

                            <div class="input-field">
                                <label>Date of Birth</label>
                                <input type="text">
                            </div>

                            <div class="input-field">
                                <label>Nationality</label>
                                <input type="text">
                            </div>

                            <div class="input-field">
                                <label>Gender</label>
                                <input type="text">
                            </div>

                            <div class="input-field">
                                <label>Education</label>
                                <input type="text">
                            </div>
                            <div class="input-field">
                                <label>Physical Condition</label>
                                <input type="text">
                            </div>
                            <div class="input-field">
                                <label>Place of Capture</label>
                                <input type="text">
                            </div>
                            <div class="input-field">
                                <label>Place of Birth</label>
                                <input type="text">
                            </div>
                            <div class="input-field">
                                <label>Address</label>
                                <input type="text">
                            </div>
                            <div class="input-field">
                                <label>Father's Name</label>
                                <input type="text">
                            </div>
                            <div class="input-field">
                                <label>Mother's Name</label>
                                <input type="text">
                            </div>
                            <div class="input-field">
                                <label>Prepared By</label>
                                <input type="text">
                            </div>
                            <div class="input-field">
                                <label>Date Prepared</label>
                                <input type="text">
                            </div>
                            <div class="input-field">
                                <label>Place of the Prison</label>
                                <input type="text">
                            </div>
                        </div>
                            
                    </div>
                            
                    <div class="details ID">
                        <span>Photo Of Inmate</span>
                        <div class="fields">
                            <div class="input-field">
                                <label>Photo (Front)</label>
                                <button type="photo" class="submit-btn" id="submitButton">Click Photo</button>
                            </div>
                            
                            <div class="input-field">
                                <label>Place of the Prison</label>
                                <button type="photo" class="submit-btn" id="submitButton1">Click Photo</button>
                            </div>
                            <div class="input-field">
                            </div>
                        </div>

                    </div> 
                </div>
                <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <h2>Modal Content</h2>
        <p>This is where the content of your modal will go, such as a camera or photo upload section.</p>
    </div>
</div>
            </form>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            // Close button functionality: Redirect to record.php
            document.getElementById('closeButton').addEventListener('click', function() {
                window.location.href = '../AdminSide/Records.php';
            });
        });
            // Get modal and button elements
            var modal = document.getElementById("myModal");
            var btn = document.getElementById("submitButton");
            var span = document.getElementById("closeModal");

            // When the user clicks the button, open the modal
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
            // Get modal and button elements
            var modal = document.getElementById("myModal");
            var btn = document.getElementById("submitButton1");
            var span = document.getElementById("closeModal");

            // When the user clicks the button, open the modal
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
            </script>
            

        <script src="script.js"></script>
    </body>
</html>