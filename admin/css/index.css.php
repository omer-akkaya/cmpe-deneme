<style>
    #summary-title {
        margin: 170px auto 0px auto;
        padding-bottom: 20px;
        text-align: center;
        max-width: 1280px;
        font-size: 30px;
        border-bottom: 5px solid gray;
    }

    .info {
        margin: 40px auto 100px auto;
        max-width: 1280px;
        display: flex;
        justify-content: space-between
    }

    .info-box {
        display: flex;
        flex-direction: column;
        width: 350px;
        height: 250px;
        padding: 30px;
        background-color: darkslategray;
        color: white;
        border-radius: 30px;
        justify-content: space-between;
    }

    .info-box span {
        font-size: 40px;
    }

    #products-title {
        margin: 0px auto;
        padding-bottom: 20px;
        text-align: center;
        max-width: 1280px;
        font-size: 30px;
        border-bottom: 5px solid gray;
    }

    #products {
        margin: 40px auto 150px auto;
        max-width: 1280px;
        display: flex;
        flex-wrap: wrap;
        gap: 93.33px
    }

    #container {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        margin-bottom: -50px;
    }

    .bestseller__item {
        width: 250px;
        height: 375px;
        color: black;
        background-color: white;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: start;
        cursor: pointer;
        user-select: none;
        padding: 0px 0px 30px 0px;
        font-size: 20px;
        transition: all;
        transition-duration: 300ms;
    }

    .bestseller__item__image {
        width: 100%;
        height: 270px;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center
    }

    .bestseller__item__image img {
        width: 250px;
        height: auto;
    }

    .bestseller__item:hover {
        background-color: #CBD5E1;
        transition: all;
        transition-duration: 300ms;
    }

    #product_name {
        padding-left: 20px;
    }

    .bestseller__item__price {
        color: red;
        font-weight: 600;
        font-family: Helvetica, sans-serif;
        padding-left: 20px;
    }
</style>