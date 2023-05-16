<style>
    #main-banner {
        width: 100%;
        margin-top: 100px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        height: auto;
        cursor: pointer;
    }

    .main-section {
        margin: 50px auto 50px auto;
        max-width: 1280px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .main-section--title {}

    #category-name {
        font-size: 30px;
    }

    #count {
        font-size: 20px;
        margin-left: 10px;
    }

    #sort-by select,
    #sort-by option {
        font-size: 20px;
        padding: 15px;
    }

    #products {
        margin: 50px auto 150px auto;
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

    .add_to_basket {
        cursor: pointer;
        user-select: none;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50px;
        background-color: #14532D;
    }
</style>