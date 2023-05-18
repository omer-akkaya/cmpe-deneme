<style>
    main {
        display: flex;
        flex-direction: column;
        max-width: 1280px;
        margin: 200px auto 200px auto;
    }

    #title {
        font-size: 40px;
        text-align: center;
        padding: 0px 0px 50px 0px;
    }

    #previous-orders {}

    .previous-order {
        background-color: lightgrey;
        width: 75%;
        margin: 20px auto 20px auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 30px 80px 30px 80px;
        border-radius: 40px;
        cursor: pointer;
        user-select: none;
        transition-duration: 200ms;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    .previous-order:hover {
        background-color: #9CA3AF;
        transition: all;
        transition-duration: 200ms;
    }


    .order-info {
        font-size: 20px;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .order-info a {
        font-weight: bolder;
    }

    .order-info-id {}

    .order-info-date {}

    .order-total {
        width: 300px;
        text-align: right;
    }

    .order-total-title {
        font-size: 20px;
        font-weight: bolder;

    }

    .order-total-price {
        font-size: 40px;
        color: green;
    }
</style>