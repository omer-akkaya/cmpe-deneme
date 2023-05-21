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
        background-color: black;
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
        border-radius: 30px;
        cursor: pointer;
        background-color: #27272A;
        padding: 15px;
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

    .btn--add-product {
        background-color: #4f3222;
    }
</style>