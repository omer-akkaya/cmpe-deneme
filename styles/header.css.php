<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Verdana, Geneva, Tahoma, sans-serif
    }

    body {
        /* this project is designed desktop only */
        min-width: 1500px;
    }

    header {
        position: fixed;
        top: 0px;
        height: 100px;
        background-image: linear-gradient(to right, #fc5c7d, #6a82fb);
        width: 100%;
        z-index: 10;
        /* this project is designed desktop only */
        min-width: 1500px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
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

    .header-flex__right {
        display: flex;
        gap: 30px;
    }

    #logo {
        user-select: none;
        border-radius: 50px;
        cursor: pointer;
        /* background-color: rgba(255, 255, 255, 1); */
        padding: 10px;
    }

    .btn {
        text-align: center;
        min-width: 150px;
        background-color: #000080;
        padding: 15px;
        border-radius: 30px;
        cursor: pointer;
    }

    .btn--logout {
        background-color: red;
        min-width: 60px;
    }

    .btn--basket {
        background-color: #82b74b;
        color: black;
    }

    .btn--previous-orders {
        background-color: #27272A;
    }

    .btn--user {
        background-color: #4f3222;
    }
</style>