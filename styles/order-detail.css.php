<style>
    #title {
        font-size: 40px;
        text-align: center;
        padding: 0px 0px 50px 0px;
    }

    main {
        max-width: 1280px;
        margin: 100px auto 100px auto;
        display: flex;
        justify-content: space-between;
    }

    #item-count {
        font-size: 30px;
        margin-bottom: 50px;
    }

    #products {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .product {
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 10px 0px 10px 0px;
        padding: 40px 20px 40px 20px;
        background-color: #E4E4E7;
        border-radius: 20px;
        font-size: 20px;
        cursor: pointer;
        transition-duration: 300ms;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    .product:hover {
        background-color: #9CA3AF;
        transition: all;
        transition-duration: 300ms;
    }

    .product-name {
        width: 300px;
    }

    .product-price {
        text-align: center;
        width: 200px;
    }

    .row-total {
        text-align: center;
        width: 200px;
        color: red;
    }

    .delete-button {
        text-align: center;
        color: black;
        padding: 30px;
        border-radius: 100%;
    }

    .delete-button:hover {
        background-color: red;
        color: white
    }

    #basket-summary {
        background-color: #E4E4E7;
        width: 400px;
        height: 450px;
        padding: 30px;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        gap: 40px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    #order-summary {
        text-align: center;
        padding: 20px;
        font-size: 20px;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 5px 15px;

    }

    #date {
        display: flex;
        justify-content: space-between;
        font-size: 20px;
    }

    #payment {
        display: flex;
        justify-content: space-between;
        font-size: 20px;
    }

    #total-price {
        display: flex;
        justify-content: space-between;
        font-size: 20px;
    }

    #total-price span {
        color: red;
        font-size: 30px;

    }

    #basket-summary select {
        padding: 10px;
        border: 0px solid black;
        text-align: center;
        font-size: 20px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;

    }

    #confirm-order {
        background-color: #065F46;
        text-align: center;
        padding: 10px 0px 10px 0px;
        font-size: 20px;
        user-select: none;
        color: white;
        cursor: pointer;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    #confirm-order:hover {
        background-color: #064E3B;
    }
</style>