<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
    }

    body {
        /* this project is designed desktop only */
        min-width: 1500px;
        background-color: #d5e1df;
    }

    header {
        background-image: linear-gradient(to right, #fc5c7d, #6a82fb);
        position: fixed;
        top: 0px;
        height: 100px;
        background-color: black;
        width: 100%;
        z-index: 10;
        /* this project is designed desktop only */
        min-width: 1500px;
    }

    .header-flex {
        height: 100%;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1280px;
        margin-left: auto;
        margin-right: auto;
        font-size: 20px;
    }

    h2 {
        text-align: center;
        padding-bottom: 10px;
        width: 500px;
        margin-top: 100px;
        border-bottom: 1px black solid;
    }

    main {
        background-color: white;
        border-radius: 40px;
        width: 600px;
        margin: 130px auto 30px auto;
        padding: 0px 0px 50px 0px;
        display: flex;
        flex-direction: column;
        justify-items: center;
        align-items: center;
        gap: 30px;
        margin-bottom: 70px;
    }

    form {
        display: flex;
        flex-direction: column;
        width: 500px;
        gap: 10px;
        font-size: 25px;
    }

    label {
        font-size: 15px;

    }

    input {
        height: 50px;
        font-size: 25px;
        padding: 3px;
    }

    #button1 {
        height: 50px;
        margin-top: 20px;
        font-size: 25px;
        background-color: green;
        color: white;

    }

    #button2 {
        height: 50px;
        margin-top: 20px;
        font-size: 25px;
        background-color: red;
        color: white;

    }

    footer {
        background-color: black;
        height: 100px;
    }



    footer div {
        color: white;
        text-align: center;
        padding-top: 40px;
    }
</style>